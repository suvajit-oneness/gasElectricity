<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;use Socialite;
use App\User;use Hash;use App\Model\Master;
use Str;use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
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
                    }else{
                        $errors['password'] = 'you have entered wrong password';
                    }
                }
                if($userVerified){
                    auth()->login($user);
                    return redirect('/home');
                }
            }else{
                $errors['email'] = 'this account has been blocked';
            }
        }else{
            $errors['email'] = 'this email is not register with us';
        }
        return back()->withErrors($errors)->withInput($req->all());
    }

    public function socialiteLogin(Request $req,$socialite)
    {
        return Socialite::driver($socialite)->redirect();
    }

    public function socialiteLoginRedirect(Request $req,$socialite)
    {
        $socialiteUser = Socialite::driver($socialite)->user();
        $user = User::where('email',$socialiteUser->email)->first();
        if(!$user){
            DB::beginTransaction();
            try {
                $password = Str::random(8);
                $user = new User();
                $user->user_type = 2;
                $user->name = emptyCheck($socialiteUser->name);
                $user->email = $socialiteUser->email;
                $user->password = Hash::make($password);
                $user->image = $socialiteUser->avatar;
                    $referral = $this->generateUniqueReferral();
                    $user->refferal_code = $referral->code;
                $user->save();
                    $referral->userId = $user->id;
                    $referral->save();
                    DB::commit();
                auth()->login($user);
                return redirect('/home');
            } catch (Exception $e) {
                DB::rollback();
                $error['socialite'] = 'Something went wrong please try after some time';
                return back()->withErrors($error);
            }
        }
    }

    public function logout(Request $request)
    {
        auth()->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
