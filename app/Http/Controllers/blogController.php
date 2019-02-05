<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class blogController extends Controller
{
    //
    public function signup(Request $request){
        //echo "Good<br>";
        $u_name = $request->input('u_name');
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');
        $u_mobile = $request->input('u_mobile');
        $u_img="Null";
        
        if ($request->hasFile('u_img')) {
            //echo "Good2<br>";
            $image = $request->file('u_img');
            $u_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $u_img);
            
    
            //return back()->with('success','Image Upload successfully');
        }
        //$u_img = $request->input('u_img');
        $u_img = "/"."images"."/".$u_img;
        

        DB::insert("insert into user_info_tbl (user_name,user_email,user_password,user_mobile,user_img) values(?,?,?,?,?)",[$u_name,$u_email,$u_password,$u_mobile,$u_img]);
        return view('blog');
    }

    public function login(Request $request){
        
        $u_email = $request->input('email');
        $u_password = $request->input('password');
        $data = DB::select("select * from user_info_tbl where user_email='$u_email' ");
        
        $request->session()->put('u_id',$data[0]->user_id);
        $request->session()->put('u_name',$data[0]->user_name);
        $request->session()->put('u_img',$data[0]->user_img);
        //echo "<pre>";
        $retrieve_pass = $data[0]->user_password;
        //echo "</pre>";
        if(!empty($retrieve_pass)){
            if($u_password == $retrieve_pass){
                return redirect('/blog/home');
            }
        }
        else 
            return view('blog');
    }
    public function home(){
        //For Time
        //echo date('H:i');
        //echo date('d-m-Y')."<br>";
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        //echo $today;
        $data = DB::select("select * from users_posts_tbl order by srl DESC");
        //echo $data[0]->user_img;
        return view('profile',['data'=>$data]);
    }

    public function create_post(Request $request){
        
        $u_id=$request->session()->get('u_id');
        $u_name=$request->session()->get('u_name');
        $u_img=$request->session()->get('u_img');
        //echo $u_img;
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        $status = $request->get('status');
        DB::insert("insert into users_posts_tbl (user_id,user_name,user_img,status,time,likes) values(?,?,?,?,?,?)",[$u_id,$u_name,$u_img,$status,$todays_time,0]);
        
        return redirect('/blog/home');

    }
}
