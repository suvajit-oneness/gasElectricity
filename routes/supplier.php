<?php 

	Route::get('dashboard',function(){
		return view('supplier.dashboard');
	})->name('home');
		
	Route::group(['prefix'=>'companies'],function(){
		Route::get('/create','Admin\AdminController@createCompany')->name('supplier.companies.create');
		Route::post('/save','Admin\AdminController@saveCompany')->name('supplier.companies.save');
		Route::get('/{companyId?}','Admin\AdminController@companies')->name('supplier.companies');
		Route::get('/{id}/edit','Admin\AdminController@editCompany')->name('supplier.companies.edit');
		Route::post('/update','Admin\AdminController@updateCompany')->name('supplier.companies.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteCompany')->name('supplier.companies.delete');
	});
	
	Route::group(['prefix'=>'products'],function(){
		Route::get('/create','Admin\AdminController@createProduct')->name('supplier.products.create');
		Route::post('/save','Admin\AdminController@saveProduct')->name('supplier.products.save');
		Route::get('/{productId?}','Admin\AdminController@products')->name('supplier.products');
		Route::get('/{id}/edit','Admin\AdminController@editProduct')->name('supplier.products.edit');
		Route::post('/update','Admin\AdminController@updateProduct')->name('supplier.products.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProduct')->name('supplier.products.delete');
	});
	
	Route::group(['prefix'=>'product/feature'],function(){
		Route::get('/create','Admin\AdminController@createProductFeature')->name('supplier.products.feature.create');
		Route::post('/save','Admin\AdminController@saveProductFeature')->name('supplier.products.feature.save');
		Route::get('/{featureId?}','Admin\AdminController@productsFeature')->name('supplier.products.feature');
		Route::get('/{id}/edit','Admin\AdminController@editProductFeature')->name('supplier.products.feature.edit');
		Route::post('/update','Admin\AdminController@updateProductFeature')->name('supplier.products.feature.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProductFeature')->name('supplier.products.feature.delete');
	});
	
	Route::group(['prefix'=>'product/gas'],function(){
		Route::get('/create','Admin\AdminController@createProductGas')->name('supplier.products.gas.create');
		Route::post('/save','Admin\AdminController@saveProductGas')->name('supplier.products.gas.save');
		Route::get('/{gasId?}','Admin\AdminController@productsGas')->name('supplier.products.gas');
		Route::get('/{id}/edit','Admin\AdminController@editProductGas')->name('supplier.products.gas.edit');
		Route::post('/update','Admin\AdminController@updateProductGas')->name('supplier.products.gas.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProductGas')->name('supplier.products.gas.delete');
	});
	
	Route::group(['prefix'=>'product/electricity'],function(){
		Route::get('/create','Admin\AdminController@createProductElectricity')->name('supplier.products.electricity.create');
		Route::post('/save','Admin\AdminController@saveProductElectricity')->name('supplier.products.electricity.save');
		Route::get('/{electricityId?}','Admin\AdminController@productsElectricity')->name('supplier.products.electricity');
		Route::get('/{id}/edit','Admin\AdminController@editProductElectricity')->name('supplier.products.electricity.edit');
		Route::post('/update','Admin\AdminController@updateProductElectricity')->name('supplier.products.electricity.update');
		Route::post('/{id}/delete', 'Admin\AdminController@deleteProductElectricity')->name('supplier.products.electricity.delete');
	});

 ?>