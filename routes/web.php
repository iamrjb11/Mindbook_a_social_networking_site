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

//For blog
Route::get('/blog',function(){
    
    return view('blog');
});
Route::get('/blog/logout',function(){
    
    return view('blog');
});
Route::post('/blog/signup','blogController@signup');
Route::post('/blog/login','blogController@login');
Route::get('/blog/home','blogController@home');
Route::post('/blog/create_post','blogController@create_post');

























Route::resource('course','resourceController');
Route::post('/course/show','resourceController@show');
Route::get('/course/create','resourceController@create')->middleware('rrk');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/rajib',function(){
    return view('course/rajib');
});

Route::get('/about','myController@about');
Route::get('/contract','myController@contract');
Route::get('/cool','resourceController@create')->middleware('rrk');