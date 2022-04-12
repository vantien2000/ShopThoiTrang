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

use Illuminate\Support\Facades\Cache as FacadesCache;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Redis;
use Models\Categories;
use Models\Types;
use Models\UserData;

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

    //types
    Route::get('/types', 'Admin\TypeController@typeShow')->name('admin.types');
    Route::post('/add-type', 'Admin\TypeController@addType')->name('admin.type.add');
    Route::post('/edit-type/{id}', 'Admin\TypeController@editType')->name('admin.type.edit');
    Route::get('/delete-type/{id}', 'Admin\TypeController@deleteType')->name('admin.type.delete');
    Route::get('/types/{category_name?}/{status?}/{sort_num?}/{sort_alpha?}', 'Admin\TypeController@typeShow')->name('admin.type.filter');

    //Products
    Route::get('/products', 'Admin\ProductController@index')->name('admin.products');
    Route::get('/add-product', 'Admin\ProductController@showAdd')->name('admin.add.products');
    Route::post('/create-product', 'Admin\ProductController@postAddProduct')->name('admin.add.products.post');
    Route::get('/edit-product/{id}', 'Admin\ProductController@showEdit')->name('admin.edit.products');
    Route::post('/update-product/{id}', 'Admin\ProductController@postEditProduct')->name('admin.edit.products.post');
    Route::get('/delete-product/{id}', 'Admin\ProductController@deleteProduct')->name('admin.delete.products');
    Route::get('/products/{keyword?}/{type_id?}/{status?}', 'Admin\CategoryController@index')->name('admin.products.filter');
    Route::get('/detail-product/{id}', 'Admin\ProductController@detailProduct')->name('admin.detail.products');

    //Users
    Route::get('/users','Admin\UserController@index')->name('admin.users');
    Route::get('/users/{keyword?}/{isActive?}', 'Admin\UserController@filter')->name('admin.users.filter');
    Route::get('/edit-user/{id}/{isActive?}', 'Admin\UserController@editUser')->name('admin.edit.users');
    //ckeditor
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
});

Route::prefix('/')->group(function () {
    Route::get('/', 'Users\HomeController@index')->name('users.home');
    Route::get('/login', 'Users\LoginController@login')->name('users.login');
    Route::get('/logout', 'Users\LoginController@logout')->name('users.logout');
    Route::get('/register', 'Users\LoginController@register')->name('users.register');
    Route::get('/product/{id}', 'Users\ProductController@index')->name('users.detail');
    Route::post('/postLogin', 'Users\LoginController@postLogin')->name('users.post.login');
    Route::post('/postRegister', 'Users\LoginController@postRegister')->name('users.post.register');
});
