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
    
    public function postOCRFILES(Request $req)
    {
        if($req->hasFile('file')){
            $file = $req->file('file');
            $filePath = fileUpload($file,'ocr');
            $cFile = '@' . realpath($filePath);
            $postdata = [
                'file' => $file,
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
                'cache-control: no-cache',
            ];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"https://api.ocr.space/parse/image");
            curl_setopt($curl, CURLOPT_POST,1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            $response = curl_exec ($curl);
            $err = curl_error($curl);
            curl_close ($curl);
            if($err){
                echo "cURL Error #:" . $err;
            }else{
                echo $response;
            }
        }
    }
}
