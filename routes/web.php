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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('layouts.home');
// });
// Route::get("login-register","Logincontroller@show");
// Route::group(["prefix"=>"login"],function(){
//     Route::get("form","LoginController@show");
// });
Route::group(["prefix"=>"admin"],function(){
    Route::get("login","LoginController@index")->name('login');
    Route::post("login","LoginController@login")->name('login/store');
    Route::get("register","RegisterController@index")->name('register');
    Route::post("register","RegisterController@store")->name('register/store');
    Route::get("forgot_password","Auth\ForgotPasswordController@index")->name('forgot_password');
    Route::post("forgot_password","Auth\ForgotPasswordController@resetPassword")->name('forgot_password.handle');
    Route::get("logout","HomeController@logout")->name('logout');
});
Route::group(["prefix"=>"admin"],function(){
    //Home
    Route::get("/","HomeController@index")->name('index');
    //Change pass
    Route::get("change_password","UserController@change_password")->name('change_password');
    Route::post("change_password/change","UserController@change_pass_handle")->name('change_password/change');
    //Service
        Route::get("service","ServiceController@index")->name('service');
        Route::get("service/show/{id}","ServiceController@show")->name('service/show');
        Route::get("service/create","ServiceController@create")->name('service/create');
        Route::post("service/store","ServiceController@store")->name('service/store');
        Route::get("service/edit/{id}","ServiceController@edit")->name('service/edit');
        Route::post("service/update/{id}","ServiceController@update")->name('service/update');
        Route::get("service/destroy/{id}","ServiceController@destroy")->name('service/destroy');
    //User
        Route::get("user","UserController@index")->name('user');
        Route::get("user/show/{id}","UserController@show")->name('user/show');
        Route::get("user/destroy/{id}","UserController@destroy")->name('user/destroy');
    //Service
        Route::get("service_category","ServiceCategoryController@index")->name('service_category');
        Route::get("service_category/show/{id}","ServiceCategoryController@show")->name('service_category/show');
        Route::get("service_category/create","ServiceCategoryController@create")->name('service_category/create');
        Route::post("service_category/store","ServiceCategoryController@store")->name('service_category/store');
        Route::get("service_category/edit/{id}","ServiceCategoryController@edit")->name('service_category/edit');
        Route::post("service_category/update/{id}","ServiceCategoryController@update")->name('service_category/update');
        Route::get("service_category/destroy/{id}","ServiceCategoryController@destroy")->name('service_category/destroy');
});