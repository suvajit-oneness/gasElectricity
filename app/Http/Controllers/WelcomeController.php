<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Testimonials, App\Model\BlogCategory;
use App\Model\Faq, App\Model\Blog, Auth, App\User;
use App\Model\ContactUs, App\Model\Membership;
use App\Model\UserMembership, App\Model\Setting;
use App\Model\Product, App\Model\State, DB, App\Model\TariffType;
use App\Model\SupplierPincode, App\Model\Rfq, App\Model\Notification;
use App\Model\UserFilledSupplierFormDetails, App\Model\Company;
use App\Model\SupplierForm, App\Model\UserFilledSupplierForm;
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
        $validate = validator()->make($req->all(), $rules);
        if (!$validate->fails()) {
            $product = Product::where('id', $req->productId)->first();
            if ($product) {
                $rfq = Rfq::where('id', $req->rfqId)->first();
                // dd($rfq);
                if ($rfq) {
                    $data = (object)[];
                    $data->company = Company::where('id', $product->company_id)->first();
                    if ($data->company) {
                        $data->supplierForm = SupplierForm::where('userId', $data->company->created_by)->where('status', 1)->get();
                        if (count($data->supplierForm) > 0) {
                            $user = $rfq->user;
                            // dd($user);
                            $latestSupplierFormForUser = $user->latestSupplierForm;
                            $user->formData = [];
                            if ($latestSupplierFormForUser) {
                                $user->formData = UserFilledSupplierFormDetails::select('key', 'value')->where('userFilledSupplierFormId', $latestSupplierFormForUser->id)->get();
                            }
                            return view('frontend.forms.suppliersFormInput', compact('data', 'product', 'rfq', 'user', 'req'));
                        }
                    }
                }
            }
        }
        return response()->json(['error' => true, 'message' => 'something went wront please try after some time']);
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
        $supplierForm = SupplierForm::where('userId', $req->supplierId)->where('status', 1)->get();
        foreach ($supplierForm as $index => $form) {
            $formInput = $form->input_type;
            if ($formInput->input_type == 'text' || $formInput->input_type == 'email' || $formInput->input_type == 'url') {
                $rule = '';
                if ($form->is_required) {
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule . '|max:200|string';
            } elseif ($formInput->input_type == 'radio') {
                $rule = '';
                if ($form->is_required) {
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule . '|string';
            } elseif ($formInput->input_type == 'checkbox') {
                $rule = '';
                if ($form->is_required) {
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule . '|array';
                $rules[$form->key . '.*'] = $rule . '|string';
            } elseif ($formInput->input_type == 'textarea') {
                $rule = '';
                if ($form->is_required) {
                    $rule .= 'required';
                }
                $rules[$form->key] = $rule . '|string';
            }
        }
        $req->validate($rules);
        // the Provided Form is Successfully validated
        DB::beginTransaction();
        try {
            $userFormData = $req->except(['_token', 'companyId', 'supplierId', 'approve', 'termsandconsition', 'eneryType', 'stateId']);
            $rfq = Rfq::where('id', $req->rfqId)->first();
            $newUserFormSubmitted = new UserFilledSupplierForm();
            $newUserFormSubmitted->userId = $rfq->userId;
            $newUserFormSubmitted->rfqId = $req->rfqId;
            $newUserFormSubmitted->productId = $req->productId;
            $newUserFormSubmitted->companyId = $req->companyId;
            $newUserFormSubmitted->supplierId = $req->supplierId;
            $newUserFormSubmitted->save();
            foreach ($userFormData as $key => $value) {
                $formDetails = new UserFilledSupplierFormDetails();
                $formDetails->userFilledSupplierFormId = $newUserFormSubmitted->id;
                $formDetails->key = $key;
                $formDetails->value = (is_array($value) ? implode(',', $value) : $value);
                $formDetails->save();
            }
            DB::commit();
            $url = '';
            if (!empty($req->stateId)) {
                $url = '&stateId=' . base64_encode($req->stateId);
            }
            // addNotification($rfq->userId,'Application saved Success, our representive will catch you shortly.');
            return redirect('/')->with('Success', 'Application saved Success, our representive will catch you shortly.');
            // return redirect(route('product.listing').'?eneryType='.$req->eneryType.''.$url);
        } catch (Exception $e) {
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
        $data->blogs = Blog::orderBy('id', 'DESC')->limit(4)->get();
        $data->state = State::where('countryId', 2)->get();
        $data->compareallSupplier = Setting::where('key', 'wecomparealloftheseenegysupplier')->get();
        $data->whatWeProvide = Setting::where('key', 'whatweprovide')->get();
        $data->pincode = $this->getPincodeList();
        return view('welcome', compact('data'));
    }

    public function getPincodeList()
    {
        $pincodes = SupplierPincode::select('*')->groupBy('pincode')->orderBy('stateId')->get();
        foreach ($pincodes as $key => $pincode) {
            $pincode->autocomplete = $pincode->pincode . ', ' . $pincode->landmark . ' , ' . $pincode->state->name;
        }
        return $pincodes;
    }

    public function aboutUs(Request $req)
    {
        $data = (object)[];
        $data->aboutus = Setting::where('key', 'about_us')->first();
        $data->whychooseus = Setting::where('key', 'whychooseus')->get();
        return view('frontend.about-us', compact('data'));
    }

    public function indivisualUtilities(Request $req)
    {
        $data = (object)[];
        $data->pincode = $this->getPincodeList();
        $data->whatWeProvide = Setting::where('key', 'whatweprovide')->get();
        $data->whychooseus = Setting::where('key', 'whychooseus')->get();
        $data->howItWorks = Setting::where('key', 'how_it_works')->orderBy('id', 'ASC')->get();
        $data->individual = Setting::where('key', 'individualutility')->orderBy('id', 'ASC')->get();
        $data->faq =  Faq::get();;
        // dd($data->individualUtility);
        return view('frontend.indivisualUtilities', compact('data'));
    }

    public function howItWorks(Request $req)
    {
        $data = (object)[];
        $data->howItWorks = Setting::where('key', 'how_it_works')->orderBy('id', 'ASC')->get();
        return view('frontend.howItWorks', compact('data'));
    }

    public function getBlogs(Request $req)
    {
        $data = (object)[];
        $data->category = BlogCategory::get();
        $data->blogs = Blog::select('*');
        if (!empty($req->category)) {
            $data->blogs = $data->blogs->where('blogCategoryId', base64_decode($req->category));
        }
        $data->allBlogs = $data->blogs->orderBy('id', 'desc')->get();
        $data->blogThree = $data->blogs->orderBy('id', 'desc')->take(3)->get();
        $data->blogFirst = $data->blogs->orderBy('id', 'desc')->take(1)->get();
        $data->pincode = $this->getPincodeList();
        // dd($data->blogs);
        return view('frontend.blog', compact('data'));
    }

    public function blogDetails(Request $req, $blogId)
    {
        $data = (object)[];
        $data->category = BlogCategory::get();
        $data->blog = Blog::findOrfail($blogId);
        $data->blogs = Blog::select('*');
        if (!empty($req->category)) {
            $data->blogs = $data->blogs->where('blogCategoryId', base64_decode($req->category));
        }
        $data->blogs = $data->blogs->orderBy('id', 'desc')->get();
        return view('frontend.blogdetails', compact('data'));
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
        if (!empty($request->stateId)) {
            $stateId = base64_decode($request->stateId);
            $suppliers = $suppliers->where('stateId', $stateId);
        }
        if (!empty($request->search)) {
            $search = explode(',', $request->search)[0];
            $suppliers = $suppliers->where('pincode', 'like', "%$search%")->orwhere('landmark', 'like', "%$request->search%");
        }
        $suppliers = $suppliers->groupBy('userId')->pluck('userId')->toArray();
        return $suppliers;
    }

    public function rfqBeforeProductListing(Request $req)
    {
        $req->replace($req->except('_token'));
        $suppliers = $this->getSuppliersBySearch($req);
        $error = [];
        if (!empty($req->stateId)) {
            $error['state'] = 'We donot provide the service at selected State';
        }
        if (!empty($req->search)) {
            $error['search'] = 'We donot provide the service at given pincode';
        }
        if (count($suppliers) > 0) {
            $requestedData = $req->all();
            return view('frontend.rfqBeforeProductListing', compact('requestedData'));
        }
        return back()->withErrors($error)->withInput($req->all());
    }

    public function ocrUploadAndGetdata(Request $req)
    {
        $rules = [
            'file' => 'required',
            'rfqId' => 'nullable',
        ];
        $validate = validator()->make($req->all(), $rules);
        if (!$validate->fails()) {
            // sleep(7);
            // return $this->readLines($req,"LUMO ENERGY 13526 UNI BERWICK Electricity Account cur-no Energy Australia Pty Limited ABN 69100 528 327 Enquiries 1300115 866 Live chat lumoenergy.com.au/chat Email info@lumoenergy.com.au gam - 8pm Monday to Friday / Bam - 5pm Saturday (AEST/AEDT) II-VEIRA Your Energy Usage FOR ELECTRICITY SUPPLY AT UNIT 4/18 Faults & Emergencies 24 hours Account Number: Due Date Total Due (Incl GST) Issue Date Tax Invoice AUSNE NIL NIL 17 MAY 21 3806 Your average daily usage: peak Shoulder 31 24.8 18.6 124 62 Off peak VIC Greenhouse Gas 2 8 Transactions since previous account (Incl GST) Previous Invoice Amount Payment Received - Thank You Balance Brought Forward Current transactions (Incl GST) Electricity Charges Total current transactions (Incl GST) BALANCE (Incl GST) Total GST for this account is $8.30 $96 24 $233.50 Cr $137.26 Cr $91.27 $91.27 $45.99 Cr Nov Dec Jan Feb Mar Apr Curr 2020 2021 Average daily usage cost for this account (incl. STP): $3.04 $2.14 Step 1 Average daily usage for this account: 8.47 kWh Your greenhouse gas emissions: 0.28 Tonnes. For more information see www.switchon.vic.gov.au O The Victorian Default Offer is a reasonably priced electricity offer set by Victoria's independent regulator. Contact us on 1300 653 534 to discuss the suitability of this plan for you. If you are experiencing financial hardship please contact us for assistance. Paying your Account Pay by Direct Debit Call us on 1300115 866 to set up Direct Debit. Pay on our Website By AMEX, VISA or MasterCard. lumoen r orna ay Ref No Pay by Phone Call 1300 553 615 to pay anytime by AMEX, VISA or MasterCard. Ref NO Post a Cheque Payable to Lumo Energy with this payment slip attached to: Lumo Energy GPO Box 5450 Melbourne VIC 3001 Payment Slip Account Number: Amount Due (incl GST): Page 1 of 2 NIL PAY Telephone & Internet Banking - BPAY@ Contact your bank or financial institution to make this payment from your cheque, savings, debit, credit card or transaction account. More info: www.bpay.com.au Biller Code: 275602 Ref No: 4137 8513114 In Person POST bill a Present this invoice with your payment at any Australia Post outlet. Usage and Supplv Details FOR ELECTRICITY SUPPLY AT UNIT 4/18 Payments since your last account ERWICK, VIC3806 21/04/2021 Total Payments Received Payment Received - THANK YOU Account Number: Next read date within two days of: $233.50 cr $233.50 cr Remote Meter Read Index Meter: Register Index Read Reads based on remotely read interval data 4 El 24450.107 Date/Time 15/04/2021 00:00 Index Read 24703.779 Usage kWh 254 254 254 30 days Date/Time 15/05/2021 00:00 CJOM KWH Current transactions Electricity Charges Charges based on actual read Your Plan Single Rate NMI Rate c/kWh (incl GST) 25.278 90.200 c/day 6 From 15 April 2021 to 14 May 2021 (30 days) Tariff Description Anytime Step 1 Total Anytime Meter Number 4 5 Charges (incl GST) $64.21 $64.21 $27.06 $8.30 $91.27 Service to Property Charge Total GST for Charges Total Electricity Charges Correspondence Lumo Energy PO Box 4136 East Richmond 3121 Fax: 1300136 891 LUMO ENERGY Concession Information Have a valid concession card? For information on State Government Concession eligibility, including the Utility Relief Grant Scheme (URGS), please contact Lumo Energy on 1300 115 866 Payment Assistance For payment assistance, a payment extension, or other payment frequency options, call us on 1300115 866. Complaints Process Our Customer Solutions staff will aim to resolve your enquiry at first contact. Complaints may also be escalated to a Team Manager or Complaint Resolution Specialist if required. Call 1300115 866 Hearing or Speech Impaired? Call the National Relay Service on 133 677. Interpreter Service (ezispeakTM) Call 1300171764 Yrcnpeoia Al€pgnv€(aq Dich vu thöng dich. Page 2 of 2");
            return $this->postOCRFILES($req); // calling OCR API
        }
        return errorResponse($validate->errors()->first());
    }

    public function rfqSaveBeforeProductListing(Request $req)
    {
        $req->validate([
            'rfqId' => 'nullable|min:1|numeric',
            'OCRFormField' => 'nullable',
            // 'OCRFormField' => 'required',
            "energy_type" => "required|string|in:gas_electricity,gas,electricity",
            "type_of_property" => "required|string|in:home,business",

            "kwh_usage" => 'required|min:1|string',
            "kwh_rate" => 'required|min:1|string',
            "serviceChargedPeriod" => 'required|min:1|string',
            "serviceChargedRate" => 'required|min:1|string',

            "electricity_usage" => "required|string|in:low,medium,high",
            "understand" => "required|in:1",
            "termsandconsition" => "required|in:1",
            "otherPageRequest" => "nullable|array",
            "otherPageRequest.*" => "required|string",
            "ocr" => 'nullable',
        ], [
            'OCRFormField.*' => 'Please upload your Electricity/ Gas Bill',
            'understand.*' => 'Please accept the terms & conditions'
        ]);

        // if ($req->OCRFormField == null) {
        //     # code...
        // } else {
        //     # code...
        // }

        DB::beginTransaction();
        try {
            if (!empty($req->rfqId)) {
                $newRfq = Rfq::where('id', $req->rfqId)->first();
                if (!$newRfq) {
                    $newRfq = new Rfq;
                }
            } else {
                $newRfq = new Rfq;
            }
            if (auth()->user()) {
                $newRfq->userId = auth()->user()->id;
            }
            $newRfq->energy_type = $req->energy_type;
            $newRfq->type_of_property = $req->type_of_property;
            $newRfq->kwh_usage = $req->kwh_usage;
            $newRfq->kwh_rate = $req->kwh_rate;
            $newRfq->serviceChargedPeriod = $req->serviceChargedPeriod;
            $newRfq->serviceChargedRate = $req->serviceChargedRate;
            $newRfq->electricity_usage = $req->electricity_usage;
            $newRfq->understand = $req->understand;
            $newRfq->termsandconsition = $req->termsandconsition;
            $newRfq->save();
            DB::commit();
            $url = [
                'rfqId' => $newRfq->id,
                'eneryType' => $newRfq->energy_type,
                'property_type' => $newRfq->type_of_property,
            ];
            if (!empty($req->otherPageRequest) && count($req->otherPageRequest) > 0) {
                foreach ($req->otherPageRequest as $key => $value) {
                    $url[$key] = $value;
                }
            }
            return redirect(route('product.listing', $url));
        } catch (Exception $e) {
            DB::rollback();
            $errors['termsandconsition'] = 'Something went wrong please try after sometime';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

    public function rfqSaveBeforeProductListingOld(Request $req)
    {
        dd($req->all());
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
        try {
            $newRfq = new Rfq;
            if (auth()->user()) {
                $newRfq->userId = auth()->user()->id;
            } else {
                $req->validate([
                    'user_name' => 'required|string|max:200',
                    'user_email' => 'required|email|string',
                    'user_mobile' => 'required|numeric|digits:10',
                    'referral' => ['nullable', 'string', 'exists:referrals,code'],
                ]);
                $user = User::where('email', $req->user_email)->first();
                if (!$user) {
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
                if ($user) {
                    $newRfq->userId = $user->id;
                }
            }
            $newRfq->energy_type = $req->energy_type;
            $newRfq->type_of_property = $req->type_of_property;
            $newRfq->property_type = $req->property_type;
            $newRfq->areyoumovingintothisproperty = $req->areyoumovingintothisproperty;
            $newRfq->moving_date = emptyCheck($req->moving_date, true);
            $newRfq->entertainment_service = $req->entertainment_service;
            $newRfq->gas_connection = $req->gas_connection;
            $newRfq->electricity_usage = $req->electricity_usage;
            $newRfq->understand = $req->understand;
            $newRfq->termsandconsition = $req->termsandconsition;
            $newRfq->save();
            DB::commit();
            $url = 'rfqId=' . $newRfq->id . '&eneryType=' . $newRfq->energy_type . '&property_type=' . $newRfq->type_of_property . '&';
            if (!empty($req->otherPageRequest)) {
                foreach ($req->otherPageRequest as $key => $value) {
                    $url .= $key . '=' . $value . '&';
                }
            }
            return redirect(route('product.listing') . '?' . $url);
        } catch (Exception $e) {
            DB::rollback();
            $errors['termsandconsition'] = 'Something went wrong please try after sometime';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

    public function productListing(Request $req)
    {
        $rules = [
            'rfqId' => 'required|min:1|numeric',
            'eneryType' => 'nullable|string',
            'property_type' => 'nullable|string',
            'search' => 'nullable|string',
            'stateId' => 'nullable|string',
        ];
        $validate = validator()->make($req->all(), $rules);
        if (!$validate->fails()) {
            $suppliers = $this->getSuppliersBySearch($req);
            $error = [];
            if (!empty($req->stateId)) {
                $error['state'] = 'We donot provide the service at given State';
            }
            if (!empty($req->search)) {
                $error['search'] = 'We donot provide the service at given pincode';
            }
            $rfq = Rfq::where('id', $req->rfqId)->first();
            if (count($suppliers) > 0 && $rfq) {
                return $this->productListingwithAuth($req, $suppliers, $rfq);
            }
            return back()->withErrors($error)->withInput($req->all());
        }
        return errorResponse('Something went wrong please try after sometime');
    }

    public function getPlanlistingData(Request $req, $supplierId, $rfq)
    {
        // dd($supplierId);
        $userBillRate = number_format(($rfq->kwh_rate) / ($rfq->kwh_usage), 2);
        $productData = Product::select('products.*')->whereIn('products.created_by', $supplierId);
        if (!empty($req->productId)) {
            $productData = $productData->where('products.id', $req->productId);
        }
        if (!empty($req->property_type)) {
            $productData = $productData->whereRaw('FIND_IN_SET("' . $req->property_type . '",product_for)');
        }
        if ($rfq->energy_type == 'electricity') {
            $productData = $productData->leftjoin('product_electricities', 'product_electricities.product_id', '=', 'products.id')->whereBetween('product_electricities.price', [0, $userBillRate]);
        } elseif ($rfq->energy_type == 'gas') {
            $productData = $productData->leftjoin('product_gases', 'product_gases.product_id', '=', 'products.id')->whereBetween('product_gases.price', [0, $userBillRate]);
        } elseif ($rfq->energy_type == 'gas_electricity') {
            $productData = $productData->leftjoin('product_electricities', 'product_electricities.product_id', '=', 'products.id')->whereBetween('product_electricities.price', [0, $userBillRate]);
            $productData = $productData->leftjoin('product_gases', 'product_gases.product_id', '=', 'products.id')->whereBetween('product_gases.price', [0, $userBillRate]);
        }
        $count = $productData->count();
        // $productData = $productData->paginate(5);
        $productData = $productData->get();
        $productData->count = $count;
        return $productData;
    }

    public function productListingwithAuth(Request $req, $supplierId, $rfq)
    {
        $productData = $this->getPlanlistingData($req, $supplierId, $rfq);
        // dd($productData);
        $request = $req->all();
        $state = [];
        if (!empty($req->stateId)) {
            $state = State::where('id', base64_decode($req->stateId))->first();
        }
        return view('frontend.listing.productWithAuth', compact('productData', 'state', 'request', 'rfq'));
    }

    public function productDetails(Request $req, $planId)
    {
        $rules = [
            'rfqId' => 'required|min:1|numeric',
            'eneryType' => 'nullable|string',
            'property_type' => 'nullable|string',
        ];
        $validate = validator()->make($req->all(), $rules);
        if (!$validate->fails()) {
            $rfq = Rfq::where('id', $req->rfqId)->first();
            $user = $req->user();
            if ($rfq) {
                $productData = Product::findOrFail($planId);
                $userPoductEnroled = userProductEnrolled($req, $rfq, $productData, $user);
                $data = (object)[];
                $data->faq = Faq::get();
                $data->tariff_type = TariffType::where('companyId', $productData->company_id)->get();
                return view('frontend.listing.product_details', compact('productData', 'data', 'req', 'rfq'));
            }
        }
        return errorResponse('Something went wrong please try after sometime');
    }

    public function emailPlanDetails(Request $req)
    {
        $rules = [
            'rfqId' => 'required|min:1|numeric',
            'productId' => 'required|min:1|numeric',
            'plan_rate_link' => 'nullable|string',
            'plan_rate_link_gas' => 'nullable|string',
            'userId' => 'required|min:1|numeric',
        ];
        $validate = validator()->make($req->all(), $rules);
        if (!$validate->fails()) {
            $user = $req->user();
            $rfq = Rfq::where('id', $req->rfqId)->first();
            if ($rfq) {
                if ($rfq->userId == 0) {
                    $rfq->userId = $req->userId;
                }
                $rfq->email_request = 1;
                $rfq->save();
                $product = Product::where('id', $req->productId)->first();
                if ($product) {
                    $userPoductEnroled = userProductEnrolled($req, $rfq, $product, $user);
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
                    sendMail($data, 'emails/emailPlanDetails', $rfq->user->email, 'Your Requested Plan Details');
                    return successResponse('An email has been sent to ' . $rfq->user->email . ' with the plan details', $req->all());
                }
            }
            return errorResponse('Something went wrong please try after some time');
        }
        return errorResponse($validate->errors()->first());
    }

    public function indivisualStates(Request $req)
    {
        $data = (object)[];
        $data->whychooseus = Setting::where('key', 'whychooseus')->get();
        $data->compareallSupplier = Setting::where('key', 'wecomparealloftheseenegysupplier')->get();
        $data->state = State::where('countryId', 2)->get();
        $data->pincode = $this->getPincodeList();
        return view('frontend.forms.indivisualStates', compact('data'));
    }

    public function membership(Request $req)
    {
        $membership = Membership::get();
        return view('frontend.membership', compact('membership'));
    }

    public function purchaseMembership(Request $req, $membershipId)
    {
        $membership = Membership::where('id', base64_decode($membershipId))->first();
        $data = [
            'redirectUrl' => route('membership.claimed.success', $membership->id),
            'price' => $membership->price,
        ];
        return view('stripe.index', compact('data'));
    }

    public function membershipSuccessFullPurchase(Request $req, $membershipId)
    {
        $userMembership = new UserMembership();
        $userMembership->userId = auth()->user()->id;
        $userMembership->membershipId = $membershipId;
        $userMembership->stripeTransactionId = $req->stripeTransactionId;
        $userMembership->save();
        return redirect(route('payment.successfull.thankyou', $req->stripeTransactionId));
    }
}