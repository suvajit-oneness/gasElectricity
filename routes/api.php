<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::any('login', 'API\LoginController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::any('logout', 'API\LoginController@logout');
    Route::any('logout/all_device', 'API\LoginController@logoutFromAllDevice');
});

Route::post('user/blog/comment_post', 'API\APIController@saveBlogComment')->name('api.blog.comment.post');
Route::post('user/blog/like_or_unlike_post', 'API\APIController@saveBlogLikeorUnlike')->name('api.blog.like_or_unlike');

// Import-Export Apis
Route::group(['prefix' => 'import-export'], function () {
    // Membership
    Route::group(['prefix' => 'membership'], function () {
        Route::get('export/format', 'API\ImportExportController@exportMemberShip');
        Route::get('export/data', 'API\ImportExportController@exportMemberShipWithData');
        Route::post('import/data', 'API\ImportExportController@importMembershipWithData');
    });
    // Company
    Route::group(['prefix' => 'company'], function () {
        Route::get('export/format', 'API\ImportExportController@exportCompany');
        Route::get('export/data', 'API\ImportExportController@exportCompanyWithData');
        Route::post('import/data', 'API\ImportExportController@importCompanyWithData');
    });
});

//api date: 16-06-2021
Route::group(['prefix' => 'get'], function () {
    //blog
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/category', 'API\APIController@blogsCategory');
        Route::get('{categoryId?}', 'API\APIController@blogList')->where('categoryId', '[0-9]+');
    });
    //state
    Route::group(['prefix' => 'state'], function () {
        Route::get('{countryId?}', 'API\APIController@getStates')->where('countryId', '[0-9]+');
    });
    //user point
    Route::group(['prefix' => 'user/point', 'middleware' => 'auth:api'], function () {
        Route::get('{userId?}', 'API\APIController@getUserPoints');
    });
    //product list
    Route::group(['prefix' => 'product'], function () {
        Route::get('{productId?}', 'API\APIController@productList')->where('productId', '[0-9]+');
    });
});

// SME
Route::group(['prefix' => 'sme'], function () {
    Route::get('/get', 'API\APIController@getSmeList');
    Route::get('/{id}', 'API\APIController@getSmeData');
});

// Aggregator
Route::post('aggregator/login', 'API\AggregatorController@aggregatorLogin');

Route::middleware('jwt.auth')->prefix('aggregator')->group(function() {
    Route::post('profile', 'API\AggregatorController@aggregatorProfile');
    Route::post('logout', 'API\AggregatorController@aggregatorLogout');

    Route::get('{id}/sme/list', 'API\AggregatorController@aggregatorSmeList');
});