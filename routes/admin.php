<?php 

	Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('home');

	Route::group(['prefix'=>'users'],function(){
		Route::get('/','Admin\AdminController@getUsers')->name('admin.users');
		Route::get('/create','Admin\AdminController@createUser')->name('admin.user.create');
		Route::post('/save','Admin\AdminController@saveUser')->name('admin.user.save');
		Route::post('/manage','Admin\AdminController@manageUser')->name('admin.user.manageUser');
	});

	Route::group(['prefix'=>'companies'],function(){
		Route::get('/{companyId?}','Admin\AdminController@companies')->name('admin.companies')->where('companyId', '[0-9]+');
		Route::get('/create','Admin\AdminController@createCompany')->name('admin.companies.create');
		Route::post('/save','Admin\AdminController@saveCompany')->name('admin.companies.save');
		Route::get('/{id}/edit','Admin\AdminController@editCompany')->name('admin.companies.edit')->where('id', '[0-9]+');
		Route::post('/update','Admin\AdminController@updateCompany')->name('admin.companies.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteCompany')->name('admin.companies.delete');
	});
	
	Route::group(['prefix'=>'products'],function(){
		Route::get('/{productId?}','Admin\AdminController@products')->name('admin.products')->where('productId', '[0-9]+');
		Route::get('/create','Admin\AdminController@createProduct')->name('admin.products.create');
		Route::post('/save','Admin\AdminController@saveProduct')->name('admin.products.save');
		Route::get('/{productId}/edit','Admin\AdminController@editProduct')->name('admin.products.edit')->where('productId', '[0-9]+');
		Route::post('{productId}/update','Admin\AdminController@updateProduct')->name('admin.products.update')->where('productId', '[0-9]+');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProduct')->name('admin.products.delete');

		/********** Product Features ********/
		Route::get('{productId}/feature','Admin\AdminController@productFeature')->name('admin.product.feature')->where('productId','[0-9]+');
		Route::get('{productId}/feature/create','Admin\AdminController@createProductFeature')->name('admin.products.feature.create')->where('productId','[0-9]+');
		Route::post('/{productId}/feature/save','Admin\AdminController@saveProductFeature')->name('admin.products.feature.save');

		Route::get('{productId}/feature/{featureId}/edit','Admin\AdminController@editProductFeature')->name('admin.product.feature.edit')->where('productId','[0-9]+')->where('featureId','[0-9]+');

		Route::post('{productId}/feature/{featureId}/update','Admin\AdminController@updateProductFeature')->name('admin.product.feature.update')->where('productId','[0-9]+')->where('featureId','[0-9]+');

		Route::post('/feature/{featureId}/delete','Admin\AdminController@deleteProductFeature')->name('admin.products.feature.delete');
		/********** Product Features End ********/
	});
	
	// States
	Route::group(['prefix' => 'states'],function(){
		Route::get('/','Supplier\SupplierController@states')->name('admin.states');
		Route::post('/save','Supplier\SupplierController@addOrUpdateState')->name('admin.state.save');
		Route::post('/update','Supplier\SupplierController@addOrUpdateState')->name('admin.state.update');
		Route::get('{stateId}/delete','Supplier\SupplierController@deleteState')->name('admin.state.delete');
	});

	Route::get('contact-us','Admin\AdminController@contactUs')->name('admin.contactus');

	Route::group(['prefix'=>'blog/category'],function(){
		Route::get('/','Admin\AdminController@blogsCategory')->name('admin.blogs.category');
		Route::post('/save','Admin\AdminController@saveBlogCategory')->name('admin.blogs.category.save');
		Route::post('/update','Admin\AdminController@updateBlogCategory')->name('admin.blogs.category.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteBlogCategory')->name('admin.blogs.category.delete');
	});

	Route::group(['prefix'=>'blogs'],function(){
		Route::get('/create','Admin\AdminController@createBlog')->name('admin.blogs.create');
		Route::post('/save','Admin\AdminController@saveBlog')->name('admin.blogs.save');
		Route::get('/{blogCategoryId?}','Admin\AdminController@blogs')->name('admin.blogs');
		Route::get('/{id}/edit','Admin\AdminController@editBlog')->name('admin.blogs.edit');
		Route::post('/update','Admin\AdminController@updateBlog')->name('admin.blogs.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteBlog')->name('admin.blogs.delete');
	});

	Route::group(['prefix'=>'testimonial'],function(){
		Route::get('/','Admin\AdminController@testimonials')->name('admin.testimonial');
		Route::get('/create','Admin\AdminController@createTestimonial')->name('admin.testimonial.create');
		Route::post('/save', 'Admin\AdminController@saveTestimonial')->name('admin.testimonial.save');
		Route::get('/{id}/edit','Admin\AdminController@editTestimonial')->name('admin.testimonial.edit');
		Route::post('/update','Admin\AdminController@updateTestimonial')->name('admin.testimonial.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteTestimonial')->name('admin.testimonial.delete');
	});

	Route::group(['prefix' => 'faq'],function(){
		Route::get('/','Admin\AdminController@faq')->name('admin.faq');
		Route::get('/create','Admin\AdminController@createFaq')->name('admin.faq.create');
		Route::post('/save', 'Admin\AdminController@saveFaq')->name('admin.faq.save');
		Route::get('/{id}/edit','Admin\AdminController@editFaq')->name('admin.faq.edit');
		Route::post('/update','Admin\AdminController@updateFaq')->name('admin.faq.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteFaq')->name('admin.faq.delete');
	});

	Route::group(['prefix'=>'setting'],function(){
		Route::get('about-us','Admin\AdminController@aboutUs')->name('admin.setting.about_us');
		Route::post('about-us','Admin\AdminController@saveaboutUs')->name('admin.setting.save_aboutUs');
		Route::get('why-choose-us','Admin\AdminController@whyChooseUs')->name('admin.setting.whychooseus');
		Route::post('why-choose-us','Admin\AdminController@updateWhyChooseUs')->name('admin.setting.whychooseus.save');
		Route::get('why-choose-us/{id}/delete','Admin\AdminController@deleteWhyChooseUs')->name('admin.setting.whychooseus.delete');
		Route::get('how-it-works','Admin\AdminController@howItWorks')->name('admin.setting.how_it_works');
		Route::get('how-it-works/{id}/delete','Admin\AdminController@deleteHowItWorks')->name('admin.setting.howitWork.delete');
		Route::post('how-it-works','Admin\AdminController@updateHowItWorks')->name('admin.setting.updatehow_it_works');
	});

	Route::group(['prefix'=>'membership'],function(){
		Route::get('/','Admin\AdminController@membership')->name('admin.membership');
		Route::get('/create','Admin\AdminController@createMembership')->name('admin.membership.create');
		Route::post('/save','Admin\AdminController@saveMembership')->name('admin.membership.save');
		Route::post('/updateMembershipStatus','Admin\AdminController@updateMembershipStatus')->name('admin.membership.updateMembershipStatus');
	});

	Route::get('referred_to/user/{userId}','Admin\AdminController@getReferredToList')->name('admin.referral.referred_to');
	Route::get('user/points/{userId}','Admin\AdminController@getUserPoints')->name('admin.user.points');
	
 ?>
