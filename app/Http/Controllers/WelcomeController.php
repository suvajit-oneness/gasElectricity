<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Testimonials;
use App\Model\Faq;

class WelcomeController extends Controller
{
    public function index(Request $req)
    {
        $data = new WelcomeController();
        $data->testimonials = Testimonials::get();
        $data->faq = Faq::get(); 
    	return view('welcome',compact('data'));
    }

    public function aboutUs(Request $req)
    {
    	return view('about-us');
    }

    public function howItWorks(Request $req)
    {
    	return view('howItWorks');
    }

    public function getBlogs(Request $req)
    {
        return view('blog');
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
