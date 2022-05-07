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

Route::prefix('/')->group(function() {
    Route::get('/provinces/{id}', 'Api\ApiProvincesController@showDistricts');
    Route::get('/districts/{province_id}/{district_id}', 'Api\ApiProvincesController@showWards');
});
