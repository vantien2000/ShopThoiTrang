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
    //Reviews
    Route::get('reviews','Admin\ReviewController@index')->name('admin.reviews');
    Route::get('/delete-review/{id}', 'Admin\ReviewController@deleteReviews')->name('admin.delete.reviews');
    // invoices
    Route::get('invoices','Admin\InvoiceController@index')->name('admin.invoices');
    Route::get('filter/invoices','Admin\InvoiceController@index')->name('admin.invoices.filter');
    Route::get('edit-invoices/{id}','Admin\InvoiceController@edit')->name('admin.edit.invoices');
    Route::post('edit/invoice/{id}','Admin\InvoiceController@postEdit')->name('admin.edit.invoices.post');
    Route::get('delete/invoice/{id}','Admin\InvoiceController@delete')->name('admin.delete.invoices');
    //statictis
    Route::get('/statistic','Admin\StatisticController@index')->name('admin.statistic');
    Route::get('filter/statistic','Admin\StatisticController@index')->name('admin.statistic.filter');
    Route::get('statistic/export','Admin\StatisticController@export')->name('admin.statistic.export');
    //ckeditor
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
});

Route::prefix('/')->group(function () {
    Route::get('/', 'Users\HomeController@index')->name('users.home');
    Route::get('/search/{keyword?}', 'Users\HomeController@search')->name('users.search');
    Route::post('/search_filter', 'Users\HomeController@filter')->name('users.search.filter');
    Route::get('/login', 'Users\LoginController@login')->name('users.login');
    Route::get('/logout', 'Users\LoginController@logout')->name('users.logout');
    Route::get('/register', 'Users\LoginController@register')->name('users.register');
    Route::get('/product/{id}', 'Users\ProductController@index')->name('users.detail');
    Route::post('/postLogin', 'Users\LoginController@postLogin')->name('users.post.login');
    Route::post('/postRegister', 'Users\LoginController@postRegister')->name('users.post.register');
    Route::post('/postReview', 'Users\ProductController@postReviews')->name('users.post.review');
    Route::get('/cart', 'Users\CartController@index')->name('users.cart');
    Route::post('/cart/add-to-cart', 'Users\CartController@addCart')->name('users.add.cart');
    Route::post('/cart/update-cart', 'Users\CartController@updateCart')->name('users.update.cart');
    Route::post('/cart/delete-cart', 'Users\CartController@deleteCart')->name('users.delete.cart');
    Route::get('/banking', 'Users\CheckoutController@banking')->name('users.banking');
    Route::post('/postCheckout', 'Users\CheckoutController@checkout')->middleware('cors')->name('users.post.checkout');
    Route::get('/categories/{id}', 'Users\CategoryController@index')->name('users.category.product');
    Route::post('/filter_categories/{id}', 'Users\CategoryController@filterCategory')->name('users.category.filter');
    Route::get('/types/{id}', 'Users\CategoryController@typeProducts')->name('users.type.product');
    Route::post('/filter_types/{id}', 'Users\CategoryController@filterCategory')->name('users.type.filter');
    Route::get('invoices', 'Users\InvoicesController@index')->name('users.invoices');
    Route::post('remove-invoices', 'Users\InvoicesController@remove')->name('users.invoices.delete');
    Route::get('/profile', 'Users\HomeController@profile')->name('users.profile');
    Route::post('/update-profile', 'Users\HomeController@updateProfile')->name('users.post.profile');
});
