<?php 

	Route::get('dashboard',function(){
		return view('supplier.dashboard');
	})->name('home');

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
		Route::get('{productId}/feature','Admin\AdminController@productFeature')->name('supplier.product.feature')->where('productId','[0-9]+');
		Route::get('{productId}/feature/create','Admin\AdminController@createProductFeature')->name('supplier.products.feature.create')->where('productId','[0-9]+');
		Route::post('/{productId}/feature/save','Admin\AdminController@saveProductFeature')->name('supplier.products.feature.save');

		Route::get('{productId}/feature/{featureId}/edit','Admin\AdminController@editProductFeature')->name('supplier.product.feature.edit')->where('productId','[0-9]+')->where('featureId','[0-9]+');

		Route::post('{productId}/feature/{featureId}/update','Admin\AdminController@updateProductFeature')->name('supplier.product.feature.update')->where('productId','[0-9]+')->where('featureId','[0-9]+');

		Route::post('/feature/{featureId}/delete','Admin\AdminController@deleteProductFeature')->name('supplier.products.feature.delete');
		/********** Product Features End ********/

		/********** Product Momenta ********/
		Route::get('{productId}/momenta','Admin\AdminController@productMomenta')->name('supplier.product.momenta')->where('productId','[0-9]+');
		
		Route::post('/{productId}/momenta/save','Admin\AdminController@saveProductMomenta')->name('supplier.products.momenta.save');

		Route::post('{productId}/momenta/{momentaId}/update','Admin\AdminController@updateProductMomenta')->name('supplier.product.momenta.update')->where('productId','[0-9]+')->where('momentaId','[0-9]+');

		Route::post('/momenta/{momentaId}/delete','Admin\AdminController@deleteProductMomenta')->name('supplier.products.momenta.delete');
		/********** Product Momenta End ********/
		
		/********** Product Discount ********/
		Route::get('{productId}/discount','Admin\AdminController@productDiscount')->name('supplier.product.discount')->where('productId','[0-9]+');
		
		Route::post('/{productId}/discount/save','Admin\AdminController@saveProductDiscount')->name('supplier.products.discount.save');

		Route::post('{productId}/discount/{discountId}/update','Admin\AdminController@updateProductDiscount')->name('supplier.product.discount.update')->where('productId','[0-9]+')->where('discountId','[0-9]+');

		Route::post('/discount/{discountId}/delete','Admin\AdminController@deleteProductDiscount')->name('supplier.products.discount.delete');
		/********** Product Discount End ********/
	});

	// States
	Route::group(['prefix' => 'states'],function(){
		Route::get('/','Supplier\SupplierController@states')->name('admin.states');
		Route::post('/save','Supplier\SupplierController@addOrUpdateState')->name('admin.state.save');
		Route::post('/update','Supplier\SupplierController@addOrUpdateState')->name('admin.state.update');
		Route::get('{stateId}/delete','Supplier\SupplierController@deleteState')->name('admin.state.delete');
	});

	// Forms
	Route::group(['prefix' => 'setting/form'],function(){
		Route::get('/','Supplier\SupplierController@supplierForm')->name('supplier.setting.form');
		Route::post('/update','Supplier\SupplierController@updateSupplierForm')->name('supplier.setting.form.update');
	});
 ?>