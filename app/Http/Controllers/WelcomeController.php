<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Testimonials,App\Model\BlogCategory;
use App\Model\Faq,App\Model\Blog,Auth,App\User;
use App\Model\ContactUs,App\Model\Membership;
use App\Model\UserMembership,App\Model\Setting;
use App\Model\Product,App\Model\State,DB,App\Model\TariffType;
use App\Model\SupplierPincode,App\Model\Rfq,App\Model\Notification;
use App\Model\UserFilledSupplierFormDetails,App\Model\Company;
use App\Model\SupplierForm,App\Model\UserFilledSupplierForm;

class WelcomeController extends Controller
{
    public function supplierFormToShowUser(Request $req)
    {
        $rules = [
            'productId' => 'required|min:1|numeric',
            'rfqId' => 'required|min:1|numeric',
        ];
        $validate = validator()->make($req->all(),$rules);
        if(!$validate->fails()){
            $product = Product::where('id',$req->productId)->first();
            if($product){
                $rfq = Rfq::where('id',$req->rfqId)->first();
                if($rfq){
                    $data = (object)[];
                    $data->company = Company::where('id',$product->company_id)->first();
                    if($data->company){
                        $data->supplierForm = SupplierForm::where('userId',$data->company->created_by)->where('status',1)->get();
                        if(count($data->supplierForm) > 0){
                            $user = $rfq->user;$latestSupplierFormForUser = $user->latestSupplierForm;
                            $user->formData = [];
                            if($latestSupplierFormForUser){
                                $user->formData = UserFilledSupplierFormDetails::select('key','value')->where('userFilledSupplierFormId',$latestSupplierFormForUser->id)->get();
                            }
                            return view('frontend.forms.suppliersFormInput',compact('data','product','rfq','user','req'));
                            // return view('frontend.forms.electricityForm',compact('data','user','req'));
                        }
                    }
                }
            }
        }
        return response()->json(['error' => true,'message' => 'something went wront please try after some time']);
    }

    public function supplierFormToShowUserSave(Request $req)
    {
        $req->validate([
            'productId' => 'required|min:1|numeric',
            'companyId' => 'required|min:1|numeric',
            'supplierId' => 'required|min:1|numeric',
            'rfqId' => 'required|min:1|numeric',
            'stateId' => 'nullable|min:1|numeric',
        ]);
        $supplierForm = SupplierForm::where('userId',$req->supplierId)->where('status',1)->get();
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
        try{
            $userFormData = $req->except(['_token','companyId','supplierId','approve','termsandconsition','eneryType','stateId']);
            $rfq = Rfq::where('id',$req->rfqId)->first();
            $newUserFormSubmitted = new UserFilledSupplierForm();
                $newUserFormSubmitted->userId = $rfq->userId;
                $newUserFormSubmitted->rfqId = $req->rfqId;
                $newUserFormSubmitted->productId = $req->productId;
                $newUserFormSubmitted->companyId = $req->companyId;
                $newUserFormSubmitted->supplierId = $req->supplierId;
            $newUserFormSubmitted->save();
            foreach($userFormData as $key => $value){
                $formDetails = new UserFilledSupplierFormDetails();
                    $formDetails->userFilledSupplierFormId = $newUserFormSubmitted->id;
                    $formDetails->key = $key;
                    $formDetails->value = (is_array($value) ? implode(',', $value) : $value);
                $formDetails->save();
            }
            DB::commit();
            $url = '';
            if(!empty($req->stateId)){
                $url = '&stateId='.base64_encode($req->stateId);
            }
            // addNotification($rfq->userId,'Application saved Success, our representive will catch you shortly.');
            return redirect('/')->with('Success','Application saved Success, our representive will catch you shortly.');
            // return redirect(route('product.listing').'?eneryType='.$req->eneryType.''.$url);
        }catch(Exception $e){
            DB::rollback();
            $error['submit'] = 'Something went wrong please try after some time';
            return back()->withErrors($error)->withInput($req->all());
        }
    }

    public function index(Request $req)
    {
        $data = (object)[];
        $data->testimonials = Testimonials::get();
        $data->faq = Faq::get();
        $data->blogs = Blog::orderBy('id','DESC')->limit(4)->get();
        $data->state = State::where('countryId',2)->get();
        $data->compareallSupplier = Setting::where('key','wecomparealloftheseenegysupplier')->get();
        $data->whatWeProvide = Setting::where('key','whatweprovide')->get();
        $data->pincode = $this->getPincodeList();
    	return view('welcome',compact('data'));
    }

    public function getPincodeList()
    {
        $pincodes = SupplierPincode::select('*')->groupBy('pincode')->orderBy('stateId')->get();
        foreach ($pincodes as $key => $pincode) {
            $pincode->autocomplete = $pincode->pincode.', '.$pincode->landmark.' , '.$pincode->state->name;
        }
        return $pincodes;
    }

    public function aboutUs(Request $req)
    {
        $data = (object)[];
        $data->aboutus = Setting::where('key','about_us')->first();
        $data->whychooseus = Setting::where('key','whychooseus')->get();
    	return view('frontend.about-us',compact('data'));
    }

    public function indivisualUtilities(Request $req)
    {
        $data = (object)[];
        $data->pincode = $this->getPincodeList();
        $data->whychooseus = Setting::where('key','whychooseus')->get();
        return view('frontend.indivisualUtilities',compact('data'));
    }

    public function howItWorks(Request $req)
    {
        $data = (object)[];
        $data->howItWorks = Setting::where('key','how_it_works')->orderBy('id','ASC')->get();
    	return view('frontend.howItWorks',compact('data'));
    }

    public function getBlogs(Request $req)
    {
        $data = (object)[];
        $data->category = BlogCategory::get();
        $data->blogs = Blog::select('*');
        if(!empty($req->category)){
            $data->blogs = $data->blogs->where('blogCategoryId',base64_decode($req->category));    
        }
        $data->blogs = $data->blogs->orderBy('id','desc')->get();
        return view('frontend.blog',compact('data'));
    }

    public function blogDetails(Request $req,$blogId)
    {
        $data = (object)[];
        $data->blogs = Blog::findOrfail($blogId);
        $data->category = BlogCategory::get();
        return view('frontend.blogdetails',compact('data'));
    }

    public function contactUs(Request $req)
    {
        return view('frontend.contactus');
    }

    public function saveContactUs(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10|numeric',
            'email' => 'required|email|max:255|string',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);
        $contact = new ContactUs();
            $contact->type = 2;
            $contact->name = $req->name;
            $contact->phone = $req->phone;
            $contact->email = $req->email;
            $contact->subject = emptyCheck($req->subject);
            $contact->description = $req->message;
        $contact->save();
        $sucess['thankyou'] = 'Thankyou for contact with us, we will guide you soon!';
        return back()->withErrors($sucess);
    }

    public function getSuppliersBySearch($request)
    {
        $suppliers = SupplierPincode::select('userId');
        if(!empty($request->stateId)){
            $stateId = base64_decode($request->stateId);
            $suppliers = $suppliers->where('stateId',$stateId);
        }
        if(!empty($request->search)){
            $search = explode(',',$request->search)[0];
            $suppliers = $suppliers->where('pincode','like',"%$search%")->orwhere('landmark','like',"%$request->search%");
        }
        $suppliers = $suppliers->groupBy('userId')->pluck('userId')->toArray();
        return $suppliers;
    }

    public function rfqBeforeProductListing(Request $req)
    {
        $suppliers = $this->getSuppliersBySearch($req);$error = [];
        if(!empty($request->stateId)){
            $error['state'] = 'We donot provide the service at selected State';
        }
        if(!empty($request->search)){
            $error['search'] = 'We donot provide the service at given pincode';
        }
        if(count($suppliers) > 0){
            $requestedData = $req->all();
            return view('frontend.rfqBeforeProductListing',compact('requestedData'));
        }
        return back()->withErrors($error)->withInput($req->all());
    }

    public function rfqSaveBeforeProductListing(Request $req)
    {
        $req->validate([
            "energy_type" => "required|string|in:gas_electricity,gas,electricity",
            "type_of_property" => "required|string|in:home,business",
            "property_type" => "required|string|in:own,rent",
            "areyoumovingintothisproperty" => "required|string|in:yes,no",
            "moving_date" => "nullable|date",
            "entertainment_service" => "required|string|in:yes,no",
            "gas_connection" => "required|string|in:yes,no,donotknow",
            "electricity_usage" => "required|string|in:low,medium,high",
            "understand" => "required|in:1",
            "termsandconsition" => "required|in:1",
            'otherPageRequest' => '',
        ]);
        DB::beginTransaction();
        try{
            $newRfq = new Rfq;
                if(auth()->user()){
                    $newRfq->userId = auth()->user()->id;
                }else{
                    $req->validate([
                        'user_name' => 'required|string|max:200',
                        'user_email' => 'required|email|string',
                        'user_mobile' => 'required|numeric|digits:10',
                        'referral' => ['nullable','string','exists:referrals,code'],
                    ]);
                    $user = User::where('email',$req->user_email)->first();
                    if(!$user){
                        $data = [
                            'name' => $req->user_name,
                            'email' => $req->user_email,
                            'mobile' => $req->user_mobile,
                            'password' => generateUniqueAlphaNumeric(8),
                            'referral' => emptyCheck($req->referral),
                            'user_type' => 3,
                        ];
                        $userObject = (object)$data;
                        $user = $this->createNewUser($userObject);
                    }
                    if($user){$newRfq->userId = $user->id;}
                }
                $newRfq->energy_type = $req->energy_type;
                $newRfq->type_of_property = $req->type_of_property;
                $newRfq->property_type = $req->property_type;
                $newRfq->areyoumovingintothisproperty = $req->areyoumovingintothisproperty;
                $newRfq->moving_date = emptyCheck($req->moving_date,true);
                $newRfq->entertainment_service = $req->entertainment_service;
                $newRfq->gas_connection = $req->gas_connection;
                $newRfq->electricity_usage = $req->electricity_usage;
                $newRfq->understand = $req->understand;
                $newRfq->termsandconsition = $req->termsandconsition;
            $newRfq->save();
            DB::commit();
            $url = 'rfqId='.$newRfq->id.'&eneryType='.$newRfq->energy_type.'&property_type='.$newRfq->type_of_property.'&';
            if(!empty($req->otherPageRequest)){
                foreach ($req->otherPageRequest as $key => $value) {
                    $url .= $key.'='.$value.'&';
                }
            }
            return redirect(route('product.listing').'?'.$url);
        }catch(Exception $e){
            DB::rollback();
            $errors['termsandconsition'] = 'Something went wrong please try after sometime';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

    public function productListing(Request $req)
    {
        $suppliers = $this->getSuppliersBySearch($req);$error = [];
        if(!empty($req->stateId)){
            $error['state'] = 'We donot provide the service at given State';
        }
        if(!empty($req->search)){
            $error['search'] = 'We donot provide the service at given pincode';
        }
        if(count($suppliers) > 0){
            return $this->productListingwithAuth($req,$suppliers);
            // if(auth()->user())
            //     return $this->productListingwithAuth($req,$suppliers);
            // else
            //     return $this->productListingwithoutAuth($req,$suppliers);
        }
        return back()->withErrors($error)->withInput($req->all());
    }

    public function getPlanlistingData(Request $req,$supplierId)
    {
        $productData = Product::select('*')->whereIn('created_by',$supplierId);
        if(!empty($req->productId)){
            $productData = $productData->where('id',$req->productId);
        }
        if(!empty($req->property_type)){
            $productData = $productData->whereRaw('FIND_IN_SET("'.$req->property_type.'",product_for)');
        }
        $count = $productData->count();
        $productData = $productData->paginate(5);
        $productData->count = $count;
        return $productData;
    }

    public function productListingwithAuth(Request $req,$supplierId)
    {
        $productData = $this->getPlanlistingData($req,$supplierId);
        $request = $req->all();$state = [];
        if(!empty($req->stateId)){
            $state = State::where('id',base64_decode($req->stateId))->first();
        }
        return view('frontend.listing.productWithAuth', compact('productData','state','request'));
    }

    // public function productListingwithoutAuth(Request $req,$supplierId)
    // {
    //     $productData = $this->getPlanlistingData($req,$supplierId);
    //     $request = $req->all();
    //     return view('frontend.listing.productWithoutAuth', compact('productData','request'));
    // }

    public function productDetails(Request $req,$planId)
    {
        $productData = Product::findOrFail($planId);
        $data = (object)[];
        $data->faq = Faq::get();
        $data->tariff_type = TariffType::where('companyId',$productData->company_id)->get();
        return view('frontend.listing.product_details', compact('productData','data','req'));
    }

    public function emailPlanDetails(Request $req)
    {
        $rules = [
            'rfqId' => 'required|min:1|numeric',
            'productId' => 'required|min:1|numeric',
            'plan_rate_link' => 'nullable|string',
            'plan_rate_link_gas' => 'nullable|string',
        ];
        $validate = validator()->make($req->all(),$rules);
        if(!$validate->fails()){
            $rfq = Rfq::where('id',$req->rfqId)->first();
            if($rfq){
                $product = Product::where('id',$req->productId)->first();
                if($product){
                    $data = [
                        'name' => $rfq->user->name,
                        'content1' => 'Thanks for choosing us to help you find an Electricity & Gas plan that suits you.',
                        'content2' => 'Please follow the link to the product information (Please note this is a system generated quote and not an actual transfer request. If you are interested in switching to this offer please click on the link below or email us at email@test.com):',
                        'provider' => $product->company->name,
                        'electricty_plan_name' => $product->name,
                        'elecrticty_plan_tariff_details' => '',
                        'gas_plan_name' => $product->name,
                        'gas_plan_tariff_details' => 'Available On Request',
                        'providers_terms_and_conditon' => $product->terms_condition,
                        'plan_rate_link' => emptyCheck($req->plan_rate_link),
                        'plan_rate_link_gas' => emptyCheck($req->plan_rate_link_gas),
                    ];
                    sendMail($data,'emails/emailPlanDetails',$rfq->user->email,'Your Requested Plan Details');
                    // $data['name'] => $rfq->user->name.' has requested to email plan details',
                    // sendMail($data,'emails/emailPlanDetails',$product->author->email,$rfq->user->email.' Requested Plan Details');
                    return successResponse('An email has been sent to '.$rfq->user->email.' with the plan details',$req->all());
                }
            }
            return errorResponse('Something went wrong please try after some time');
            
        }
        return errorResponse($validate->errors()->first());
    }

    public function indivisualStates(Request $req)
    {
        $data = (object)[];
        $data->whychooseus = Setting::where('key','whychooseus')->get();
        $data->compareallSupplier = Setting::where('key','wecomparealloftheseenegysupplier')->get();
        $data->state = State::where('countryId',2)->get();
        $data->pincode = $this->getPincodeList();
        return view('frontend.forms.indivisualStates',compact('data'));
    }

    public function membership(Request $req)
    {
        $membership = Membership::get();
        return view('frontend.membership',compact('membership'));
    }

    public function purchaseMembership(Request $req,$membershipId)
    {
        $membership = Membership::where('id',base64_decode($membershipId))->first();
        $data = [
            'redirectUrl' => route('membership.claimed.success',$membership->id),
            'price' => $membership->price,
        ];
        return view('stripe.index',compact('data'));
    }

    public function membershipSuccessFullPurchase(Request $req,$membershipId)
    {
        $userMembership = new UserMembership();
        $userMembership->userId = auth()->user()->id;
        $userMembership->membershipId = $membershipId;
        $userMembership->stripeTransactionId = $req->stripeTransactionId;
        $userMembership->save();
        return redirect(route('payment.successfull.thankyou',$req->stripeTransactionId));
    }
    
}
