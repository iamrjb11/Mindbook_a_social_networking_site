<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;

class blogController extends Controller
{
    //
    public function signup(Request $request){
        $u_name = $request->input('u_name');
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');
        $u_mobile = $request->input('u_mobile');
        

        DB::insert("insert into user_info_tbl (user_name,user_email,user_password,user_mobile) values(?,?,?,?)",[$u_name,$u_email,$u_password,$u_mobile]);
        return view('blog');
    }

    public function login(Request $request){
        
        $u_email = $request->input('email');
        $u_password = $request->input('password');
        $data = DB::select("select user_id,user_password from user_info_tbl where user_email='$u_email' ");
        
        $request->session()->put('user_id',$data[0]->user_id);
        echo $request->session()->put('user_id',$data[0]->user_id);
        //echo "<pre>";
        $retrieve_pass = $data[0]->user_password;
        //echo "</pre>";
        if(!empty($retrieve_pass)){
            if($u_password == $retrieve_pass){
                return view('profile');
            }
        }
        else 
            return view('blog');
    }
    public function home(){
        echo "DONE";
    }

    public function create_post(Request $request){
        
        $u_id=$request->session()->get('user_id');
        echo $u_id;
        $status = $request->get('status');
        DB::insert("insert into users_posts_tbl (user_id,status,time,likes) values(?,?,?,?)",[$u_id,$status,"10pm , 06-Feb-2019",0]);
        
        return Redirect::to('/blog/home');

    }
}
