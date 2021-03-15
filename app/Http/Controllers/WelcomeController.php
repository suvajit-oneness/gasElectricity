<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Testimonials;
use App\Model\Faq;use App\Model\Blog;
use App\Model\AboutUs;

class WelcomeController extends Controller
{
    public function index(Request $req)
    {
        $data = new WelcomeController();
        $data->testimonials = Testimonials::get();
        $data->faq = Faq::get();
        $data->blogs = Blog::limit(5)->get();
    	return view('welcome',compact('data'));
    }

    public function aboutUs(Request $req)
    {
        $aboutus = AboutUs::with('whychoose')->first();
    	return view('about-us',compact('aboutus'));
    }

    public function howItWorks(Request $req)
    {
    	return view('howItWorks');
    }

    public function getBlogs(Request $req)
    {
        $blogs = Blog::get();
        return view('blog',compact('blogs'));
    }

    public function blogDetails(Request $req)
    {
        return view('blogdetails');
    }

    public function contactUs(Request $req)
    {
        return view('contactus');
    }
}
