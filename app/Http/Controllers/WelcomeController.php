<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Testimonials,App\Model\BlogCategory;
use App\Model\Faq,App\Model\Blog,Auth,App\User;
use App\Model\ContactUs,App\Model\Membership;
use App\Model\UserMembership,App\Model\Setting;
use App\Model\Product,App\Model\State,DB;
use App\Model\SupplierPincode,App\Model\Rfq;

class WelcomeController extends Controller
{
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
        $supplierId = SupplierPincode::select('userId');
        if(!empty($request->stateId)){
            $stateId = base64_decode($request->stateId);
            $supplierId = $supplierId->where('stateId',$stateId);
        }
        if(!empty($request->search)){
            $search = explode(',',$request->search)[0];
            $supplierId = $supplierId->where('pincode','like',"%$search%")->orwhere('landmark','like',"%$request->search%");
        }
        $supplierId = $supplierId->groupBy('userId')->pluck('userId')->toArray();
        return $supplierId;
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
                        if($user){$newRfq->userId = $user->id;}
                    }
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
            $url = 'rfqId='.$newRfq->id.'&eneryType='.$newRfq->energy_type.'&';
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
            if(auth()->user())
                return $this->productListingwithAuth($req,$suppliers);
            else
                return $this->productListingwithoutAuth($req,$suppliers);
        }
        return back()->withErrors($error)->withInput($req->all());
    }

    public function getPlanlistingData(Request $req,$supplierId)
    {
        $productData = Product::select('*')->whereIn('created_by',$supplierId);
        if(!empty($req->productId)){
            $productData = $productData->where('id',$req->productId);
        }
        $productData = $productData->paginate(3);
        return $productData;
    }

    public function productListingwithAuth(Request $req,$supplierId)
    {
        $productData = $this->getPlanlistingData($req,$supplierId);
        $request = $req->all();
        return view('frontend.listing.productWithAuth', compact('productData','request'));
    }

    public function productListingwithoutAuth(Request $req,$supplierId)
    {
        $productData = $this->getPlanlistingData($req,$supplierId);
        $request = $req->all();
        return view('frontend.listing.productWithoutAuth', compact('productData','request'));
    }

    public function productDetails(Request $req,$planId)
    {
        $productData = Product::findOrFail($planId);
        $data = (object)[];
        $data->faq = Faq::get();
        return view('frontend.listing.product_details', compact('productData','data'));
    }

    public function electricityForm(Request $req)
    {
        return view('frontend.forms.electricityForm',compact('req'));
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
