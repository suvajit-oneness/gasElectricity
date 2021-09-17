<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Models\OcrFilesData;

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
        // dd($resultData);
        // echo $resultData->ParsedResults[0]->ParsedText;exit;
        $error = true;$msg = 'uploaded file has no Content';$textData = '';
        if(!empty($resultData->ParsedResults) && count($resultData->ParsedResults) > 0){
            $arrayData = $resultData->ParsedResults[0];
            if(!empty($arrayData->ParsedText)){
                $error = false;$msg = 'Content Readed';$textData = $arrayData->ParsedText;
            }else{
                $error = true;$msg = 'Something went wrong please try after sometime';
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
        // return $string;
        $stateId = 0;$error = true;$msg = 'we donot found the data for calculation';
        $states = \App\Model\State::where('countryId',2)->get();
        foreach ($states as $key => $state) {
            if((strpos($string,strtoupper($state->name)) !== false) || ($state->key != '' && strpos($string,strtoupper($state->key)) !== false)){
                $error = false;$msg = 'Data Found';
                $stateId = $state->id;
                break;
            }
        }
        $data = (object)[];
        $data->error = $error;
        $data->message = $msg;
        $data->state = $stateId;
        return $data;
    }
}