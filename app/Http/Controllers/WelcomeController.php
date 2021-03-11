<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $req)
    {
    	return view('welcome');
    }

    public function aboutUs(Request $req)
    {
    	return view('about-us');
    }
}
