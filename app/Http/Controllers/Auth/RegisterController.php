<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function showRegistrationForm(Request $req)
    {
        return view('auth.register',compact('req'));
    }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','string'],
            'dateOfBirth' => ['required','date'],
            'requireLifeSupportMedicalEquipment' => ['nullable'],
            'operateLifeSupportMedicalEquipment' => ['nullable'],
            'LifeSupportMachineType' => ['nullable'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral' => ['string','nullable','exists:referrals,code'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data = (object)$data;
        $user = new User();
        $user->user_type = 3;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->mobile = $data->phone;
        $user->dob = date('Y-m-d',strtotime($data->dateOfBirth));
        $user->password = Hash::make($data->password);
        if(!empty($data->requireLifeSupportMedicalEquipment) && $data->requireLifeSupportMedicalEquipment == 'yes'){
            $user->requireLifeSupportMedicalEquipment = emptyCheck($data->requireLifeSupportMedicalEquipment);
            $user->operateLifeSupportMedicalEquipment = emptyCheck($data->operateLifeSupportMedicalEquipment);
            $user->LifeSupportMachineType = emptyCheck($data->LifeSupportMachineType);    
        }else{
            $user->requireLifeSupportMedicalEquipment = emptyCheck($data->requireLifeSupportMedicalEquipment);
        }
        $user->save();
        $this->setReferralCode($user,$data->referral);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $data->password,
            'content' => 'Please use the Provided password below to login',
        ];
        sendMail($data,'emails/userRegistration',$user->email,'Congratulation - Successful Registration !!!');
        return $user;
    }
}
