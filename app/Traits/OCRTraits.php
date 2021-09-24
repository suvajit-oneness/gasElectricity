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
        $error = true;$msg = 'Something went wrong please try after sometime';
        if($err){}
        else{
            $error = false;$msg = 'Returned Data';
        }
        $data = (object)[];
        $data->error = $error;
        $data->message = $msg;
        $data->data = json_decode($result);
        return $data;
    }

    public function convertToText($resultData)
    {
        // echo $resultData->ParsedResults[0]->ParsedText;exit;
        $error = true;$msg = 'uploaded file has no Content';$textData = '';
        if(!empty($resultData->ParsedResults) && count($resultData->ParsedResults) > 0){
            $arrayData = $resultData->ParsedResults;
            foreach($arrayData as $pageWise){
                $error = false;$msg = 'Content Readed';$textData .= $pageWise->ParsedText.' ';
            }
        }
        $data = (object)[];
        $data->error = $error;
        $data->message = $msg;
        $data->data = strtoupper($textData); // doing uppercase all data
        return $data;
    }

    public function readLines($string)
    {
        // echo "<pre>"; print_r($string);exit;
        $stateId = 0;$error = true;$msg = 'we donot found the data for calculation';
        $pincode = '';$stateName = '';$bill_amount = '';$unit_consumed = '';
        $name = '';$email = '';$phone = '';
        $states = \App\Model\State::where('countryId',2)->get();
        foreach ($states as $key => $state) {
            // getting State making Position true or false
            $pos1 = false;$pos2 = false;
            if(($pos1 = strpos($string,strtoupper($state->name)) !== false) || ($state->acronym != '' && $pos2 = strpos($string,strtoupper($state->acronym)) !== false)){
                $error = false;$msg = 'Data Found';
                $stateId = $state->id;$stateName = $state->name;
                // Getting Pincode
                if($pos1){
                    $pos1 = strpos($string,strtoupper($state->name));
                    $pos1 = $pos1 + strlen($state->name) + 1; // positon of the text + state name + 1 for space
                    $pincode = getStringFromTo($pos1,4,$string);
                    // $pincode = getNumberFromString($string,$pos1);
                }elseif($pos2){
                    $pos2 = strpos($string,strtoupper($state->acronym));
                    $pos2 = $pos2 + strlen($state->acronym) + 1; // positon of the text + state acronym + 1 for space
                    $pincode = getStringFromTo($pos2,4,$string);
                    // $pincode = getNumberFromString($string,$pos2);
                }
                // getting Bill Amount
                $gettingPositionForBillAmount = $this->getAllPosibleBillText($string);
                if($gettingPositionForBillAmount){
                    $posForAmount = getStringNearPosition($string,$gettingPositionForBillAmount,'$',1000);
                    if($posForAmount && $posForAmount > 0){
                        // Getting Price
                        $bill_amount = getNumberFromString($string,$posForAmount);
                    }
                }
                $unit_consumed = $this->getUnitConsumed($string);
                break;
            }
        }
        $data = (object)[];
        $data->error = $error;
        $data->message = $msg;
        $data->state = $stateId;
        $data->stateName = $stateName;
        $data->name = $name;
        $data->email = $email;
        $data->phone = $phone;
        $data->pincode = $pincode;
        $data->bill_amount = $bill_amount;
        $data->unit_consumed = $unit_consumed;
        $data->originalstring = $string;
        $data->user = (Auth::user() ? Auth::user()->id : 0);
        insertOCRData($data);
        dd($data);
        return $data;
    }

    public function getUnitConsumed($string)
    {
        $unitConsumed = '';
        $searchString = 'Average daily usage for this account: ';$pos = strpos($string,$searchString);
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
        $pos = strpos($string,'Total Gas Charges');
        if(!$pos){
            $pos = strpos($string,'Total Electricity Charges');
        }
        return $pos;
    }
}