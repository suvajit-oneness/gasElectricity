<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;use App\Model\UserType;
use App\User;use App\Model\ContactUs;use DB;
use App\Model\Testimonials;use App\Model\Faq;
use Hash;use App\Model\BlogCategory;use App\Model\Setting;
use App\Model\Membership;use App\Model\HowItWork;
use App\Model\Company;use App\Model\Product;use App\Model\ProductRating;
use App\Model\ProductFeature;use App\Model\ProductTating;
use App\Model\ProductGas;use App\Model\ProductElectricity;
use App\Model\ProductMomentum;use App\Model\ProductDiscount;
use App\Model\State;use App\Model\Country;

class AdminController extends Controller
{

/****************************** Users ******************************/
	public function getUsers(Request $req)
	{
		$users = User::select('*')->where('user_type','!=',1);
        $users = $users->orderBy('users.id','desc')->get();
		return view('admin.user.index',compact('users'));
	}

	public function manageUser(Request $req)
	{
		$rules = [
			'userId' => 'required|min:1|numeric',
			'action' => 'required|in:block,unblock,delete',
		];
		$validator = validator()->make($req->all(),$rules);
		if(!$validator->fails()){
			$user = User::find($req->userId);
			if($user){
				if($req->action == 'block'){
					$user->status = 0;$user->save();
				}elseif($req->action == 'unblock'){
					$user->status = 1;$user->save();
				}elseif($req->action == 'delete'){
					$user->delete();
				}
				return successResponse('status Updated Success',$user);
			}
			return errorResponse('Invalid User Id');
		}
		return errorResponse($validator->errors()->first());
	}

    public function createUser(Request $req)
    {
        $userType = UserType::orderBy('id','desc')->get();
        return view('admin.user.create',compact('userType'));
    }

    public function saveUser(Request $req)
    {
        $req->validate([
            'user_type' => 'required|min:1|numeric',
            'image' => '',
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|digits:10|numeric',
            'referral' => 'string|nullable|exists:referrals,code',
        ]);
        DB::beginTransaction();
        try {
            $random = randomGenerator();
            $user = new User();
            $user->user_type = $req->user_type;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->mobile = $req->mobile;
            if($req->hasFile('image')){
                $image = $req->file('image');
                $image->move('upload/users/image/',$random.'.'.$image->getClientOriginalExtension());
                $imageurl = 'upload/users/image/'.$random.'.'.$image->getClientOriginalExtension();
                $user->image = $imageurl;
            }
            $user->password = Hash::make($random);
            $user->save();
            $this->setReferralCode($user,$req->referral);
            DB::commit();
            // sendMail();
            return redirect(route('admin.users'))->with('Success','User Added SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
            $errors['email'] = 'Something went wrong please try after sometime!';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

/****************************** Contact Us ******************************/
	public function contactUs(Request $req)
	{
		$contactUs = ContactUs::where('type',2)->orderBy('contactedBy','ASC')->get();
		return view('admin.reports.contact',compact('contactUs'));
	}

    public function saveRemarkOfContactUs(Request $req)
    {
        $req->validate([
            'contactUsId' => 'required|min:1|numeric',
            'remark' => 'required|max:200|string',
        ]);
        $contact = ContactUs::where('id',$req->contactUsId)->first();
        $contact->contactedBy = auth()->user()->id;
        $contact->remarks = $req->remark;
        $contact->save();
        return back()->with('Success','Remarks Saved Success');
    }

/****************************** Blog Category ******************************/
    public function blogsCategory(Request $req)
    {
        $category = BlogCategory::with('blogs')->get();
        return view('admin.blogs.category.index',compact('category'));
    }

    public function saveBlogCategory(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = BlogCategory::where('name',$req->name)->first();
        if(!$category){
            $category = new BlogCategory();
            $category->name = $req->name;
            $category->save();
            return back()->with('Success','Blog Category Added SuccessFully');
        }
        $errors['name'] = 'This Blog Category already exist!';
        return back()->withErrors($errors)->withInput($req->all());
    }

    public function updateBlogCategory(Request $req)
    {
        $req->validate([
            'blogCategoryId' => 'required|numeric|min:1',
            'updatename' => 'required|string|max:255',
        ]);
        $category = BlogCategory::where('id','!=',$req->blogCategoryId)->where('name',$req->updatename)->first();
        if(!$category){
            $category = BlogCategory::where('id',$req->blogCategoryId)->first();
            if($category){
                $category->name = $req->updatename;
                $category->save();
                return back()->with('Success','Blog Category Updated SuccessFully');
            }
            $errors['updatename'] = 'Something went wrong please try after sometime!';
            return back()->withErrors($errors)->withInput($req->all());
        }
        $errors['updatename'] = 'This Blog Category already exist!';
        return back()->withErrors($errors)->withInput($req->all());
    }

    public function deleteBlogCategory(Request $req)
    {
        $rules = [
            'id' => 'required|numeric|min:1',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $blogCategory = BlogCategory::find($req->id);
            if($blogCategory){
                Blog::where('blogCategoryId',$blogCategory->id)->update(['blogCategoryId'=>0]);
                $blogCategory->delete();
                return successResponse('Blog Category Deleted Success'); 
            }
            return errorResponse('Invalid Blog Category Id');
        }
        return errorResponse($validator->errors()->first());
    }

/****************************** Blog ******************************/
	public function blogs(Request $req,$blogCategoryId = 0)
	{
		$blogs = Blog::select('*')/*->with('category')->with('posted')*/;
        if($blogCategoryId > 0){
            $blogs = $blogs->where('blogCategoryId',$blogCategoryId);
        }
        $blogs = $blogs->get();
        return view('admin.blogs.index',compact('blogs'));
	}

    public function createBlog(Request $req)
    {
        $category = BlogCategory::get();
        return view('admin.blogs.create',compact('category'));
    }

    public function saveBlog(Request $req)
    {
        $req->validate([
            'image' => '',
            'title' => 'required',
            'description' => '',
            'category' => '',
        ]);
        $blog = new Blog();
        $blog->title = $req->title;
        if(!empty($req->category)){
            $blog->blogCategoryId = $req->category;
        }
        $blog->postedBy = auth()->user()->id;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $random = randomGenerator();
            $image->move('upload/admin/blogs/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = 'upload/admin/blogs/'.$random.'.'.$image->getClientOriginalExtension();
            $blog->image = $imageurl;
        }
        $blog->description = emptyCheck($req->description);
        $blog->save();
        return redirect(route('admin.blogs'))->with('Success','Blog Added SuccessFully');
    }

    public function editBlog(Request $req,$id)
    {
        $blog = Blog::find($id);
        $category = BlogCategory::get();
        return view('admin.blogs.edit',compact('blog','category'));
    }

    public function updateBlog(Request $req)
    {
        $req->validate([
            'blogId' => 'required|min:1|numeric',
            'image' => '',
            'title' => 'required',
            'description' => '',
            'category' => '',
        ]);
        $blog = Blog::find($req->blogId);
        $blog->title = $req->title;
        if(!empty($req->category)){
            $blog->blogCategoryId = $req->category;
        }
        if($req->hasFile('image')){
            $image = $req->file('image');
            $random = randomGenerator();
            $image->move('upload/admin/blogs/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = 'upload/admin/blogs/'.$random.'.'.$image->getClientOriginalExtension();
            $blog->image = $imageurl;
        }
        $blog->description = emptyCheck($req->description);
        $blog->save();
        return redirect(route('admin.blogs'))->with('Success','Blog Updated SuccessFully');
    }

    public function deleteBlog(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $blog = Blog::find($req->id);
            if($blog){
            	$blog->delete();
            	return successResponse('Blog Deleted Success');	
            }
        	return errorResponse('Invalid Blog Id');
        }
        return errorResponse($validator->errors()->first());
    }

/****************************** Testimonials ******************************/
    public function testimonials(Request $req)
    {
    	$testimonials = Testimonials::get();
    	return view('admin.testimonials.index',compact('testimonials'));
    }

    public function createTestimonial(Request $req)
    {
        return view('admin.testimonials.create');
    }

    public function saveTestimonial(Request $req)
    {
        $req->validate([
            'name' => 'required|max:200',
            'title' => 'required|max:200',
            'designation' => 'required|max:200',
            'quote' => 'required',
            'image' => '',
        ]);
        $testimonial = new Testimonials();
        $testimonial->name = $req->name;
        $testimonial->title = $req->title;
        $testimonial->designation = $req->designation;
        $testimonial->quote = $req->quote;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $random = randomGenerator();
            $image->move('upload/admin/testimonial/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = 'upload/admin/testimonial/'.$random.'.'.$image->getClientOriginalExtension();
            $testimonial->image = $imageurl;
        }
        $testimonial->save();
        return redirect(route('admin.testimonial'))->with('Success','Testimonial Added SuccessFully');
    }

    public function editTestimonial(Request $req, $id)
    {
        $testimonial = Testimonials::where('id',$id)->first();
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    public function updateTestimonial(Request $req)
    {
        $req->validate([
            'testimonialId' => 'required|numeric|min:1',
            'name' => 'required|max:200',
            'title' => 'required|max:200',
            'designation' => 'required|max:200',
            'quote' => 'required',
            'image' => '',
        ]);
        $testimonial = Testimonials::find($req->testimonialId);
        $testimonial->name = $req->name;
        $testimonial->title = $req->title;
        $testimonial->designation = $req->designation;
        $testimonial->quote = $req->quote;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $random = randomGenerator();
            $image->move('upload/admin/testimonial/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = 'upload/admin/testimonial/'.$random.'.'.$image->getClientOriginalExtension();
            $testimonial->image = $imageurl;
        }
        $testimonial->save();
        return redirect(route('admin.testimonial'))->with('Success','Testimonial Updated SuccessFully');
    }

    public function deleteTestimonial(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $testimonial = Testimonials::find($req->id);
            if($testimonial){
            	$testimonial->delete();
            	return successResponse('Testimonial Deleted Success');	
            }
        	return errorResponse('Invalid Testimonial Id');
        }
        return errorResponse($validator->errors()->first());
    }

/****************************** How It Works ******************************/
    public function howItWorks(Request $req)
    {
        $howitWork = Setting::where('key','how_it_works')->get();
        return view('admin.setting.howitworks',compact('howitWork'));
    }

    public function updateHowItWorks(Request $req)
    {
        $req->validate([
            'howitWorkHeading' => 'required|string|max:200',
            // 'howitWorkId' => 'required|array',
            // 'howitWorkId.*' => 'required|numeric',
            'howitWorkImage' => 'nullable|array',
            'howitWorkImage.*' => 'nullable|image',
            'old_howitWorkimage' => 'nullable|array',
            'old_howitWorkimage.*' => 'nullable|string',
            'howitWorktitle' => 'required|array',
            'howitWorktitle.*' => 'required|string|max:200',
            'howitWorkdescription' => 'required|array',
            'howitWorkdescription.*' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            Setting::where('key','how_it_works')->delete();
            foreach($req->howitWorktitle as $key => $newData){
                $howitWork = new Setting;
                $howitWork->key = 'how_it_works';
                $howitWork->heading = $req->howitWorkHeading;
                if(!empty($req->howitWorkImage[$key])){
                    $image = $req->file('howitWorkImage')[$key];
                    $random = randomGenerator();
                    $image->move('upload/admin/howitworks/',$random.'.'.$image->getClientOriginalExtension());
                    $imageurl = 'upload/admin/howitworks/'.$random.'.'.$image->getClientOriginalExtension();
                    $howitWork->image = $imageurl;
                }elseif(!empty($req->old_howitWorkimage[$key])){
                    $howitWork->image = $req->old_howitWorkimage[$key];
                }
                $howitWork->title = $req->howitWorktitle[$key];
                $howitWork->description = $req->howitWorkdescription[$key];
                $howitWork->save();
            }   
            DB::commit();
            return back()->with('Success','How It Works Updated SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('Errors','Something went wrong please try after sometime');
        }
    }

    public function deleteHowItWorks(Request $req,$id)
    {
        Setting::where('id',$id)->where('key','how_it_works')->delete();
        return back()->with('Success','Deleted SuccessFully');
    }

/****************************** About Us ******************************/
    public function aboutUs(Request $req)
    {
        $aboutus = Setting::where('key','about_us')->first();
        return view('admin.setting.about-us',compact('aboutus'));
    }

    public function saveaboutUs(Request $req)
    {
        $req->validate([
            'aboutUsId' => 'required|numeric|min:1',
            'aboutusheading' => 'required|max:200',
            'aboutustitle' => 'required|max:200',
            'aboutusdescription' => 'required|string',
            'aboutusImage' => '',
        ]);
        $about = Setting::where('id',$req->aboutUsId)->where('key','about_us')->first();
        if($about){
            $about->heading = $req->aboutusheading;
            $about->title = $req->aboutustitle;
            $about->description = $req->aboutusdescription;
            if($req->hasFile('aboutusImage')){
                $image = $req->file('aboutusImage');
                $random = randomGenerator();
                $image->move('upload/admin/aboutus/',$random.'.'.$image->getClientOriginalExtension());
                $imageurl = 'upload/admin/aboutus/'.$random.'.'.$image->getClientOriginalExtension();
                $about->image = $imageurl;
            }
            $about->save();
            return back()->with('Success','About Us Updated SuccessFully');
        }
        return back()->with('Error','Invalid About Us Details');
    }

/****************************** Why Choose Us ******************************/
    public function whyChooseUs(Request $req)
    {
        $whychooseUs = Setting::where('key','whychooseus')->get();
        return view('admin.setting.whychooseus',compact('whychooseUs'));
    }

    public function updateWhyChooseUs(Request $req)
    {
        $req->validate([
            'whychooseheading' => 'required|string|max:200',
            // 'whychooseId' => 'required|array',
            // 'whychooseId.*' => 'required|numeric',
            'whychooseimage' => 'nullable|array',
            'whychooseimage.*' => 'nullable|image',
            'old_whychooseimage' => 'nullable|array',
            'old_whychooseimage.*' => 'nullable|string',
            'whychoosetitle' => 'required|array',
            'whychoosetitle.*' => 'required|string|max:200',
            'whychoosedescription' => 'required|array',
            'whychoosedescription.*' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            Setting::where('key','whychooseus')->delete();
            foreach($req->whychoosetitle as $key => $newData){
                $whychoose = new Setting;
                $whychoose->key = 'whychooseus';
                if(!empty($req->whychooseimage[$key])){
                    $image = $req->file('whychooseimage')[$key];
                    $random = randomGenerator();
                    $image->move('upload/admin/whychooseus/',$random.'.'.$image->getClientOriginalExtension());
                    $imageurl = 'upload/admin/whychooseus/'.$random.'.'.$image->getClientOriginalExtension();
                    $whychoose->image = $imageurl;
                }elseif(!empty($req->old_whychooseimage[$key])){
                    $whychoose->image = $req->old_whychooseimage[$key];
                }
                $whychoose->heading = $req->whychooseheading;
                $whychoose->title = $req->whychoosetitle[$key];
                $whychoose->description = $req->whychoosedescription[$key];
                $whychoose->save();
            }   
            DB::commit();
            return back()->with('Success','Why Choose Us Updated SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('Errors','Something went wrong please try after sometime');
        }
    }

    public function deleteWhyChooseUs(Request $req,$id)
    {
        // Setting::where('id',$id)->where('key','whychooseus')->delete();
        return back()->with('Success','Deleted SuccessFully');
    }


/****************************** FAQ ******************************/
    public function faq(Request $req)
    {
        $faq = Faq::get();
        return view('admin.faq.index',compact('faq'));
    }

    public function createFaq(Request $req)
    {
        return view('admin.faq.create');
    }

    public function saveFaq(Request $req)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'required',
        ]);
        $faq = new Faq();
        $faq->title = $req->title;
        $faq->description = $req->description;
        $faq->save();
        return redirect(route('admin.faq'))->with('Success','Faq Added SuccessFully');
    }

    public function editFaq(Request $req, $id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit',compact('faq'));
    }

    public function updateFaq(Request $req)
    {
        $req->validate([
            'faqId' => 'required|min:1|numeric',
            'title' => 'required|max:200',
            'description' => 'required',
        ]);
        $faq = Faq::find($req->faqId);
        $faq->title = $req->title;
        $faq->description = $req->description;
        $faq->save();
        return redirect(route('admin.faq'))->with('Success','Faq Updated SuccessFully');
    }

    public function deleteFaq(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $faq = Faq::find($req->id);
            if($faq){
                $faq->delete();
                return successResponse('Faq Deleted Success');  
            }
            return errorResponse('Invalid Faq Id');
        }
        return errorResponse($validator->errors()->first());
    }
/****************************** Referral List ******************************/
    public function getReferredToList(Request $req,$userId)
    {
        $user = User::findorFail($userId);
        return view('admin.referral.referred_to',compact('user'));
    }

/****************************** User List ******************************/
    public function getUserPoints(Request $req,$userId)
    {
        $user = User::findorFail($userId);
        return view('auth.user.point_info',compact('user'));
    }
/****************************** Membership ******************************/
    public function membership(Request $req)
    {
        $membership = Membership::select('*')->get();
        return view('admin.membership.index',compact('membership'));
    }

    public function createMembership(Request $req)
    {
        return view('admin.membership.create');
    }

    public function saveMembership(Request $req)
    {
        $req->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|max:999999',
            'duration' => 'required|numeric|max:99',
            'description' => 'nullable|string'
        ]);
        $newmember = new Membership();
        $newmember->title = $req->title;
        $newmember->price = $req->price;
        $newmember->duration = $req->duration;
        $newmember->description = $req->description;
        $newmember->save();
        return redirect(route('admin.membership'))->with('Success','Membership Created SuccessFully');
    }

    public function updateMembershipStatus(Request $req)
    {
        $rules = [
            'id' => 'required|min:1|numeric',
            'is_active' => 'required|in:0,1',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            Membership::where('id',$req->id)->update(['is_active' => $req->is_active]);
            return successResponse('Membership status updated success');
        }
        return errorResponse($validator->errors()->first());
    }

/****************************** Company ******************************/
	public function companies(Request $req,$companyId = 0)
	{
        $companies = Company::select('*');
        if($companyId > 0){
            $companies = $companies->where('id',$companyId);
        }
        $companies = $companies->get();
        return view('company.index',compact('companies'));
	}

    public function createCompany()
    {
        return view('company.create');
    }

    public function saveCompany(Request $req)
    {
        $req->validate([
            'logo' => '',
            'name' => 'required|max:200|string',
            'description' => '',
        ]);
        $company = new Company();
        $company->name = $req->name;
        $company->created_by = auth()->user()->id;
        if($req->hasFile('logo')){
            $logo = $req->file('logo');
            $random = randomGenerator();
            $logo->move('upload/companies/',$random.'.'.$logo->getClientOriginalExtension());
            $logourl = 'upload/companies/'.$random.'.'.$logo->getClientOriginalExtension();
            $company->logo = $logourl;
        }
        $company->description = emptyCheck($req->description);
        $company->save();
        return redirect(route(urlPrefix().'.companies'))->with('Success','Company Added SuccessFully');
        // return redirect(route('admin.companies'))->with('Success','Company Added SuccessFully');
    }

    public function editCompany(Request $req,$id)
    {
        $company = Company::find($id);
        return view('company.edit',compact('company'));
    }

    public function updateCompany(Request $req)
    {
        $req->validate([
            'companyId' => 'required|min:1|numeric',
            'logo' => '',
            'name' => 'required',
            'description' => '',
        ]);
        $company = Company::find($req->companyId);
        $company->name = $req->name;
        if($req->hasFile('logo')){
            $logo = $req->file('logo');
            $random = randomGenerator();
            $logo->move('upload/companies/',$random.'.'.$logo->getClientOriginalExtension());
            $logourl = 'upload/companies/'.$random.'.'.$logo->getClientOriginalExtension();
            $company->logo = $logourl;
        }
        $company->description = emptyCheck($req->description);
        $company->save();
        return redirect(route(urlPrefix().'.companies'))->with('Success','Company Updated SuccessFully');
        // return redirect(route('admin.companies'))->with('Success','Company Updated SuccessFully');
    }

    public function deleteCompany(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $company = Company::find($req->id);
            if($company){
            	// $company->delete();
                return errorResponse('Something went wrong please try after sometime');
            	return successResponse('Company Deleted Success');
            }
        	return errorResponse('Invalid Company Id');
        }
        return errorResponse($validator->errors()->first());
    }

/****************************** Product ******************************/
	public function products($productId = 0)
	{
        $products = Product::select('*');
        if($productId > 0){
            $products = $products->where('id',$productId);
        }
        if(urlPrefix() != 'admin'){
            $products = $products->where('created_by',auth()->user()->id);
        }
        $products = $products->get();
        return view('product.index',compact('products'));
	}

    public function createProduct()
    {
        $companies = Company::get();
        return view('product.create', compact('companies'));
    }

    public function saveProduct(Request $req)
    {
        $req->validate([
            'company_id' => 'required|min:1|numeric|exists:companies,id',
            'name' => 'required|max:200|string',
            'tag' => 'required|max:200|string',
            'tag_description' => 'nullable|string',
            'gas_title' => 'required|max:200|string',
            'gas_price' => 'required|numeric|max:99999',
            'electricty_title' => 'required|max:200|string',
            'electricty_price' => 'required|numeric|max:99999',
        ]);
        DB::beginTransaction();
        try {
            $product = new Product();
                $product->name = $req->name;
                $product->company_id = $req->company_id;
                $product->tag = $req->tag;
                $product->tag_description = emptyCheck($req->tag_description);
                $product->created_by = auth()->user()->id;
            $product->save();
            $gas = new ProductGas();
                $gas->title = $req->gas_title;
                $gas->product_id = $product->id;
                $gas->price = $req->gas_price;
            $gas->save();
            $electricity = new ProductElectricity();
                $electricity->title = $req->electricty_title;
                $electricity->product_id = $product->id;
                $electricity->price = $req->electricty_price;
            $electricity->save();
            DB::commit();
            return redirect(route(urlPrefix().'.products'))->with('Success','Product Added SuccessFully');
            // return redirect(route('admin.products'))->with('Success','Product Added SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
            $errors['company_id'] = 'Something went wrong please try after sometime!';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

    public function editProduct(Request $req,$productId)
    {
        $product = Product::find($productId);
        $companies = Company::get();
        return view('product.edit',compact('product', 'companies'));
    }

    public function updateProduct(Request $req,$productId)
    {
        $req->validate([
            'productId' => 'required|min:1|numeric',
            'companyId' => 'required|min:1|numeric|exists:companies,id',
            'name' => 'required|max:200|string',
            'tag' => 'required|max:200|string',
            'tag_description' => 'nullable|string',
            'gas_title' => 'required|max:200|string',
            'gas_price' => 'required|numeric|max:99999',
            'electricty_title' => 'required|max:200|string',
            'electricty_price' => 'required|numeric|max:99999',
        ]);
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($req->productId);
                $product->name = $req->name;
                $product->company_id = $req->companyId;
                $product->tag = $req->tag;
                $product->tag_description = emptyCheck($req->tag_description);
            $product->save();
            $gas = ProductGas::where('product_id',$product->id)->first();
                $gas->title = $req->gas_title;
                $gas->price = $req->gas_price;
            $gas->save();
            $electricity = ProductElectricity::where('product_id',$product->id)->first();
                $electricity->title = $req->electricty_title;
                $electricity->price = $req->electricty_price;
            $electricity->save();
            DB::commit();
            return redirect(route(urlPrefix().'.products'))->with('Success','Product Updated SuccessFully');
            // return redirect(route('admin.products'))->with('Success','Product Updated SuccessFully');
        }catch(Exception $e) {
            DB::rollback();
            $errors['company_id'] = 'Something went wrong please try after sometime!';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

    public function deleteProduct(Request $req,$productId)
    {
        $rules = [
            'productId' => 'required|numeric|min:1',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $product = Product::find($req->productId);
            if($product){
                ProductFeature::where('product_id',$product->id)->delete();
                ProductRating::where('product_id',$product->id)->delete();
                ProductGas::where('product_id',$product->id)->delete();
                ProductElectricity::where('product_id',$product->id)->delete();
            	$product->delete();
            	return successResponse('Product Deleted Success');	
            }
        	return errorResponse('Invalid Product Id');
        }
        return errorResponse($validator->errors()->first());
    }

/****************************** Product Feature ******************************/
	public function productFeature(Request $req,$productId)
	{
        $product = Product::findOrFail($productId);
        return view('product.feature.index',compact('product'));
	}

    public function createProductFeature(Request $req,$productId)
    {
        $product = Product::findOrFail($productId);
        return view('product.feature.create', compact('product'));
    }

    public function saveProductFeature(Request $req,$productId)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|string',
        ]);
        $feature = new ProductFeature();
        $feature->product_id = $productId;
        $feature->title = $req->title;
        $feature->description = emptyCheck($req->description);
        $feature->save();
        return redirect(route(urlPrefix().'.product.feature',$productId))->with('Success','Product Feature Added SuccessFully');
        // return redirect(route('admin.product.feature',$productId))->with('Success','Product Feature Added SuccessFully');
    }

    public function editProductFeature(Request $req,$productId,$featureId)
    {
        $feature = ProductFeature::where('id',$featureId)->where('product_id',$productId)->first();
        if($feature){
            return view('product.feature.edit',compact('feature'));
        }
        return redirect(route(urlPrefix().'.product.feature',$productId))->with('Errors','Something went wrong please try after sometime');
        // return redirect(route('admin.product.feature',$productId))->with('Errors','Something went wrong please try after sometime');
    }

    public function updateProductFeature(Request $req,$productId,$featureId)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|string',
        ]);
        $feature = ProductFeature::where('id',$featureId)->where('product_id',$productId)->first();
        if($feature){
            $feature->title = $req->title;
            $feature->description = emptyCheck($req->description);
            $feature->save();
            return redirect(route(urlPrefix().'.product.feature',$productId))->with('Success','Product Feature Updated SuccessFully');
            // return redirect(route('admin.product.feature',$productId))->with('Success','Product Feature Updated SuccessFully');
        }
        return back()->with('Errors','Something went wrong please try after sometime');
    }

    public function deleteProductFeature(Request $req)
    {
        $rules = [
            'productId' => 'required|min:1|numeric',
            'featureId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $feature = ProductFeature::where('id',$req->featureId)->where('product_id',$req->productId)->first();
            if($feature){
            	$feature->delete();
            	return successResponse('Feature Deleted Success');
            }
        	return errorResponse('Invalid Feature Id');
        }
        return errorResponse($validator->errors()->first());
    }

    /****************************** Product Momenta ******************************/
	public function productMomenta(Request $req,$productId)
	{
        $product = Product::findOrFail($productId);
        return view('product.momenta.index',compact('product'));
	}

    public function saveProductMomenta(Request $req,$productId)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|string',
        ]);
        $momenta = new ProductMomentum();
        $momenta->productId = $productId;
        $momenta->title = $req->title;
        $momenta->description = $req->description;
        $random = randomGenerator();
        if($req->hasFile('momenta_icon')){
            $image = $req->file('momenta_icon');
            $image->move('upload/products/momenta/image/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = 'upload/products/momenta/image/'.$random.'.'.$image->getClientOriginalExtension();
            $momenta->icon = $imageurl;
        }
        $momenta->save();
        return redirect(route(urlPrefix().'.product.momenta',$productId))->with('Success','Product Momenta Added SuccessFully');
    }

    public function updateProductMomenta(Request $req,$productId,$momentaId)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|string',
        ]);
        $momenta = ProductMomentum::where('id',$momentaId)->where('productId',$productId)->first();
        if($momenta){
            $momenta->title = $req->title;
            $momenta->description = $req->description;
            $random = randomGenerator();
            if($req->hasFile('momenta_icon')){
                if($momenta->icon != '' && \File::exists($momenta->icon)){
                    unlink($momenta->icon);
                }
                $image = $req->file('momenta_icon');
                $image->move('upload/products/momenta/image/',$random.'.'.$image->getClientOriginalExtension());
                $imageurl = 'upload/products/momenta/image/'.$random.'.'.$image->getClientOriginalExtension();
                $momenta->icon = $imageurl;
            }
            $momenta->save();
            return redirect(route(urlPrefix().'.product.momenta',$productId))->with('Success','Product Momenta Updated SuccessFully');
            // return redirect(route('admin.product.feature',$productId))->with('Success','Product Feature Updated SuccessFully');
        }
    }
    public function deleteProductMomenta(Request $req)
    {
        $rules = [
            'productId' => 'required|min:1|numeric',
            'momentaId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $momenta = ProductMomentum::where('id',$req->momentaId)->where('productId',$req->productId)->first();
            if($momenta){
            	$momenta->delete();
            	return successResponse('Momenta Deleted Success');
            }
        	return errorResponse('Invalid Momenta Id');
        }
        return errorResponse($validator->errors()->first());
    }

    /****************************** Product Discount ******************************/
	public function productDiscount(Request $req,$productId)
	{
        $product = Product::findOrFail($productId);
        return view('product.discount.index',compact('product'));
	}

    public function saveProductDiscount(Request $req,$productId)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|string',
        ]);
        $discount = new ProductDiscount();
        $discount->productId = $productId;
        $discount->title = $req->title;
        $discount->description = $req->description;
        $discount->save();
        return redirect(route(urlPrefix().'.product.discount',$productId))->with('Success','Product Discount Added SuccessFully');
        // return redirect(route('admin.product.feature',$productId))->with('Success','Product Feature Added SuccessFully');
    }

    public function updateProductDiscount(Request $req,$productId,$discountId)
    {
        $req->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|string',
        ]);
        $discount = ProductDiscount::where('id',$discountId)->where('productId',$productId)->first();
        if($discount){
            $discount->title = $req->title;
            $discount->description = $req->description;
            $discount->save();
            return redirect(route(urlPrefix().'.product.discount',$productId))->with('Success','Product Discount Updated SuccessFully');
            // return redirect(route('admin.product.feature',$productId))->with('Success','Product Feature Updated SuccessFully');
        }
    }

    public function deleteProductDiscount(Request $req)
    {
        $rules = [
            'productId' => 'required|min:1|numeric',
            'discountId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $discount = ProductDiscount::where('id',$req->discountId)->where('productId',$req->productId)->first();
            if($discount){
            	$discount->delete();
            	return successResponse('Discount Deleted Success');
            }
        	return errorResponse('Invalid Discount Id');
        }
        return errorResponse($validator->errors()->first());
    }

    /****************************** States ******************************/
    public function states(Request $req)
    {
        $state = State::where('countryId',2)->get();
        return view('supplier.state',compact('state'));
    }

    public function addOrUpdateState(Request $req)
    {
        $req->validate([
            'form_type' => 'required|in:add,edit',
            'country' => 'required|numeric|min:1',
            'state' => 'required|string|max:200',
        ]);
        if($req->form_type == 'add'){
            $checkState = State::where('countryId',$req->country)->where('name',$req->state)->first();
            if(!$checkState){
                $state = new State();
                    $state->countryId = $req->country;
                    $state->name = $req->state;
                $state->save();
                return back()->with('Success','State Added SuccessFully');
            }
            $error['state'] = 'This State is Already Exists';
            return back()->withErrors($error)->withInput($req->all());
        }else{
            $req->validate([
                'stateId' => 'required|numeric|min:1',
            ]);
            $checkState = State::where('id','!=',$req->stateId)->where('countryId',$req->country)->where('name',$req->state)->first();
            if(!$checkState){
                $state = State::where('id',$req->stateId)->first();
                    $state->countryId = $req->country;
                    $state->name = $req->state;
                $state->save();
                return back()->with('Success','State Updated SuccessFully');
            }
            $error['state'] = 'This State is Already Exists';
            return back()->withErrors($error)->withInput($req->all());
        }
    }

    public function deleteState(Request $req)
    {
        $rules = [
            'stateId' => 'required|numeric|min:1',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $state = State::find($req->stateId);
            if($state){
                $state->delete();
                return successResponse('State Deleted Success'); 
            }
            return errorResponse('Invalid State Id');
        }
        return errorResponse($validator->errors()->first());
    }
}
