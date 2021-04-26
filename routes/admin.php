<?php 

	Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('home');

	Route::group(['prefix'=>'users'],function(){
		Route::get('/','Admin\AdminController@getUsers')->name('admin.users');
		Route::get('/create','Admin\AdminController@createUser')->name('admin.user.create');
		Route::post('/create','Admin\AdminController@saveUser')->name('admin.user.save');
		Route::post('/manage','Admin\AdminController@manageUser')->name('admin.user.manageUser');
	});

	Route::get('contact-us','Admin\AdminController@contactUs')->name('admin.contactus');

	Route::group(['prefix'=>'blog/category'],function(){
		Route::get('/','Admin\AdminController@blogsCategory')->name('admin.blogs.category');
		Route::post('/create','Admin\AdminController@saveBlogCategory')->name('admin.blogs.category.save');
		Route::post('/update','Admin\AdminController@updateBlogCategory')->name('admin.blogs.category.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteBlogCategory')->name('admin.blogs.category.delete');
	});

	Route::group(['prefix'=>'blogs'],function(){
		Route::get('/create','Admin\AdminController@createBlog')->name('admin.blogs.create');
		Route::post('/create','Admin\AdminController@saveBlog')->name('admin.blogs.save');
		Route::get('/{blogCategoryId?}','Admin\AdminController@blogs')->name('admin.blogs');
		Route::get('/{id}/edit','Admin\AdminController@editBlog')->name('admin.blogs.edit');
		Route::post('/update','Admin\AdminController@updateBlog')->name('admin.blogs.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteBlog')->name('admin.blogs.delete');
	});

	Route::group(['prefix'=>'testimonial'],function(){
		Route::get('/','Admin\AdminController@testimonials')->name('admin.testimonial');
		Route::get('/create','Admin\AdminController@createTestimonial')->name('admin.testimonial.create');
		Route::post('/create', 'Admin\AdminController@saveTestimonial')->name('admin.testimonial.save');
		Route::get('/{id}/edit','Admin\AdminController@editTestimonial')->name('admin.testimonial.edit');
		Route::post('/update','Admin\AdminController@updateTestimonial')->name('admin.testimonial.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteTestimonial')->name('admin.testimonial.delete');
	});

	Route::group(['prefix' => 'faq'],function(){
		Route::get('/','Admin\AdminController@faq')->name('admin.faq');
		Route::get('/create','Admin\AdminController@createFaq')->name('admin.faq.create');
		Route::post('/create', 'Admin\AdminController@saveFaq')->name('admin.faq.save');
		Route::get('/{id}/edit','Admin\AdminController@editFaq')->name('admin.faq.edit');
		Route::post('/update','Admin\AdminController@updateFaq')->name('admin.faq.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteFaq')->name('admin.faq.delete');
	});

	Route::group(['prefix'=>'setting'],function(){
		Route::get('how-it-works','Admin\AdminController@howItWorks')->name('admin.setting.how_it_works');
		Route::post('how-it-works','Admin\AdminController@updateHowItWorks')->name('admin.setting.updatehow_it_works');
		Route::get('about-us','Admin\AdminController@aboutUs')->name('admin.setting.about_us');
		Route::post('about-us','Admin\AdminController@saveaboutUs')->name('admin.setting.save_aboutUs');
	});

	Route::group(['prefix'=>'membership'],function(){
		Route::get('/','Admin\AdminController@membership')->name('admin.membership');
		Route::get('/create','Admin\AdminController@membership')->name('admin.membership.create');
	});

	Route::get('referred_to/user/{userId}','Admin\AdminController@getReferredToList')->name('admin.referral.referred_to');
	Route::get('user/points/{userId}','Admin\AdminController@getUserPoints')->name('admin.user.points');
	
 ?>
