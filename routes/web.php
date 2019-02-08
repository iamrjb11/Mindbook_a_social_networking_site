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
    $full=url()->current();
    //return view('blog');
    $crop = Request::getRequestUri();
    //echo $crop;
    $host = explode($crop,$full,2);
    Session::put('host_name',$host[0]);
    
    return view('blog');
    
});
Route::get('/blog/logout',function(){
    
    return view('blog');
});
Route::post('/blog/signup','blogController@signup');
Route::post('/blog/login','blogController@login');
Route::get('/blog/home','blogController@home');
Route::get('/blog/profile','blogController@profile');
Route::post('/blog/create_post','blogController@create_post');
Route::get('/blog/search','blogController@search');
Route::get('/blog/demo','blogController@demo');

























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