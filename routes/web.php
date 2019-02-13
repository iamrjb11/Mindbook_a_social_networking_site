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
    if(Session::get('msg_overlap_pblm') != 1) Session::put('msg_code',"");
        $full=url()->current();
        //return view('blog');
        $crop = Request::getRequestUri();
        //echo $crop;
        $host = explode($crop,$full,2);
        Session::put('host_name',$host[0]);
        //echo $host[0];
        Session::put('msg_overlap_pblm', 0);
        
        return view('blog');
});
Route::get('/blog/logout','blogController@logout');
//For all get requests

Route::get('/blog/home','blogController@home');
Route::get('/blog/profile','blogController@profile');
Route::get('/blog/about','blogController@about');
Route::get('/blog/settings','blogController@settings');
Route::get('/blog/search','blogController@search');
Route::get('/blog/others_profile','blogController@others_profile');
Route::get('/blog/comments','blogController@comments');

Route::get('/blog/demo','blogController@demo');

//For all post requests
Route::post('/blog/login','blogController@login');
Route::post('/blog/signup','blogController@signup');


Route::post('/blog/create_post','blogController@create_post');
Route::post('/blog/save_about','blogController@save_about');

Route::post('/blog/change_password','blogController@change_password');
Route::post('/blog/change_email','blogController@change_email');
Route::post('/blog/create_comment','blogController@create_comment');


























Route::resource('course','resourceController');
Route::post('/course/show','resourceController@show');
Route::get('/course/create','resourceController@create')->middleware('rrk');
Route::get('/', function () {
    //do what are u want
    return view('welcome');
});
Route::get('/rajib',function(){
    return view('course/rajib');
});

Route::get('/about','myController@about');
Route::get('/contract','myController@contract');
Route::get('/cool','resourceController@create')->middleware('rrk');