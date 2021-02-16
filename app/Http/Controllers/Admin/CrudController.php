<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;use App\Model\UserType;
use App\User;use App\Model\ContactUs;
use App\Model\Testimonials;
use Hash;use App\Model\AboutUs;
use App\Model\WhyChooseUs;

class CrudController extends Controller
{
/****************************** Users ******************************/
	public function getUsers(Request $req)
	{
		$users = User::orderBy('users.id','desc')->get();
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

/****************************** Blog ******************************/
	public function blogs(Request $req)
	{
		$blogs = Blog::get();
        return view('admin.blogs.index',compact('blogs'));
	}

    public function createBlog(Request $req)
    {
        return view('admin.blogs.create');
    }

    public function saveBlog(Request $req)
    {
        $req->validate([
            'image' => '',
            'title' => 'required',
            'description' => '',
        ]);
        $blog = new Blog();
        $blog->title = $req->title;
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
        return view('admin.blogs.edit',compact('blog'));
    }

    public function updateBlog(Request $req)
    {
        $req->validate([
            'blogId' => 'required|min:1|numeric',
            'image' => '',
            'title' => 'required',
            'description' => '',
        ]);
        $blog = Blog::find($req->blogId);
        $blog->title = $req->title;
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
            'id' => 'required', // ids will accept the data with comma separate
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
            'id' => 'required', // ids will accept the data with comma separate
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
        return view('admin.setting.howitworks');
    }

/****************************** About Us ******************************/
    public function aboutUs(Request $req)
    {
        $aboutus = AboutUs::with('whychoose')->first();
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
}
