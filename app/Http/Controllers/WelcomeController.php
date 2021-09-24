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
use App\Model\EmailRequest;
use App\Traits\OCRTraits;

class WelcomeController extends Controller
{
    use OCRTraits;

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
        // dd($this->readLines("LUMO\r\nENERGY\r\n11184\r\nUNI\r\nBERWICK\r\nYour Energy Usage\r\nFOR GAS SUPPLY AT UNIT 4/1\r\nYour avera e dail usa e:\r\nGas Account\r\ncur-no Energy Australia Pty Limited ABN 69100 528 327\r\nEnquiries 1300115 866\r\nLive chat lumoenergy.com.au/chat\r\nEmail info@lumoenergy.com.au\r\ngam - 8pm Monday to Friday / Bam - 5pm Saturday (AEST/AEDT)\r\nII-VEIRA\r\nERWICK, VIC 3806\r\nFaults & Emergencies\r\n24 hours\r\nAccount Number:\r\nDue Date\r\nTotal Due (Incl GST)\r\nTax Invoice\r\n1800 427 532\r\nAGN\r\n01 JUN 21\r\n$17.39\r\n13 MAY 21\r\nUNIT 4/18\r\n150\r\n120\r\n90\r\n60\r\n30\r\nERWICK, VIC 3806\r\nTransactions since previous account (Incl GST)\r\n11 Jan 2021\r\n12 Mar 2021 Current Read\r\nPrevious Invoice Amount\r\nPayment Received - Thank You\r\nBalance Brought Forward\r\nCurrent transactions (Incl GST)\r\nGas Charges\r\nTotal current transactions (Incl GST)\r\nTOTAL AMOUNT DUE (Incl GST)\r\nTotal GST for this account is $16.32\r\nAverage daily usage cost for this account (incl. ST P): $2.94\r\nAverage daily usage for this account: 108.97 MJ\r\nFor more information see www.switchon.vic.gov.au\r\nYOU'RE ON OUR BEST RATES!\r\nYou can compare offers by visiting the Victorian Energy\r\nCompare website at compare.energy.vic.gov.au\r\nO\r\nIf you are experiencing financial hardship please contact us for assistance.\r\n$77.90\r\n$240.00 Cr\r\n$162.10 Cr\r\n$179.49\r\n$179.49\r\n$17.39\r\nPage 1 of 2\r\n01 JUN 21\r\n$17.39\r\nPaying your Account\r\nTelephone & Internet Banking -\r\nBPAY@\r\nContact your bank or financial\r\nPAY\r\ninstitution to make this payment\r\nfrom your cheque, savings, debit,\r\ncredit card or transaction account.\r\nMore info: www.bpay.com.au\r\nBiller Code: 275602\r\nRef No: 4138 2258115\r\nIn Person\r\nPOST\r\nbill a Present this invoice with your\r\npayment at any Australia Post\r\noutlet.\r\nPay by Direct Debit\r\nCall us on 1300115 866 to set up Direct\r\nDebit.\r\nPay on our Website\r\nBy AMEX, VISA or MasterCard.\r\nlumoener com_au ay\r\nRef No\r\nPay by Phone\r\nCall 1300 553 615 to pay anytime by AMEX,\r\nVISA or MasterCard.\r\nRef NO\r\nPost a Cheque\r\nPayable to Lurno Energy with this payment\r\nslip attached to: Lumo Energy GPO Box\r\n5450 Melbourne VIC 3001\r\nPayment Slip\r\nAccount Number:\r\nDue Date:\r\nAmount Due (incl GST):\r\nUsage and SUDDly Details\r\nFOR GAS SUPPLY AT UNIT 4/18\r\nPayments since your last account\r\nERWICK, VIC 3806\r\n23/03/2021\r\n21/04/2021\r\nTotal Payments Received\r\nCurrent transactions\r\nGas Charges\r\nPayment Received\r\nPayment Received\r\n- THANKYOU\r\n- THANKYOU\r\nBase\r\nUsage\r\n172\r\nAccount Number:\r\nNext read date within two days of:\r\n$120.00 cr\r\n$120.00 cr\r\n$240.00 cr\r\nCharges based on actual read\r\nYour Plan\r\nOrigin Southeast\r\nFrom 13 March 2021 to 12 May 2021 (61 days)\r\nMIRN\r\n5\r\nPressure\r\nRate c/MJ\r\nTariff\r\nDescription\r\nSummer\r\nStepl\r\nStep2\r\nstep3\r\nTotal Summer\r\nMeter\r\nNumber\r\n5\r\nPrevious\r\nReading\r\n3774\r\nCurrent\r\nReading\r\n3946\r\nHeating\r\nValue\r\n38.2300\r\nFactor\r\n1.0109\r\nUsage MJ\r\n6647\r\n1671\r\n1336\r\n3640\r\n6647\r\n61 days\r\n(incl GST)\r\n2.178\r\n2.068\r\n1.921\r\n74.690\r\nc/day\r\n5\r\nCharges\r\n(incl\r\nGST)\r\n$36.39\r\n$27.63\r\n$69.91\r\n$133.93\r\n$45.56\r\n$16.32\r\n$179.49\r\nService to Property Charge\r\nTotal GST for\r\nCharges\r\nTotal Gas Charges\r\nCorrespondence\r\nLumo Energy PO Box 4136\r\nEast Richmond 3121 Fax:\r\n1300136 891\r\nLUMO\r\nENERGY\r\nConcession Information\r\nHave a valid concession card? For\r\ninformation on State Government\r\nConcession eligibility, including the\r\nUtility Relief Grant Scheme (URGS),\r\nplease contact Lumo Energy on 1300\r\n115 866\r\nPayment Assistance\r\nFor payment assistance, a payment\r\nextension, or other payment frequency\r\noptions, call us on 1300115 866.\r\nComplaints Process\r\nOur Customer Solutions staff will aim\r\nto resolve your enquiry at first\r\ncontact. Complaints may also be\r\nescalated to a Team Manager or\r\nComplaint Resolution Specialist if\r\nrequired. Call 1300115 866\r\nHearing or Speech Impaired? Call the\r\nNational Relay Service on 133 677.\r\nInterpreter Service (ezispeakTM)\r\nCall 1300171 764\r\nDich vu thöng dich\r\nYnnpE0ia AIEppnvEiag\r\nPage 2 of 2\r\n"));
        $req->replace($req->except('_token'));
        if($req->hasFile('file')){
            $response = $this->postOCRFILES($req); // calling OCR API
            if($response->error == false){
                $text = $this->convertToText($response->data); // Converting Response in to Text
                if($text->error == false){
                    $returnData = $this->readLines($text->data); // Getting the Data
                    if($returnData->error == false){
                        $stateId = $returnData->state;
                        $newRequest = new Request([
                            'stateId' => base64_encode($stateId),
                        ]);
                        return $this->rfqBeforeProductListing($newRequest);
                    }else{
                        $error['file'] = $returnData->message;
                    }
                }else{
                    $error['file'] = $text->message;
                }
            }else{
                $error['file'] = $response->message;
            }
        }else{
            $suppliers = $this->getSuppliersBySearch($req);$error = [];
            if(!empty($req->stateId)){
                $error['state'] = 'We donot provide the service at selected State';
            }
            if(!empty($req->search)){
                $error['search'] = 'We donot provide the service at given pincode';
            }
            if(count($suppliers) > 0){
                $requestedData = $req->all();
                return view('frontend.rfqBeforeProductListing',compact('requestedData'));
            }
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
                    $rfq->email_request = 1;
                    $rfq->save();
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
