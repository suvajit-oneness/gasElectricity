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
Route::get('indivisual-states','WelcomeController@indivisualStates')->name('indivisual.state');
Route::get('indivisual-utility','WelcomeController@indivisualUtilities')->name('indivisual.utility');
Route::get('rfq/product/listing','WelcomeController@rfqBeforeProductListing')->name('rfq.product.listing');
Route::post('electricity_form/rfq/product/listing/save','WelcomeController@rfqSaveBeforeProductListing')->name('elecricity.form.rfq.save');

// Route::get('electricity-form','WelcomeController@electricityForm')->name('electricityform');
// Route::get('membership','WelcomeController@membership')->name('membership');
// Route::get('membership/purchase/{membershipId}','WelcomeController@purchaseMembership')->name('user.membership.purchase');
// Route::get('membership/claimed/success/{membershipId}','WelcomeController@membershipSuccessFullPurchase')->name('membership.claimed.success');

// Route::group(['middleware' => 'rfq_filled'],function(){
	

	Route::get('product-listing','WelcomeController@productListing')->name('product.listing');
	Route::get('product/{productId}/company/details','WelcomeController@productDetails')->name('product.details');
	Route::post('email/plan_details','WelcomeController@emailPlanDetails')->name('rfq.email.plan.details');
	Route::get('company/supplier/form','WelcomeController@supplierFormToShowUser')->name('company.supplier.form');
	Route::post('company/supplier/form_post_save','WelcomeController@supplierFormToShowUserSave')->name('company.supplier.form.save');
// });

// Common Auth Routes
Route::group(['middleware' => 'auth'],function(){
	Route::get('user/profile','HomeController@userProfile')->name('user.profile');
	Route::post('user/profile','HomeController@userProfileSave')->name('user.profile.save');
	Route::post('user/change/password','HomeController@updateUserPassword')->name('user.changepassword.save');
	Route::get('user/points','HomeController@userPoints')->name('user.points');
});

// Stripe Payment Route
Route::post('stripe/payment/form_submit','StripePaymentController@stripePostForm_Submit')->name('stripe.payment.form_submit');
Route::get('payment/successfull/thankyou/{stripeTransactionId}','StripePaymentController@thankyouStripePayment')->name('payment.successfull.thankyou');