<?php 

	Route::get('dashboard',function(){
		return view('supplier.dashboard');
	})->name('home');

	// Pincode
	Route::group(['prefix' => 'service/pincode'],function(){
		Route::get('/','Supplier\SupplierController@supplierServicePincode')->name('supplier.service.pincode');
		Route::post('/save/update','Supplier\SupplierController@supplierServicePincodeSaveOrUpdate')->name('supplier.service.pincode.saveorupdate');
		Route::post('/{id}/delete','Supplier\SupplierController@supplierServicePincodeDelete')->name('supplier.service.pincode.delete');
	});

	// Company
	Route::group(['prefix'=>'companies'],function(){
		Route::get('/{companyId?}','Admin\AdminController@companies')->name('supplier.companies')->where('companyId', '[0-9]+');
		Route::get('/create','Admin\AdminController@createCompany')->name('supplier.companies.create');
		Route::post('/save','Admin\AdminController@saveCompany')->name('supplier.companies.save');
		Route::get('/{id}/edit','Admin\AdminController@editCompany')->name('supplier.companies.edit')->where('id', '[0-9]+');
		Route::post('/update','Admin\AdminController@updateCompany')->name('supplier.companies.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteCompany')->name('supplier.companies.delete');

		/********** Company Discount ********/
		Route::group(['prefix' => '{companyId}/discount'],function(){
			Route::get('/','Admin\AdminController@companyDiscount')->name('supplier.companies.discount');
			Route::post('/save','Admin\AdminController@saveCompanyDiscount')->name('supplier.companies.discount.save');
			Route::post('{discountId}/update','Admin\AdminController@updateCompanyDiscount')->name('supplier.companies.discount.update');
			Route::post('{discountId}/delete','Admin\AdminController@deleteCompanyDiscount')->name('supplier.companies.discount.delete');
		});

		/********** Company Rate Details ********/
		Route::group(['prefix' => '{companyId}/rate/details'],function(){
			Route::get('/','Admin\AdminController@getCompanyRateDetails')->name('supplier.companies.rate');
			Route::post('/save/update','Admin\AdminController@companyRateDetailsSaveOrUpdate')->name('supplier.companies.rate.saveorUpdate');
			Route::post('/{rateId}/delete','Admin\AdminController@companyRateDetailsDelete')->name('supplier.companies.rate.delete');
		});
		/********** Company Pan Details ********/
		Route::group(['prefix' => '{companyId}/plan/details'],function(){
			Route::get('/','Admin\AdminController@getCompanyPlanDetails')->name('supplier.companies.plan');
			Route::post('/save/update','Admin\AdminController@companyPlanDetailsSaveOrUpdate')->name('supplier.companies.plan.saveorUpdate');
			Route::post('/{planId}/delete','Admin\AdminController@companyPlanDetailsDelete')->name('supplier.companies.plan.delete');
		});
		/********** Company Features ********/
		Route::group(['prefix' => '{companyId}/feature'],function(){
			Route::get('/','Admin\AdminController@companyFeature')->name('supplier.companies.feature');
			Route::get('create','Admin\AdminController@createCompanyFeature')->name('supplier.companies.feature.create');
			Route::post('/save','Admin\AdminController@saveCompanyFeature')->name('supplier.companies.feature.save');
			Route::get('{featureId}/edit','Admin\AdminController@editCompanyFeature')->name('supplier.companies.feature.edit');
			Route::post('{featureId}/update','Admin\AdminController@updateCompanyFeature')->name('supplier.companies.feature.update');
			Route::post('{featureId}/delete','Admin\AdminController@deleteCompanyFeature')->name('supplier.companies.feature.delete');
		});
	});
	
	// Products
	Route::group(['prefix'=>'products'],function(){
		Route::get('/{productId?}','Admin\AdminController@products')->name('supplier.products')->where('productId', '[0-9]+');
		Route::get('/create','Admin\AdminController@createProduct')->name('supplier.products.create');
		Route::post('/save','Admin\AdminController@saveProduct')->name('supplier.products.save');
		Route::get('/{productId}/edit','Admin\AdminController@editProduct')->name('supplier.products.edit')->where('productId', '[0-9]+');
		Route::post('{productId}/update','Admin\AdminController@updateProduct')->name('supplier.products.update')->where('productId', '[0-9]+');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProduct')->name('supplier.products.delete');

		/********** Product Momenta ********/
		/********** Product Momenta ********/
		Route::group(['prefix' => '{productId}/momenta'],function(){
			Route::get('/','Admin\AdminController@productMomenta')->name('supplier.products.momenta');
			Route::post('/save','Admin\AdminController@saveProductMomenta')->name('supplier.products.momenta.save');
			Route::post('/{momentaId}/update','Admin\AdminController@updateProductMomenta')->name('supplier.products.momenta.update')->where('productId','[0-9]+')->where('momentaId','[0-9]+');
			Route::post('{momentaId}/delete','Admin\AdminController@deleteProductMomenta')->name('supplier.products.momenta.delete');
		});
	});

	// Forms
	Route::group(['prefix' => 'setting/form'],function(){
		Route::get('/','Supplier\SupplierController@supplierForm')->name('supplier.setting.form');
		Route::post('/add/new','Supplier\SupplierController@addSupplierForm')->name('supplier.setting.form.add');
		Route::post('/update/status/or/is_required','Supplier\SupplierController@updateSupplierFormStatus')->name('supplier.setting.form.updatecheckbox');
		Route::post('form/option/remove','Supplier\SupplierController@formOptionRemove')->name('supplier.setting.form.option.remove');
		Route::post('form/option/add/new','Supplier\SupplierController@formOptionAddNew')->name('supplier.setting.form.option.save');
	});

	// Reports
	Route::group(['prefix' => 'reports'],function(){
		// Form Filled By the User
		Route::group(['prefix' => 'supplier/forms'],function(){
			Route::get('/','Supplier\SupplierController@reportSupplierFormFilledByUser')->name('supplier.reports.form.filledbyuser');
		});
	});
 ?>