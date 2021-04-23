<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Referral;use DB;use App\User;use Hash;

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

    public function createNewUser($userData)
    {
    	DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $userData->name;
            $user->email = $userData->email;
            $user->password = Hash::make($userData->password);
            $user->image = url('/defaultUser.jpg');
                $referral = $this->generateUniqueReferral();
                $user->referral_code = $referral->code;
            if(!empty($userData->referral)){
                $referralFind = Referral::where('code',$userData->referral)->first();
                if($referralFind){
                    $user->referred_by = $referralFind->userId;
                }
            }
            $user->save();
                $referral->userId = $user->id;
                $referral->save();
            DB::commit();
            return $user;
        }catch (Exception $e) {
            DB::rollback();
            return new User();
        }
    }
}
