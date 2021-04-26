<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->user_type) {
            case 1:
                return redirect('admin/dashboard');break;
            case 2:
                return redirect('client/dashboard');break;
            case 3:
                return redirect('customer/dashboard');break;
            default:
                return view('home');break;
        }
    }

    public function userProfile(Request $req)
    {
        $user = Auth::user();
        return view('auth.user.profile',compact('user'));
    }

    public function userProfileSave(Request $req)
    {
        $req->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'mobile' => 'nullable|numeric',
            'gender' => 'nullable|string|in:Male,Female,Not specified',
            'dob' => 'nullable|date_format:Y-m-d|before:'.date('Y-m-d'),
            'marital' => 'nullable|string|in:Single,Married,Divorced',
            'aniversary' => 'nullable|date_format:Y-m-d|before:'.date('Y-m-d'),
        ]);
        $user = Auth::user();
        $user->name = $req->name;
        $user->email = $req->email;
        if($req->hasFile('image')){
            $random = randomGenerator();
            $image = $req->file('image');
            $image->move('upload/users/image/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = url('upload/users/image/'.$random.'.'.$image->getClientOriginalExtension());
            $user->image = $imageurl;
        }
        $user->mobile = emptyCheck($req->mobile);
        $user->gender = emptyCheck($req->gender);
        $user->dob = emptyCheck($req->dob,true);
        $user->marital = emptyCheck($req->marital);
        $user->aniversary = emptyCheck($req->aniversary,true);
        $user->save();
        return back()->with('Success','Profile updated successFully');
    }

    public function changePassword(Request $req)
    {
        return view('auth.user.change_password');
    }
}
