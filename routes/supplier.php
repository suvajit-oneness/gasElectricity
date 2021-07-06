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
	});
	
	// Products
	Route::group(['prefix'=>'products'],function(){
		Route::get('/{productId?}','Admin\AdminController@products')->name('supplier.products')->where('productId', '[0-9]+');
		Route::get('/create','Admin\AdminController@createProduct')->name('supplier.products.create');
		Route::post('/save','Admin\AdminController@saveProduct')->name('supplier.products.save');
		Route::get('/{productId}/edit','Admin\AdminController@editProduct')->name('supplier.products.edit')->where('productId', '[0-9]+');
		Route::post('{productId}/update','Admin\AdminController@updateProduct')->name('supplier.products.update')->where('productId', '[0-9]+');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProduct')->name('supplier.products.delete');

		/********** Product Features ********/
		Route::get('{productId}/feature','Admin\AdminController@productFeature')->name('supplier.products.feature')->where('productId','[0-9]+');
		Route::get('{productId}/feature/create','Admin\AdminController@createProductFeature')->name('supplier.products.feature.create')->where('productId','[0-9]+');
		Route::post('/{productId}/feature/save','Admin\AdminController@saveProductFeature')->name('supplier.products.feature.save');

		Route::get('{productId}/feature/{featureId}/edit','Admin\AdminController@editProductFeature')->name('supplier.products.feature.edit')->where('productId','[0-9]+')->where('featureId','[0-9]+');

		Route::post('{productId}/feature/{featureId}/update','Admin\AdminController@updateProductFeature')->name('supplier.products.feature.update')->where('productId','[0-9]+')->where('featureId','[0-9]+');

		Route::post('/feature/{featureId}/delete','Admin\AdminController@deleteProductFeature')->name('supplier.products.feature.delete');
		/********** Product Features End ********/

		/********** Product Momenta ********/
		Route::get('{productId}/momenta','Admin\AdminController@productMomenta')->name('supplier.products.momenta')->where('productId','[0-9]+');
		
		Route::post('/{productId}/momenta/save','Admin\AdminController@saveProductMomenta')->name('supplier.products.momenta.save');

		Route::post('{productId}/momenta/{momentaId}/update','Admin\AdminController@updateProductMomenta')->name('supplier.products.momenta.update')->where('productId','[0-9]+')->where('momentaId','[0-9]+');

		Route::post('/momenta/{momentaId}/delete','Admin\AdminController@deleteProductMomenta')->name('supplier.products.momenta.delete');
		/********** Product Momenta End ********/
		
		/********** Product Discount ********/
		Route::get('{productId}/discount','Admin\AdminController@productDiscount')->name('supplier.products.discount')->where('productId','[0-9]+');
		
		Route::post('/{productId}/discount/save','Admin\AdminController@saveProductDiscount')->name('supplier.products.discount.save');

		Route::post('{productId}/discount/{discountId}/update','Admin\AdminController@updateProductDiscount')->name('supplier.products.discount.update')->where('productId','[0-9]+')->where('discountId','[0-9]+');

		Route::post('/discount/{discountId}/delete','Admin\AdminController@deleteProductDiscount')->name('supplier.products.discount.delete');
		/********** Product Rate Details ********/
		Route::group(['prefix' => '{productId}/rate/details'],function(){
			Route::get('/','Admin\AdminController@getproductRateDetails')->name('supplier.products.rate');
			Route::post('/save/update','Admin\AdminController@productRateDetailsSaveOrUpdate')->name('supplier.products.rate.saveorUpdate');
			Route::post('/{rateId}/delete','Admin\AdminController@productRateDetailsDelete')->name('supplier.products.rate.delete');
		});
		/********** Product Pan Details ********/
		Route::group(['prefix' => '{productId}/plan/details'],function(){
			Route::get('/','Admin\AdminController@getproductPlanDetails')->name('supplier.products.plan');
			Route::post('/save/update','Admin\AdminController@productPlanDetailsSaveOrUpdate')->name('supplier.products.plan.saveorUpdate');
			Route::post('/{planId}/delete','Admin\AdminController@productPlanDetailsDelete')->name('supplier.products.plan.delete');
		});

	});

	// Forms
	Route::group(['prefix' => 'setting/form'],function(){
		Route::get('/','Supplier\SupplierController@supplierForm')->name('supplier.setting.form');
		Route::post('/add/new','Supplier\SupplierController@addSupplierForm')->name('supplier.setting.form.add');
		Route::post('/update/status/or/is_required','Supplier\SupplierController@updateSupplierFormStatus')->name('supplier.setting.form.updatecheckbox');
		Route::post('form/option/remove','Supplier\SupplierController@formOptionRemove')->name('supplier.setting.form.option.remove');
	});
 ?>