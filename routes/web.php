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
    //categories
    Route::get('/list', 'Admin\CategoryController@index')->name('admin.list');
    Route::post('/add-category', 'Admin\CategoryController@addCategory')->name('admin.category.add');
    Route::post('/edit-category/{id}', 'Admin\CategoryController@editCategory')->name('admin.category.edit');
    Route::post('/delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('admin.category.delete');

    Route::post('/add-type', 'Admin\CategoryController@addType')->name('admin.type.add');
    Route::post('/edit-type/{id}', 'Admin\CategoryController@editType')->name('admin.type.edit');
    Route::post('/delete-type/{id}', 'Admin\CategoryController@deleteType')->name('admin.type.delete');
});