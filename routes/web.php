<?php

Auth::routes(['register' => true,'logout'=>false]);
Route::any('logout','Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

// SOCIALITE SIGN-IN
Route::get('sign-in/{socialite}','Auth\LoginController@socialiteLogin')->name('socialite.login');
Route::get('sign-in/{socialite}/redirect','Auth\LoginController@socialiteLoginRedirect')->name('socialite.login.redirect');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	require 'admin.php';
});

Route::group(['prefix'=>'supplier','middleware'=>'supplier'],function(){
	require 'supplier.php';
});

Route::group(['prefix'=>'customer','middleware'=>'customer'],function(){
	require 'customer.php';
});

Route::get('/','WelcomeController@index')->name('landing.page');
Route::get('about-us','WelcomeController@aboutUs')->name('aboutus');
Route::get('how-it-works','WelcomeController@howItWorks')->name('how-it-works');
Route::get('blogs','WelcomeController@getBlogs')->name('blogs');
Route::get('blog/{blogId}/details','WelcomeController@blogDetails')->name('blog.detail');
Route::get('contact-us','WelcomeController@contactUs')->name('contact-us');
Route::post('contact-us','WelcomeController@saveContactUs')->name('contactus.save');
Route::get('product-listing','WelcomeController@productListing')->name('product.listing');
Route::get('product/{productId}/company/details','WelcomeController@productDetails')->name('product.details');
Route::get('indivisual-states','WelcomeController@indivisualStates')->name('indivisual.state');
Route::get('indivisual-utility','WelcomeController@indivisualUtilities')->name('indivisual.utility');
Route::get('electricity-form','WelcomeController@electricityForm')->name('electricityform');
Route::get('membership','WelcomeController@membership')->name('membership');
Route::get('membership/purchase/{membershipId}','WelcomeController@purchaseMembership')->name('user.membership.purchase');
Route::get('membership/claimed/success/{membershipId}','WelcomeController@membershipSuccessFullPurchase')->name('membership.claimed.success');

// Common Auth Routes
Route::group(['middleware' => 'auth'],function(){
	Route::get('user/profile','HomeController@userProfile')->name('user.profile');
	Route::post('user/profile','HomeController@userProfileSave')->name('user.profile.save');
	// Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
	Route::post('user/change/password','HomeController@updateUserPassword')->name('user.changepassword.save');
	Route::get('user/points','HomeController@userPoints')->name('user.points');
	Route::get('/explore/company/{companyId}/supplier/form','HomeController@supplierFormToShowUser')->name('company.supplier.form');
	Route::post('/explore/company/{companyId}/supplier/{supplierId}/form/save','HomeController@supplierFormToShowUserSave')->name('company.supplier.form.save');
	Route::post('blog/comment_post','API\APIController@saveBlogComment')->name('user.blog.comment.post');
	Route::post('blog/like_or_unlike_post','API\APIController@saveBlogLikeorUnlike')->name('user.blog.like_or_unlike');
});

/************************** Laravel Testing Routes *************************/

Route::get('mail',function(){
	$data = [
			'to'=>'arpan@onenesstechs.in', 
			'name' => 'test name',
			'subject'=>'Login Successfull',
			'message'=>'Welcome Back to SwitchR!'
		];
	$template = 'emails.loginmail';
	sendMail($data,$template);
});

// Stripe Payment Route
Route::post('stripe/payment/form_submit','StripePaymentController@stripePostForm_Submit')->name('stripe.payment.form_submit');
Route::get('payment/successfull/thankyou/{stripeTransactionId}','StripePaymentController@thankyouStripePayment')->name('payment.successfull.thankyou');