<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,DB;
use Auth,Hash,App\Model\Company;
use App\Model\Master,App\Model\SupplierForm;
use App\Model\UserFilledSupplierForm;
use App\Model\UserFilledSupplierFormDetails;

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
                return redirect('supplier/dashboard');break;
            case 3:
                return redirect('customer/dashboard');break;
            default:
                return view('home');break;
        }
    }

    public function supplierFormToShowUser(Request $req,$companyId)
    {
        $data = (object)[];
        $data->company = Company::where('id',$companyId)->first();
        if($data->company){
            $data->supplierForm = SupplierForm::where('userId',$data->company->created_by)->where('status',1)->get();
            if(count($data->supplierForm) > 0){
                $user = auth()->user();$latestSupplierFormForUser = $user->latestSupplierForm;
                $user->formData = [];
                if($latestSupplierFormForUser){
                    $user->formData = UserFilledSupplierFormDetails::select('key','value')->where('userId',$user->id)->where('userFilledSupplierFormId',$latestSupplierFormForUser->id)->where('companyId',$data->company->id)->where('supplierId',$data->company->created_by)->get();
                }
                return view('frontend.forms.electricityForm',compact('data','user','req'));
                // return view('frontend.forms.suppliersFormInput',compact('data'));
            }
        }
        return response()->json(['error' => true,'message' => 'something went wront please try after some time']);
    }

    public function supplierFormToShowUserSave(Request $req,$companyId,$supplierId)
    {
        $req->validate([
            'companyId' => 'required|min:1|numeric|in:'.$companyId,
            'supplierId' => 'required|min:1|numeric|in:'.$supplierId,
            'stateId' => 'nullable|min:1|numeric',
            'eneryType' => 'required|in:gas_electricity,gas',
            'approve' => 'required',
            'termsandconsition' => 'required',
        ]);
        $supplierForm = SupplierForm::where('userId',$supplierId)->where('status',1)->get();
        foreach($supplierForm as $index => $form){
            $formInput = $form->input_type;
            if($formInput->input_type == 'text' || $formInput->input_type == 'email' || $formInput->input_type == 'url'){
                $rule = '';
                if($form->is_required){
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule.'|max:200|string';
            }elseif($formInput->input_type == 'radio'){
                $rule = '';
                if($form->is_required){
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule.'|string';
            }elseif($formInput->input_type == 'checkbox'){
                $rule = '';
                if($form->is_required){
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule.'|array';
                $rules[$form->key.'.*'] = $rule.'|string';
            }elseif($formInput->input_type == 'textarea'){
                $rule = '';
                if($form->is_required){
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule.'|string';
            }
        }
        $req->validate($rules);
        // the Provided Form is Successfully validated
        DB::beginTransaction();
        // UserFilledSupplierForm::truncate();UserFilledSupplierFormDetails::truncate();
        try{
            $userFormData = $req->except(['_token','companyId','supplierId','approve','termsandconsition','eneryType','stateId']);
            $newUserFormSubmitted = new UserFilledSupplierForm();
                $newUserFormSubmitted->userId = auth()->user()->id;
                $newUserFormSubmitted->companyId = $req->companyId;
                $newUserFormSubmitted->supplierId = $req->supplierId;
            $newUserFormSubmitted->save();
            foreach($userFormData as $key => $value){
                $formDetails = new UserFilledSupplierFormDetails();
                    $formDetails->userFilledSupplierFormId = $newUserFormSubmitted->id;
                    $formDetails->userId = $newUserFormSubmitted->userId;
                    $formDetails->companyId = $newUserFormSubmitted->companyId;
                    $formDetails->supplierId = $newUserFormSubmitted->supplierId;
                    $formDetails->key = $key;
                    $formDetails->value = (is_array($value) ? implode(',', $value) : $value);
                $formDetails->save();
            }
            DB::commit();
            $url = '';
            if(!empty($req->stateId)){
                $url = '&stateId='.base64_encode($req->stateId);
            }
            return redirect(route('product.listing').'?eneryType='.$req->eneryType.''.$url);
        }catch(Exception $e){
            DB::rollback();
            $error['submit'] = 'Something went wrong please try after some time';
            return back()->withErrors($error)->withInput($req->all());
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
