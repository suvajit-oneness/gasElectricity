<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('login','API\LoginController@login');
Route::group(['middleware' => 'auth:api'],function(){
    Route::get('/user',function(Request $request){
        return $request->user();
    });
    Route::any('logout','API\LoginController@logout');
    Route::any('logout/all_device','API\LoginController@logoutFromAllDevice');
});

// Import-Export Apis
Route::group(['prefix' => 'import-export'],function(){
    // Membership
    Route::group(['prefix' => 'membership'],function(){
        Route::get('export/format','API\ImportExportController@exportMemberShip');
        Route::get('export/data','API\ImportExportController@exportMemberShipWithData');
        Route::post('import/data','API\ImportExportController@importMembershipWithData');
    });
    // Company
    Route::group(['prefix' => 'company'],function(){
        Route::get('export/format','API\ImportExportController@exportCompany');
        Route::get('export/data','API\ImportExportController@exportCompanyWithData');
        Route::post('import/data','API\ImportExportController@importCompanyWithData');
    });

});