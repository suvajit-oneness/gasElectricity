<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OCRController extends Controller
{
    public function uploadFile(Request $req)
    {
        return view('ocr.uploadFiles');
    }

    public function compareOCRResult(Request $req)
    {
        return view('ocr.compareProducts');
    }

    public function verifyLines($resultData)
    {
        // dd($resultData);
        // echo $resultData->ParsedResults[0]->ParsedText;exit;
        if(!empty($resultData->ParsedResults) && count($resultData->ParsedResults) > 0){
            $arrayData = $resultData->ParsedResults[0];
            if(!empty($arrayData->ParsedText)){
                return $this->readLines($arrayData->ParsedText);
            }
        }
        $error['file'] = 'uploaded file has no Content';
        return back()->withErrors($error);
    }

    public function readLines($string,$priceLine = 0)
    {
        echo $string;exit;
        
        for ($i=0; $i <strlen($string) ; $i++) {

        }
    }


    public function postOCRFILES(Request $req)
    {
        if($req->hasFile('file')){
            $file = $req->file('file');
            $url = 'https://api.ocr.space/parse/image';
            $filePath = fileUpload($file,'ocr');
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
                'apikey:091edecfdb88957',
                'Content-Type: multipart/form-data',
            ];
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($curl);
            $err = curl_error($curl);
            if($err){
                $error['file'] = 'Something went wrong please try after sometime';
                return back()->withErrors($error);
            }else{
                return $this->verifyLines(json_decode($result));
            }
        }
    }
}
