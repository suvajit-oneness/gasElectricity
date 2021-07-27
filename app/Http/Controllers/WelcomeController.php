<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Testimonials;use App\Model\BlogCategory;
use App\Model\Faq;use App\Model\Blog;use Auth;
use App\Model\ContactUs;use App\Model\Membership;
use App\Model\UserMembership;use App\Model\Setting;
use App\Model\Product;use App\Model\State;
use App\Model\SupplierPincode;

class WelcomeController extends Controller
{
    public function index(Request $req)
    {
        $data = (object)[];
        $data->testimonials = Testimonials::get();
        $data->faq = Faq::get();
        $data->blogs = Blog::limit(5)->get();
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
        $data = new WelcomeController();
        $data->category = BlogCategory::get();
        $data->blogs = Blog::with('posted')->with('likes')->with('comment');
        if(!empty($req->category)){
            $data->blogs = $data->blogs->where('blogCategoryId',base64_decode($req->category));    
        }
        $data->blogs = $data->blogs->orderBy('id','desc')->get();
        return view('frontend.blog',compact('data'));
    }

    public function blogDetails(Request $req,$blogId)
    {
        $data = new WelcomeController();
        $data->category = BlogCategory::get();
        $data->blogs = Blog::where('id',$blogId)->with('category')->with('posted')->first();
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

    public function productListing(Request $req)
    {
        $supplierId = SupplierPincode::select('userId');
        if(!empty($req->stateId)){
            $error['state'] = 'We donot provide the service at given State';
            $stateId = base64_decode($req->stateId);
            $supplierId = $supplierId->where('stateId',$stateId);
        }
        if(!empty($req->search)){
            $error['search'] = 'We donot provide the service at given pincode';
            $search = explode(',',$req->search)[0];
            $supplierId = $supplierId->where('pincode','like',"%$search%")->orwhere('landmark','like',"%$req->search%");
        }
        $supplierId = $supplierId->groupBy('userId')->pluck('userId')->toArray();
        if(count($supplierId) > 0){
            if(auth()->user())
                return $this->productListingwithAuth($req,$supplierId);
            else
                return $this->productListingwithoutAuth($req,$supplierId);
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
