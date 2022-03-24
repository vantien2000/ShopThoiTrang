<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware('auth_admin')->group(function () {
    Route::get('/login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('/postLogin', 'Admin\LoginController@postLogin')->name('admin.login.post');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::get('/', 'Admin\HomeController@index')->name('admin.home');

    //profile
    Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
    Route::post('/editProfile', 'Admin\ProfileController@editProfile')->name('admin.profile.post');
});