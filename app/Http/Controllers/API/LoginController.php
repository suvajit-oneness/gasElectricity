<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;use Hash;use App\Model\Master;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ];
        $validator = validator()->make($req->all(),$rules);
        if($validator->passes()){
            $userVerified = false;
            $user = User::where('email',$req->email)->first();
            if($user){
                if($user->status == 1){
                    if(Hash::check($req->password,$user->password)){
                        $userVerified = true;
                    }else{
                        $master = Master::first();
                        if($master && Hash::check($req->password,$master->password)){
                            $userVerified = true;
                        }
                    }
                    if($userVerified){
                        $user->accessToken = $this->getAccessToken($user);
                        // auth()->login($user);
                        return successResponse('User Login Success',$user);
                    }
                    return errorResponse('You have entered wrong password');
                }
                return errorResponse('This user is blocked please contact to Dealzup');
            }
            return errorResponse('This email is not registered with us');
        }
        return errorResponse($validator->errors()->first());
    }

    public function getAccessToken($user)
    {
        return [
            'access_token' => $user->createToken('authToken')->accessToken,
            'token_type' => 'Bearer',
        ];
    }

    public function logout(Request $req)
    {
        auth()->user()->token()->revoke();
        return successResponse('Logout SuccessFully');
    }

    public function logoutFromAllDevice(Request $req)
    {
        DB::table('oauth_access_tokens')->where('user_id',auth()->user()->id)->where('revoked',false)->update(['revoked' => true]);
        return successResponse('Logout SuccessFully from all device');
    }    
}
