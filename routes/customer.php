<?php 

	Route::get('dashboard',function(){
		return view('customer.dashboard');
	})->name('home');

	Route::group(['prefix' => 'enquiry'],function(){
		Route::get('rfq','Customer\CustomerController@rfqEnquiry')->name('customer.enquiry.rfq');
	});

	
 ?>