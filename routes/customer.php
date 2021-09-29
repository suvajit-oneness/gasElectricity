<?php 

	Route::get('dashboard','Customer\CustomerController@dashboard')->name('home');

	Route::group(['prefix' => 'enquiry'],function(){
		Route::get('rfq','Customer\CustomerController@rfqEnquiry')->name('customer.enquiry.rfq');
	});
 ?>