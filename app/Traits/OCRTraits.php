<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Models\OcrFilesData;
use Auth;

trait OCRTraits
{
	public $apiKey = '091edecfdb88957';

	public function postOCRFILES(Request $req)
    {
        $file = $req->file('file');
        $url = 'https://api.ocr.space/parse/image';
        $filePath = fileUpload($file,'ocr_upload');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if(function_exists('curl_file_create')){
            $filePath = curl_file_create($filePath);
        } else{
            $filePath = '@' . realpath($filePath);
            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
        }
        $postFields = [
            'file' => $filePath,
            'url' => '',
            'language'=> 'eng',
            'isOverlayRequired'=> 'true',
            'IsCreateSearchablePDF'=> 'false',
            'isSearchablePdfHideTextLayer'=> 'true',
            'detectOrientation'=> 'false',
            'isTable' => 'false',
            'scale' => 'true',
            'OCREngine' => '1',
            'detectCheckbox' => 'false',
            'checkboxTemplate' => '0',
        ];
        $header = [
            'apikey:'.$this->apiKey,
            'Content-Type: multipart/form-data',
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        if($err){
            return errorResponse('Something went wrong please try after sometime',['ocr_resonse'=>$result]); // sending the Error Response
        }
        return $this->convertToText($req,json_decode($result)); // transferring to the next step
    }

    public function convertToText(Request $req,$resultData)
    {
        // echo $resultData->ParsedResults[0]->ParsedText;exit;
        $error = true;$msg = '';$textData = '';
        if(!empty($resultData->ParsedResults) && count($resultData->ParsedResults) > 0){
            $arrayData = $resultData->ParsedResults;
            foreach($arrayData as $pageWise){
                $error = false;$textData .= $pageWise->ParsedText.' ';
            }
        }
        if($error){
            return errorResponse('uploaded file has no Content',['text_conversion_error'=>$textData]); // sending the Error Response
        }
        return $this->readLines($req,$textData); // transferring to the next step
    }

    public function readLines(Request $req,$string)
    {
        // return errorResponse($string);
        $stateId = 0;$error = true;$pincode = '';$stateName = '';$bill_amount = '';$unit_consumed = '';
        $serviceChargePeriod = '';$serviceChargedRate = '';
        $states = \App\Model\State::where('countryId',2)->get();
        foreach ($states as $key => $state) {
            if($state->acronym != '' && $pos1 = strpos($string,strtoupper($state->acronym))){
                if($pos1){
                    $pos1 += strlen($state->acronym) + 1; // positon of the text + state acronym + 1 for space
                    $pincode = getStringFromTo($pos1,4,$string);
                }elseif($state->name != '' && $pos2 = strpos($string,$state->name)){
                    if($pos2){
                        $pos2 += strlen($state->name) + 1; // positon of the text + state Name + 1 for space
                        $pincode = getStringFromTo($pos2,4,$string);
                    }
                }
                if($pos1 || $pos2){
                    $stateId = $state->id;$stateName = $state->name;
                    $gettingPositionForBillAmount = $this->getAllPosibleBillText($string);
                    if($gettingPositionForBillAmount){
                        $posForAmount = getStringNearPosition($string,$gettingPositionForBillAmount,'$',1000);
                        if($posForAmount && $posForAmount > 0){
                            $bill_amount = getNumberFromString($string,$posForAmount);
                        }
                    }
                    $unit_consumed = $this->getUnitConsumed($string);
                    $serviceChargePeriod = $this->getServiceChargedForThisString($string);
                    $serviceChargedRate = $this->calculateServiceChargedRate($string);
                    $error = false;break;
                }
            }
            continue;
        }
        if($error){
            return errorResponse('we donot found the data for calculation',['read_lined_error'=>$string]);
        }
        if(!empty($req->rfqId)){
            $rfq = \App\Model\Rfq::where('id',$req->rfqId)->first();
            if(!$rfq){
                $rfq = new \App\Model\Rfq;
            }
        }else{
            $rfq = new \App\Model\Rfq;
        }
        if(auth()->user()){
            $rfq->userId = auth()->user()->id;
        }
        $rfq->ocr_bill_amount = $bill_amount;
        $rfq->ocr_unit_consumed = $unit_consumed;
        $rfq->ocr_pincode = $pincode;
        $rfq->ocr_state = $stateName;
        $rfq->ocr_full_text = $string;
        $rfq->save();
        return successResponse('Data Found',[
            'stateId' => $stateId,
            'stateName' => $stateName,
            'pincode' => $pincode,
            'bill_amount' => $bill_amount,
            'unit_consumed' => $unit_consumed,
            'kwh_usage' => $unit_consumed,
            'kwh_rate' => $bill_amount,
            'serviceChargedPeriod' => $serviceChargePeriod,
            'serviceChargedRate' => $serviceChargedRate,
            'originalstring' => $string,
            'rfqId' => $rfq->id,
        ]);
    }

    public function calculateServiceChargedRate($string)
    {
        $returnValue = '';
        $searchString = ' c/day';$pos = strpos($string,$searchString);
        if($pos){
            $array = ['0','1','2','3','4','5','6','7','8','9','.'];
            for($i = $pos; $i > ($pos - 8); $i--){
                if(isset($string[$i]) && in_array($string[$i],$array)){
                    $returnValue .= $string[$i];
                }
            }
        }
        return strrev($returnValue);
    }

    public function getServiceChargedForThisString($string)
    {
        $return = '';
        $searchString = ' DAYS)';$pos = strpos(strtoupper($string),$searchString);
        if($pos){
            $array = ['0','1','2','3','4','5','6','7','8','9'];
            for($i = $pos; $i > ($pos - 5); $i--){
                if(isset($string[$i]) && in_array($string[$i],$array)){
                    $return .= $string[$i];
                }
            }
        }
        return strrev($return);
    }

    public function getUnitConsumed($string)
    {
        $unitConsumed = '';
        $searchString = 'BASE USAGE ';$pos = strpos(strtoupper($string),$searchString);
        if($pos){$pos += strlen($searchString);}
        else{
            $searchString = 'AVERAGE DAILY USAGE FOR THIS ACCOUNT';$pos = strpos($string,$searchString);
            if($pos){$pos += strlen($searchString);}
            else{}
        }
        if($pos && $pos > 0){
            $unitConsumed = getNumberFromString($string,$pos);
        }
        return $unitConsumed;
    }

    public function getAllPosibleBillText($string)
    {
        $pos = strpos(strtoupper($string),'TOTAL GAS CHARGES');
        if(!$pos){
            $pos = strpos(strtoupper($string),'TOTAL ELECTRICITY CHARGES');
        }
        return $pos;
    }
}