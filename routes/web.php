<?php


Route::get('/', function () {
    return view('welcome');
});

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