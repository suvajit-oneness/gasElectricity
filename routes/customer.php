<?php 

	Route::get('dashboard',function(){
		return view('customer.dashboard');
	})->name('home');

	
 ?>