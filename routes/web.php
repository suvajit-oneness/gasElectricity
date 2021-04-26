<?php

Auth::routes(['register' => true,'logout'=>false]);
Route::any('logout','Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','WelcomeController@index');
Route::get('about-us','WelcomeController@aboutUs')->name('aboutus');
Route::get('how-it-works','WelcomeController@howItWorks')->name('how-it-works');
Route::get('blogs','WelcomeController@getBlogs')->name('blogs');
Route::get('blog/{blogId}/details','WelcomeController@blogDetails')->name('blog.detail');
Route::get('contact-us','WelcomeController@contactUs')->name('contact-us');
Route::post('contact-us','WelcomeController@saveContactUs')->name('contactus.save');
Route::get('plan-listing','WelcomeController@planListing')->name('plan.listing');
Route::get('plan-details/{planId?}','WelcomeController@planDetails')->name('plan.details');
Route::get('indivisual-states','WelcomeController@indivisualStates')->name('indivisual.state');
Route::get('electricity-form','WelcomeController@electricityForm')->name('electricityform');

// SOCIALITE SIGN-IN
Route::get('sign-in/{socialite}','Auth\LoginController@socialiteLogin')->name('socialite.login');
Route::get('sign-in/{socialite}/redirect','Auth\LoginController@socialiteLoginRedirect')->name('socialite.login.redirect');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	require 'admin.php';
});

Route::group(['prefix'=>'customer','middleware'=>'customer'],function(){
	require 'customer.php';
});


/************************** Laravel Testing Routes *************************/
Route::get('ocr/testing',function(){
	return view('lara_ocr.upload_image');
});

Route::post('ocr/testing','TestController@parseText')->name('ocr.testing.post');