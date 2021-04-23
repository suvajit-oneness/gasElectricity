<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Referral;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateUniqueReferral()
    {
    	$random = generateUniqueAlphaNumeric(7);
    	$referral = Referral::where('code',$random)->first();
    	if(!$referral){
    		$referral = new Referral();
    		$referral->code = strtoupper($random);
    		$referral->save();
    		return $referral;
    	}
    	return $this->generateUniqueReferral();
    }
}
