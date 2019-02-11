<?php

namespace App\Http\Controllers;
use Session; // to use Session::get/put('session_name') ->it is always include top after namespace

use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class blogController extends Controller
{
    public static $u_id;
    //
    public function signup(Request $request){
        //echo "Good<br>";
        $u_name = $request->input('u_name');
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');
        $u_mobile = $request->input('u_mobile');
        $u_img="Null";

        $this->validate($request, [
            'u_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
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
        $u_id = $data[0]->user_id;
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
        $data = DB::select("select * from users_posts_tbl inner join user_info_tbl on users_posts_tbl.user_id=user_info_tbl.user_id order by srl DESC");
        //echo $data[0]->user_img;
        return view('blog_home',['data'=>$data]);
    }
    public function demo(){
        //For Time
        //echo date('H:i');
        //echo date('d-m-Y')."<br>";
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        //echo $today;
        $data = DB::select("select * from users_posts_tbl order by srl DESC");
        //echo $data[0]->user_img;
        return view('demo',['data'=>$data]);
    }
    public function profile(){
        //get user_id from get method (from url parameter)
        if(Input::get('u_id'))
            $u_id = Input::get('u_id');
        //get user_id from session key
        else 
            $u_id = Session::get('u_id'); // if(Session::has('panier')) for check
            

        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' order by srl DESC");
        
        return view('blog_profile',['data'=>$data]);
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
    public function save_about(Request $request){
        
        $u_id=$request->session()->get('u_id');
        $u_name = $request->input('name_txt');
        $live = $request->input('live_txt');
        $mobile = $request->input('mobile_txt');
        $live = $request->input('live_txt');
        $versity_name = $request->input('versity_name');
        $versity_department = $request->input('versity_department');
        $u_img =
        //echo $u_img;
        
        DB::update("update user_info_tbl set user_name=?,user_mobile=?,live=?,versity_name=?,versity_department=? where user_id=?",[$u_name,$mobile,$live,$versity_name,$versity_department,$u_id]);
        Session::put('u_name',$u_name);
        
        
        return $this->profile();
        //return redirect('/blog/home');

    }
    public function search(){
        
        $u_name= Input::get('s_value');
        //echo $u_name;
        $data = DB::select("select user_name from user_info_tbl where user_name like '%$u_name%' ");
        //echo $data;
    
       
        return view('search',['data'=>$data]);
    }
    public function about(){
        return view('blog_about');
    }
    public function settings(){
        return view('blog_settings');
    }
}
