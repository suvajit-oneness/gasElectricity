<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;use App\Model\UserType;
use App\User;use App\Model\ContactUs;use DB;
use App\Model\Testimonials;use App\Model\Faq;
use Hash;use App\Model\AboutUs;use App\Model\BlogCategory;
use App\Model\WhyChooseUs;use App\Model\HowItWork;

class AdminController extends Controller
{

/****************************** Users ******************************/
	public function getUsers(Request $req)
	{
		$users = User::select('*');/*with('referred_through')->with('referred_to')->*/
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
        $aboutus = AboutUs::select('*')/*->with('whychoose')*/->first();
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
            'whychooseheading' => 'required|max:200|string',
        ]);
        $about = AboutUs::where('id',$req->aboutUsId)->first();
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
            $about->whychooseus = $req->whychooseheading;
            foreach($req->whychooseId as $key => $whychooseData){
                $whychoose = WhyChooseUs::where('id',$whychooseData)->where('aboutus_id',$about->id)->first();
                if(!empty($req->whychooseimage[$key])){
                    $image = $req->file('whychooseimage')[$key];
                    $random = randomGenerator();
                    $image->move('upload/admin/whychooseus/',$random.'.'.$image->getClientOriginalExtension());
                    $imageurl = url('upload/admin/whychooseus/'.$random.'.'.$image->getClientOriginalExtension());
                    $whychoose->image = $imageurl;
                }
                $whychoose->title = $req->whychoosetitle[$key];
                $whychoose->description = $req->whychoosedescription[$key];;
                $whychoose->save();
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

}
