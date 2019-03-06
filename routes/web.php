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
Route::get('/',function(){
    if(Session::get('msg_overlap_pblm') != 1) Session::put('msg_code',"");
        $host_url=url()->current();
        //echo $host_url;
        
        Session::put('host_name',$host_url);
        
        Session::put('msg_overlap_pblm', 0);
        //for check user logged in or not
        Session::put('login_code',0);
        Session::put('file_sts',0);
        
        return view('mindbook_info');
});
Route::get('/mindbook',function(){
    return view('blog');
});

    

Route::get('/logout','mindbookController@logout');
//For all get requests


Route::get('/home','mindbookController@home');
Route::get('/profile','mindbookController@profile');

Route::get('/about','mindbookController@about');
Route::get('/settings','mindbookController@settings');
Route::get('/search','mindbookController@search');
Route::get('/sts','mindbookController@loadStatus');
Route::get('/others_profile','mindbookController@others_profile');
Route::get('/comments','mindbookController@comments');

Route::get('/blog/demo','mindbookController@demo');

//For all post requests
Route::post('/login','mindbookController@login');
Route::post('/signup','mindbookController@signup');


Route::post('/create_post','mindbookController@create_post');
Route::post('/save_about','mindbookController@save_about');

Route::post('/change_password','mindbookController@change_password');
Route::post('/change_email','mindbookController@change_email');
Route::post('/create_comment','mindbookController@create_comment');


























Route::resource('course','resourceController');
Route::post('/course/show','resourceController@show');
Route::get('/course/create','resourceController@create')->middleware('rrk');
/*Route::get('/', function () {
    //do what are u want
    return view('welcome');
});
*/
Route::get('/rajib',function(){
    return view('course/rajib');
});

Route::get('/about_us','myController@about');
Route::get('/contract','myController@contract');
Route::get('/cool','resourceController@create')->middleware('rrk');