<?php

Route::get('/','WelcomeController@index');

Route::get('about-us','WelcomeController@aboutUs')->name('aboutus');
Route::get('how-it-works','WelcomeController@howItWorks')->name('how-it-works');
Route::get('how-it-works','WelcomeController@howItWorks')->name('how-it-works');
Route::get('blogs','WelcomeController@getBlogs')->name('blogs');
Route::get('blog/{blogId}/details','WelcomeController@blogDetails')->name('blog.detail');
Route::get('contact-us','WelcomeController@contactUs')->name('contact-us');
Route::post('contact-us','WelcomeController@saveContactUs')->name('contactus.save');
Route::get('plan-listing','WelcomeController@planListing')->name('plan.listing');
Route::get('electricity-form','WelcomeController@electricityForm')->name('electricityform');
Route::get('indivisual-states','WelcomeController@indivisualStates')->name('indivisual.state');

// SOCIALITE SIGN-IN
Route::get('sign-in/{socialite}','Auth\LoginController@socialiteLogin')->name('socialite.login');
Route::get('sign-in/{socialite}/redirect','Auth\LoginController@socialiteLoginRedirect')->name('socialite.login.redirect');

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	require 'admin.php';
});

Route::group(['prefix'=>'user','middleware'=>'user'],function(){
	require 'user.php';
});


// Laravel OCR Testing
Route::get('ocr/testing',function(){
	return view('lara_ocr.upload_image');
});
Route::post('ocr/testing','TestController@parseText')->name('ocr.testing.post');