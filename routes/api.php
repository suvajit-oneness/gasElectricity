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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'membership'],function(){
    Route::get('/','Api\Csv\MembershipsController@list');
    Route::get('/format/download','Api\Csv\MembershipsController@getFormat');
    Route::post('/upload','Api\Csv\MembershipsController@uploadCsv');
});