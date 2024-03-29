<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,DB;
use Auth,Hash,App\Model\Company;
use App\Model\Master,App\HomeAndUsage,App\Model\UserIdentification;

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
                return redirect()->intended('admin/dashboard');break;
            case 2:
                return redirect()->intended('supplier/dashboard');break;
            case 3:
                return redirect()->intended('customer/dashboard');break;
            default:
                return view('home');break;
        }
    }

    public function userReferral(Request $req)
    {
        $user = Auth::user();
        return view('admin.referral.referred_to',compact('user'));
    }

    public function userProfile(Request $req)
    {
        $user = Auth::user();
        $identification = UserIdentification::where('userId',$user->id)->first();
        if(!$identification){
            $identification = new UserIdentification();
            $identification->userId = $user->id;
            $identification->save();
        }
        return view('auth.user.profile',compact('user','identification'));
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

    public function homeAndUsageDetails(Request $req)
    {
        $user = Auth::user();
        $homeAndUsage = HomeAndUsage::where('userId',$user->id)->first();
        if(!$homeAndUsage){
            $homeAndUsage = new HomeAndUsage();
            $homeAndUsage->userId = $user->id;
        }
        $homeAndUsage->save();
        return view('auth.user/home_and_usageDetails',compact('user','homeAndUsage'));
    }

    public function updateUserIdentification(Request $req)
    {
        $req->validate([
            'identification_type' => 'required|string|max:255',
            'identification_number' => 'required|string',
            'identification_expiry' => 'nullable',
            'concession_card_holder' => 'nullable',
            'type_of_concession_card' => 'nullable',
        ]);
        $user = $req->user();
        $identification = UserIdentification::where('userId',$user->id)->first();
        if(!$identification){
            $identification = new UserIdentification();
            $identification->userId = $user->id;
        }
        $identification->identification_type = emptyCheck($req->identification_type);
        $identification->identification_number = emptyCheck($req->identification_number);
        $identification->identification_expiry = emptyCheck($req->identification_expiry,true);
        $identification->concession_card_holder = ($req->concession_card_holder ?? 0);
        $identification->type_of_concession_card = emptyCheck($req->type_of_concession_card);
        $identification->save();
        return back()->with('Success','Identification updated successFully');
    }

    public function homeAndUsageDetailsUpdate(Request $req)
    {
        $req->validate([
            'serviceAddress' => 'nullable|max:200',
            'meterNumber' => 'nullable|max:200',
            'nmi' => 'nullable|max:200',
            'solar' => 'nullable|max:200',
            'usageInfo' => 'nullable|max:200',
            'requireLifeSupportMedicalEquipment' => 'nullable',
            'operateLifeSupportMedicalEquipment' => 'nullable',
            'LifeSupportMachineType' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $user = Auth::user();
            if(!empty($req->requireLifeSupportMedicalEquipment) && $req->requireLifeSupportMedicalEquipment == 'yes'){
                $user->requireLifeSupportMedicalEquipment = emptyCheck($req->requireLifeSupportMedicalEquipment);
                $user->operateLifeSupportMedicalEquipment = emptyCheck($req->operateLifeSupportMedicalEquipment);
                $user->LifeSupportMachineType = emptyCheck($req->LifeSupportMachineType);    
            }else{
                $user->requireLifeSupportMedicalEquipment = 'no';
            }
            $user->save();
            $homeAndUsage = HomeAndUsage::where('userId',$user->id)->first();
            if(!$homeAndUsage){
                $homeAndUsage = new HomeAndUsage();
                $homeAndUsage->userId = $user->id;
            }
            $homeAndUsage->serviceAddress = emptyCheck($req->serviceAddress);
            $homeAndUsage->meterNumber = emptyCheck($req->meterNumber);
            $homeAndUsage->nmi = emptyCheck($req->nmi);
            $homeAndUsage->solar = emptyCheck($req->solar);
            $homeAndUsage->usageInfo = emptyCheck($req->usageInfo);
            $homeAndUsage->save();
            DB::commit();
            return back()->with('Success','Data updated successFully');
        } catch (Exception $e) {
            DB::rollback();
            $error['serviceAddress'] = 'Something went wrong please try after sometime';
            return back()->withErrors($error)->withInput($req->all());
        }
    }

    public function updateUserPassword(Request $req)
    {
        $req->validate([
            'old_password' => ['required','string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $passwordVerified = false;
        $user = Auth::user();
        if(Hash::check($req->old_password,$user->password)){
            $passwordVerified = true;
        }else{
            $master = Master::first();
            if($master && Hash::check($req->old_password,$master->password)){
                $passwordVerified = true;
            }
        }
        if($passwordVerified){
            $user->password = Hash::make($req->password);
            $user->save();
            return back()->with('Success','Password changed successFully');
        }
        $error['old_password'] = 'the password didnot match';
        return back()->withErrors($error)->withInput($req->all());
    }

    public function userPoints(Request $req)
    {
        $user = Auth::user();
        return view('auth.user.point_info',compact('user'));
    }
}
