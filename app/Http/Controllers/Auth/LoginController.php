<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;use Hash;use App\Model\Master;

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

    public function logout(Request $request)
    {
        auth()->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
