<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Referral,DB,App\User,Hash;
use App\Model\UserPoints,App\Model\Master;

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
            if(!empty($userData->user_type) && is_numeric($userData->user_type)){
                $user->user_type = $userData->user_type;
            }
            if(!empty($userData->mobile) && is_numeric($userData->mobile)){
                $user->mobile = $userData->mobile;
            }
            $user->save();
            $this->setReferralCode($user,$userData->referral);
            DB::commit();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $userData->password,
                'content' => 'Please use the Provided password below to login',
            ];
            sendMail($data,'emails/userRegistration',$user->email,'Congratulation - Successful Registration !!!');
            return $user;
        }catch (Exception $e) {
            DB::rollback();
            return (object)[];
        }
    }

    public function setReferralCode($user,$referalCode='')
    {
        $master = Master::first();
        $referral = $this->generateUniqueReferral();
        $user->referral_code = $referral->code;
        if($referalCode != ''){
            $referralFind = Referral::where('code',$referalCode)->first();
            if($referralFind){
                $referredBy = User::find($referralFind->userId);
                $this->addNewPointTotheUser($referredBy,$master->referral_bonus,'Referred Bonus for Joining '.$user->email);
                $user->referred_by = $referredBy->id;
            }
        }
        $user->save();
        $referral->userId = $user->id;
        $referral->save();
        $this->addNewPointTotheUser($user,$master->joining_bonus,'Joining Bonus');
    }

    public function addNewPointTotheUser($user,$points,$remark='')
    {
        $newPoint = new UserPoints;
        $newPoint->userId = $user->id;
        $newPoint->points = $points;
        $newPoint->remarks = $remark;
        $newPoint->save();
        $data = [
            'name' => $user->name,
            'content' => 'Congratulation, you got Point '. $points .' as '.$remark,
        ];
        sendMail($data,'emails/userPointEmail',$user->email,'Congratulation - Point Added!!!');
        return $newPoint;
    }
}
