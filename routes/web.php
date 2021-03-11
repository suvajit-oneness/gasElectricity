<?php

Route::get('/','WelcomeController@index');
Route::get('about-us','WelcomeController@aboutUs')->name('aboutus');
Route::get('how-it-works','WelcomeController@howItWorks')->name('how-it-works');
Route::get('blog','WelcomeController@getBlogs')->name('blog');
Route::get('how-it-works','WelcomeController@howItWorks')->name('how-it-works');
Route::get('blogs','WelcomeController@getBlogs')->name('blogs');
Route::get('blog/details','WelcomeController@blogDetails')->name('blog.detail');
Route::get('contact-us','WelcomeController@contactUs')->name('contact-us');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	require 'admin.php';
});

Route::group(['prefix'=>'user','middleware'=>'user'],function(){
	Route::get('dashboard',function(){
		return view('home');
	});
});

// Common Routes
// Route::get('delete/{id}','ContactUsController@delete');
// // Route::get('delete/{id}',function(){
//     // return 'yeah its Workin';
// // });
// Route::get('/create','ContactUsController@create');
// Route::get('/','ContactUsController@index');
// Route::get('/{id}','ContactUsController@update');