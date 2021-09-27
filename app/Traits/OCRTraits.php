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
            return errorResponse('Something went wrong please try after sometime'); // sending the Error Response
        }
        return $this->convertToText(json_decode($result)); // transferring to the next step
    }

    public function convertToText($resultData)
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
            return errorResponse('uploaded file has no Content',$textData); // sending the Error Response
        }
        return $this->readLines($textData); // transferring to the next step
    }

    public function readLines($string)
    {
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
                    $error = false;break;
                }
            }
            continue;
        }
        if($error){
            return errorResponse('we donot found the data for calculation',$string);
        }
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
        ]);
    }

    public function getUnitConsumed($string)
    {
        $unitConsumed = '';
        $searchString = 'AVERAGE DAILY USAGE FOR THIS ACCOUNT: ';$pos = strpos(strtoupper($string),$searchString);
        if($pos){$pos += strlen($searchString);}
        // else{
        //     $searchString = 'Average daily usage for this account: ';$pos = strpos($string,$searchString);
        //     if($pos){$pos += strlen($searchString);}
        //     else{}
        // }
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