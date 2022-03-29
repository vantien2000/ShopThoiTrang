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

use Models\Categories;

Route::prefix('admin')->middleware('auth_admin')->group(function () {
    Route::get('/login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('/postLogin', 'Admin\LoginController@postLogin')->name('admin.login.post');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
    //profile
    Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
    Route::post('/editProfile', 'Admin\ProfileController@editProfile')->name('admin.profile.post');
    //categories
    Route::get('/categories', 'Admin\CategoryController@categoryShow')->name('admin.categories');
    Route::post('/add-category', 'Admin\CategoryController@addCategory')->name('admin.category.add');
    Route::post('/edit-category/{id}', 'Admin\CategoryController@editCategory')->name('admin.category.edit');
    Route::get('/delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('admin.category.delete');
    Route::get('/categories/{category_name?}/{status?}/{sort_num?}/{sort_alpha?}', 'Admin\CategoryController@categoryShow')->name('admin.categories.filter');

    Route::get('/types', 'Admin\TypeController@typeShow')->name('admin.types');
    Route::post('/add-type', 'Admin\TypeController@addType')->name('admin.type.add');
    Route::post('/edit-type/{id}', 'Admin\TypeController@editType')->name('admin.type.edit');
    Route::get('/delete-type/{id}', 'Admin\TypeController@deleteType')->name('admin.type.delete');
    Route::get('/types/{category_name?}/{status?}/{sort_num?}/{sort_alpha?}', 'Admin\TypeController@typeShow')->name('admin.type.filter');
});