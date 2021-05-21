<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;use App\Model\UserType;
use App\User;use App\Model\ContactUs;use DB;
use App\Model\Testimonials;use App\Model\Faq;
use Hash;use App\Model\BlogCategory;use App\Model\Setting;
use App\Model\Membership;use App\Model\HowItWork;
use App\Model\Company;use App\Model\Product;
use App\Model\ProductFeature;use App\Model\ProductTating;
use App\Model\GasData;use App\Model\ElectricityData;

class AdminController extends Controller
{

/****************************** Users ******************************/
	public function getUsers(Request $req)
	{
		$users = User::select('*')->where('user_type',3);/*with('referred_through')->with('referred_to')->*/
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
        ]);
        $random = randomGenerator();
        $user = new User();
        $user->user_type = $req->user_type;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->mobile = $req->mobile;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $image->move('upload/users/image/',$random.'.'.$image->getClientOriginalExtension());
            $imageurl = url('upload/users/image/'.$random.'.'.$image->getClientOriginalExtension());
            $user->image = $imageurl;
        }
        $user->password = Hash::make($random);
        $user->save();
        // sendMail();
        return redirect(route('admin.users'))->with('Success','User Added SuccessFully');
    }

/****************************** Contact Us ******************************/
	public function contactUs(Request $req)
	{
		$contactUs = ContactUs::orderBy('id','desc')->get();
		return view('admin.reports.contact',compact('contactUs'));
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
            'id' => 'required',
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
            $imageurl = url('upload/admin/blogs/'.$random.'.'.$image->getClientOriginalExtension());
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
            $imageurl = url('upload/admin/blogs/'.$random.'.'.$image->getClientOriginalExtension());
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
            $imageurl = url('upload/admin/testimonial/'.$random.'.'.$image->getClientOriginalExtension());
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
            $imageurl = url('upload/admin/testimonial/'.$random.'.'.$image->getClientOriginalExtension());
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
        $howitWork = HowItWork::first();
        return view('admin.setting.howitworks',compact('howitWork'));
    }

    public function updateHowItWorks(Request $req)
    {
        $req->validate([
            'howItWorksId' => 'required|numeric|min:1',
            'main_heading' => 'required|max:200|string',
            'title1' => 'required',
            'title2' => 'required',
            'description' => 'required',
            'media' => '',
            'review_heading' => 'required|max:200|string',
            'review_image' => '',
            'review_description' => 'required',
            'compare_heading' => 'required|max:200|string',
            'compare_image' => '',
            'compare_description' => 'required',

            'switchonspot_heading' => 'required|max:200|string',
            'switchonspot_image' => '',
            'switchonspot_description' => 'required',
        ]);
        $howitWork = HowItWork::where('id',$req->howItWorksId)->first();
        $howitWork->main_heading = $req->main_heading;
        $howitWork->title1 = $req->title1;
        $howitWork->title2 = $req->title2;
        $howitWork->description = $req->description;
        $howitWork->review_heading = $req->review_heading;
        $howitWork->review_description = $req->review_description;
        $howitWork->compare_heading = $req->compare_heading;
        $howitWork->compare_description = $req->compare_description;
        $howitWork->switchonspot_heading = $req->switchonspot_heading;
        $howitWork->switchonspot_description = $req->switchonspot_description;
        $random = randomGenerator();
        if($req->hasFile('media')){
            $media = $req->file('media');
            $media->move('upload/admin/howitWorks/media/',$random.'.'.$media->getClientOriginalExtension());
            $mediaurl = url('upload/admin/howitWorks/media/'.$random.'.'.$media->getClientOriginalExtension());
            $howitWork->media = $mediaurl;
        }
        if($req->hasFile('review_image')){
            $reviewImage = $req->file('review_image');
            $reviewImage->move('upload/admin/howitWorks/review/',$random.'.'.$reviewImage->getClientOriginalExtension());
            $reviewImageurl = url('upload/admin/howitWorks/review/'.$random.'.'.$reviewImage->getClientOriginalExtension());
            $howitWork->review_image = $reviewImageurl;
        }
        if($req->hasFile('compare_image')){
            $compareImage = $req->file('review_image');
            $compareImage->move('upload/admin/howitWorks/compare/',$random.'.'.$compareImage->getClientOriginalExtension());
            $compareImageurl = url('upload/admin/howitWorks/compare/'.$random.'.'.$compareImage->getClientOriginalExtension());
            $howitWork->compare_image = $compareImageurl;
        }
        if($req->hasFile('switchonspot_image')){
            $switchImage = $req->file('review_image');
            $switchImage->move('upload/admin/howitWorks/switchonspot/',$random.'.'.$switchImage->getClientOriginalExtension());
            $switchOnSpotImageurl = url('upload/admin/howitWorks/switchonspot/'.$random.'.'.$switchImage->getClientOriginalExtension());
            $howitWork->switchonspot_image = $switchOnSpotImageurl;
        }
        $howitWork->save();
        return back()->with('Success','How it works Updated SuccessFully');
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
                $imageurl = url('upload/admin/aboutus/'.$random.'.'.$image->getClientOriginalExtension());
                $about->image = $imageurl;
            }
            $about->save();
            return back()->with('Success','About Us Updated SuccessFully');
        }
        return back()->with('Error','Invalid About Us Details');
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

    public function getReferredToList(Request $req,$userId)
    {
        $user = User::findorFail($userId);
        return view('admin.referral.referred_to',compact('user'));
    }

    public function getUserPoints(Request $req,$userId)
    {
        $user = User::findorFail($userId);
        return view('admin.point.info',compact('user'));
    }

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
	public function companies($companyId = 0)
	{
        $companies = Company::select('*');
        if($companyId > 0){
            $companies = $companies->where('id',$companyId);
        }
        $companies = $companies->get();
        return view('admin.company.index',compact('companies'));
	}

    public function createCompany()
    {
        return view('admin.company.create');
    }

    public function saveCompany(Request $req)
    {
        $req->validate([
            'logo' => '',
            'name' => 'required',
            'description' => '',
        ]);
        $company = new Company();
        $company->name = $req->name;
        $company->created_by = auth()->user()->id;
        if($req->hasFile('logo')){
            $logo = $req->file('logo');
            $random = randomGenerator();
            $logo->move('upload/admin/companies/',$random.'.'.$logo->getClientOriginalExtension());
            $logourl = url('upload/admin/companies/'.$random.'.'.$logo->getClientOriginalExtension());
            $company->logo = $logourl;
        }
        $company->description = emptyCheck($req->description);
        $company->save();
        return redirect(route('admin.companies'))->with('Success','Company Added SuccessFully');
    }

    public function editCompany(Request $req,$id)
    {
        $company = Company::find($id);
        return view('admin.company.edit',compact('company'));
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
            $logo->move('upload/admin/companies/',$random.'.'.$logo->getClientOriginalExtension());
            $logourl = url('upload/admin/companies/'.$random.'.'.$logo->getClientOriginalExtension());
            $company->logo = $logourl;
        }
        $company->description = emptyCheck($req->description);
        $company->save();
        return redirect(route('admin.companies'))->with('Success','Company Updated SuccessFully');
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
            	$company->delete();
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
        $products = $products->get();
        return view('admin.product.index',compact('products'));
	}

    public function createProduct()
    {
        $companies = Company::all();
        return view('admin.product.create', compact('companies'));
    }

    public function saveProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'company_id' => 'required|min:1|numeric',
            'tag' => 'required',
            'tag_description' => '',
        ]);
        $product = new Product();
        $product->name = $req->name;
        $product->company_id = $req->company_id;
        $product->tag = $req->tag;
        $product->tag_description = emptyCheck($req->tag_description);
        $product->created_by = auth()->user()->id;
        $product->save();
        return redirect(route('admin.products'))->with('Success','Product Added SuccessFully');
    }

    public function editProduct(Request $req,$id)
    {
        $product = Product::find($id);
        $companies = Company::all();
        return view('admin.product.edit',compact('product', 'companies'));
    }

    public function updateProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'company_id' => 'required|min:1|numeric',
            'tag' => 'required',
            'tag_description' => '',
        ]);
        $product = Product::find($req->productId);
        $product->name = $req->name;
        $product->company_id = $req->company_id;
        $product->tag = $req->tag;
        $product->tag_description = emptyCheck($req->tag_description);
        $product->save();
        return redirect(route('admin.products'))->with('Success','Product Updated SuccessFully');
    }

    public function deleteProduct(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $product = Product::find($req->id);
            if($product){
            	$product->delete();
            	return successResponse('Product Deleted Success');	
            }
        	return errorResponse('Invalid Product Id');
        }
        return errorResponse($validator->errors()->first());
    }

    /****************************** Product Feature ******************************/
	public function productsFeature()
	{
		$features = ProductFeature::all();
        return view('admin.product.feature.index',compact('features'));
	}

    public function createProductFeature()
    {
        $products = Product::all();
        return view('admin.product.feature.create', compact('products'));
    }

    public function saveProductFeature(Request $req)
    {   
        $req->validate([
            'title' => 'required',
            'product_id' => 'required|min:1|numeric',
            'description' => '',
        ]);
        $feature = new ProductFeature();
        $feature->title = $req->title;
        $feature->product_id = $req->product_id;
        $feature->description = emptyCheck($req->description);
        $feature->save();
        return redirect(route('admin.products.feature'))->with('Success','Product Feature Added SuccessFully');
    }

    public function editProductFeature($id)
    {
        $feature = ProductFeature::find($id);
        $products = Product::all();
        return view('admin.product.feature.edit',compact('products', 'feature'));
    }

    public function updateProductFeature(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'product_id' => 'required|min:1|numeric',
            'description' => '',
        ]);
        $feature = ProductFeature::find($req->featureId);
        $feature->title = $req->title;
        $feature->product_id = $req->product_id;
        $feature->description = emptyCheck($req->description);
        $feature->save();
        return redirect(route('admin.products.feature'))->with('Success','Product Feature Updated SuccessFully');
    }

    public function deleteProductFeature(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $feature = ProductFeature::find($req->id);
            if($feature){
            	$feature->delete();
            	return successResponse('Feature Deleted Success');	
            }
        	return errorResponse('Invalid Feature Id');
        }
        return errorResponse($validator->errors()->first());
    }

    /****************************** Product Gas Data ******************************/
	public function productsGas()
	{
		$gas = GasData::all();
        return view('admin.product.gas.index',compact('gas'));
	}

    public function createProductGas()
    {
        $products = Product::all();
        return view('admin.product.gas.create', compact('products'));
    }

    public function saveProductGas(Request $req)
    {   
        $req->validate([
            'title' => 'required',
            'product_id' => 'required|min:1|numeric',
            'price' => 'numeric',
        ]);
        $gas = new GasData();
        $gas->title = $req->title;
        $gas->product_id = $req->product_id;
        $gas->price = $req->price;
        $gas->created_by = auth()->user()->id;
        $gas->save();
        return redirect(route('admin.products.gas'))->with('Success','Product Gas Data Added SuccessFully');
    }

    public function editProductGas($id)
    {
        $gas = GasData::find($id);
        $products = Product::all();
        return view('admin.product.gas.edit',compact('products', 'gas'));
    }

    public function updateProductGas(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'product_id' => 'required|min:1|numeric',
            'price' => 'numeric',
        ]);
        $gas = GasData::find($req->gasId);
        $gas->title = $req->title;
        $gas->product_id = $req->product_id;
        $gas->price = $req->price;
        $gas->save();
        return redirect(route('admin.products.gas'))->with('Success','Product Gas Data Updated SuccessFully');
    }

    public function deleteProductGas(Request $req)
    {
        $rules = [
            'id' => 'required',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $gas = GasData::find($req->id);
            if($gas){
            	$gas->delete();
            	return successResponse('Product Gas Data Deleted Success');	
            }
        	return errorResponse('Invalid Product Gas Data Id');
        }
        return errorResponse($validator->errors()->first());
    }

    /****************************** Product Electricity Data ******************************/
	// public function productsElectricity()
	// {
	// 	$electricity = ElectricityData::all();
    //     return view('admin.product.electricity.index',compact('electricity'));
	// }

    // public function createProductGas()
    // {
    //     $products = Product::all();
    //     return view('admin.product.gas.create', compact('products'));
    // }

    // public function saveProductGas(Request $req)
    // {   
    //     $req->validate([
    //         'title' => 'required',
    //         'product_id' => 'required|min:1|numeric',
    //         'price' => 'numeric',
    //     ]);
    //     $gas = new GasData();
    //     $gas->title = $req->title;
    //     $gas->product_id = $req->product_id;
    //     $gas->price = $req->price;
    //     $gas->created_by = auth()->user()->id;
    //     $gas->save();
    //     return redirect(route('admin.products.gas'))->with('Success','Product Gas Data Added SuccessFully');
    // }

    // public function editProductGas($id)
    // {
    //     $gas = GasData::find($id);
    //     $products = Product::all();
    //     return view('admin.product.gas.edit',compact('products', 'gas'));
    // }

    // public function updateProductGas(Request $req)
    // {
    //     $req->validate([
    //         'title' => 'required',
    //         'product_id' => 'required|min:1|numeric',
    //         'price' => 'numeric',
    //     ]);
    //     $gas = GasData::find($req->gasId);
    //     $gas->title = $req->title;
    //     $gas->product_id = $req->product_id;
    //     $gas->price = $req->price;
    //     $gas->save();
    //     return redirect(route('admin.products.gas'))->with('Success','Product Gas Data Updated SuccessFully');
    // }

    // public function deleteProductGas(Request $req)
    // {
    //     $rules = [
    //         'id' => 'required',
    //     ];
    //     $validator = validator()->make($req->all(),$rules);
    //     if(!$validator->fails()){
    //         $gas = GasData::find($req->id);
    //         if($gas){
    //         	$gas->delete();
    //         	return successResponse('Product Gas Data Deleted Success');	
    //         }
    //     	return errorResponse('Invalid Product Gas Data Id');
    //     }
    //     return errorResponse($validator->errors()->first());
    // }
}
