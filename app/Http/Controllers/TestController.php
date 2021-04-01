<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alimranahmed\LaraOCR\Services\OcrAbstract;
use OCR;

class TestController extends Controller
{
	protected $ocr;

    public function parseText(Request $req)
    {
    	$imagePath = resource_path('lara_ocr/sampleImages/1.jpg');
    	dd($imagePath);
    	return OCR::scan($imagePath);

    	$image = request('image');
        if(isset($image) && $image->getPathName()){
            $ocr = app()->make(OcrAbstract::class);
            $parsedText = $ocr->scan($image->getPathName());
            return view('lara_ocr.parsed_text', compact('parsedText'));
        }
    }
}


