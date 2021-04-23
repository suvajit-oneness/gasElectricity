<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Referral;use DB;use App\User;use Hash;
use App\Model\UserPoints;

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
            $user->save();
            $this->setReferralCode($user,$userData->referral);
            DB::commit();
            return $user;
        }catch (Exception $e) {
            DB::rollback();
            return new User();
        }
    }

    public function setReferralCode($user,$referalCode='')
    {
        $referral = $this->generateUniqueReferral();
        $user->referral_code = $referral->code;
        if($referalCode != ''){
            $referralFind = Referral::where('code',$referalCode)->first();
            if($referralFind){
                $referredBy = User::find($referralFind->userId);
                $this->addNewPointTotheUser($referredBy,50,'Referred Bonus for Joining '.$user->email);
                $user->referred_by = $referredBy->id;
            }
        }
        $user->save();
        $referral->userId = $user->id;
        $referral->save();
        $this->addNewPointTotheUser($user,50,'Joining Bonus');
    }

    public function addNewPointTotheUser($user,$points,$remark='')
    {
        $newPoint = new UserPoints;
        $newPoint->userId = $user->id;
        $newPoint->points = $points;
        $newPoint->remarks = $remark;
        $newPoint->save();
        return $newPoint;
    }
}
