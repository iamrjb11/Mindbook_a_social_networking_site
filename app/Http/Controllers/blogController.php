<?php

namespace App\Http\Controllers;
use Session; // to use Session::get/put('session_name') ->it is always include top after namespace

use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;



class blogController extends Controller
{
    public static $u_id;
    public function blog(){
        
    }
    //
    public function signup(Request $request){
        //echo "Good<br>";
        Session::put('msg_overlap_pblm',1);
        Session::put('msg_code',"success");
        Session::put('msg_text',"Sing up completed");
        $u_name = $request->input('u_name');
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');
        $u_mobile = $request->input('u_mobile');
        $u_img="Null";

        $this->validate($request, [
            'u_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        if ($request->hasFile('u_img')) {
            Session::put('msg_code',"success");
            Session::put('msg_text',"Sing up completed");
            //echo "Good2<br>";
            $image = $request->file('u_img');
            $u_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $u_img);
            $u_img = "/"."images"."/".$u_img;
        

            DB::insert("insert into user_info_tbl (user_name,user_email,user_password,user_mobile,user_img) values(?,?,?,?,?)",[$u_name,$u_email,$u_password,$u_mobile,$u_img]);
            
    
            //return back()->with('success','Image Upload successfully');
        }
        else {
            Session::put('msg_code',"fail");
            Session::put('msg_text',"Failed to sing up !");
        }
        //$u_img = $request->input('u_img');
        
        return view('blog');
    }

    public function login(Request $request){
        
        
        $u_email = $request->input('email');
        $u_password = $request->input('password');
        $data = DB::select("select * from user_info_tbl where user_email='$u_email' ");
        if($data){
        
            $request->session()->put('u_id',$data[0]->user_id);
            $request->session()->put('u_name',$data[0]->user_name);
            $request->session()->put('u_img',$data[0]->user_img);
            $u_id = $data[0]->user_id;
            //echo "<pre>";
            $retrieve_pass = $data[0]->user_password;
            //echo "</pre>";
            if(!empty($retrieve_pass)){
                if($u_password == $retrieve_pass){
                    Session::put('msg_overlap_pblm',1);
                    Session::put('msg_code',"success");
                    Session::put('msg_text',"Logged in");
                    return redirect('/blog/home');
                }
                else return $this->login_failed();
            }
            else return $this->login_failed();
            
        }   
        else return $this->login_failed();
    }
    public function logout(){
        Session::put('msg_code',"success");
        Session::put('msg_text',"Logged out !");
        
        return view('blog');
    }
    public function login_failed(){
        Session::put('msg_code',"fail");
        Session::put('msg_text',"Failed to log in !");
        return view('blog');
    }
    public function home(){
        if(Session::get('msg_overlap_pblm') != 1){
            Session::put('msg_code',"");
        }
        //For Time
        //echo date('H:i');
        //echo date('d-m-Y')."<br>";
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        //echo $today;
        $data = DB::select("select * from users_posts_tbl inner join user_info_tbl on users_posts_tbl.user_id=user_info_tbl.user_id order by post_id DESC");
        //$num_cmnt = DB::select("select count(*) as sum from comments_tbl group by post_id order by post_id DESC ");
        
       
        Session::put('msg_overlap_pblm',0);
        return view('blog_home',['data'=>$data]);
    }
    public function demo(){
        //For Time
        //echo date('H:i');
        //echo date('d-m-Y')."<br>";
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        //echo $today;
        $data = DB::select("select * from users_posts_tbl order by post_id DESC");
        //echo $data[0]->user_img;
        return view('demo',['data'=>$data]);
    }
    public function profile(){
        Session::put('msg_code',"");
        //get user_id from get method (from url parameter)
        if(Input::get('u_id'))
            $u_id = Input::get('u_id');
        //get user_id from session key
        else 
            $u_id = Session::get('u_id'); // if(Session::has('panier')) for check
            

        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' order by post_id DESC");
        
        return view('blog_profile',['data'=>$data]);
    }

    public function create_post(Request $request){
        Session::put('msg_overlap_pblm',1);
        Session::put('msg_code',"success");
        Session::put('msg_text',"Your post has uploaded successfully ");
        
        $u_id=$request->session()->get('u_id');
        //echo $u_img;
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        $status = $request->get('status');
        DB::insert("insert into users_posts_tbl (user_id,status,time,likes) values(?,?,?,?)",[$u_id,$status,$todays_time,0]);
        
        return redirect('/blog/home');

    }
    public function save_about(Request $request){
        Session::put('msg_overlap_pblm',1);
        Session::put('msg_code',"success");
        Session::put('msg_text',"Successfully saved all");
        
        $u_id=$request->session()->get('u_id');
        $u_name = $request->input('name_txt');
        $live = $request->input('live_txt');
        $mobile = $request->input('mobile_txt');
        $live = $request->input('live_txt');
        $versity_name = $request->input('versity_name');
        $versity_department = $request->input('versity_department');
        $versity_degree = $request->input('versity_degree');

        $collage_name = $request->input('collage_name');
        $collage_group = $request->input('collage_group');
        $school_name = $request->input('school_name');
        $school_group = $request->input('school_group');
        $u_img ="";
        //echo $u_img;
        
        DB::update("update user_info_tbl set user_name=?,user_mobile=?,live=?,versity_name=?,versity_department=?,versity_degree=?,collage_name=?,collage_group=?,school_name=?,school_group=? where user_id=?",[$u_name,$mobile,$live,$versity_name,$versity_department,$versity_degree,$collage_name,$collage_group,$school_name,$school_group,$u_id]);
        Session::put('u_name',$u_name);
        
        
        return $this->about();
        //return redirect('/blog/home');

    }
    public function change_password(Request $request){
        Session::put('msg_overlap_pblm',1);
        
        $u_id=$request->session()->get('u_id');

        $cur_pass = $request->input('cur_pass_txt');
        $new_pass = $request->input('new_pass_txt');

        $data = DB::select("select user_password from user_info_tbl where  user_id=?",[$u_id]);
        $dt_pass = $data[0]->user_password;
        
        if($cur_pass == $dt_pass){   
            Session::put('msg_code',"success");
            Session::put('msg_text',"Password has changed successfully");
            DB::update("update user_info_tbl set user_password=? where user_id=?",[$new_pass,$u_id]); 
            return $this->settings();
        }
        else{
            Session::put('msg_code',"fail");
            Session::put('msg_text',"Failed to change password !");
            
            return $this->settings();

        }

    }
    public function change_email(Request $request){
        Session::put('msg_overlap_pblm',1);
        Session::put('msg_code',"success");
        Session::put('msg_text',"Email has changed successfully");
        
        
        $u_id=$request->session()->get('u_id');

        $new_email= $request->input('new_email_txt');
        DB::update("update user_info_tbl set user_email=? where user_id=?",[$new_email,$u_id]);

        return $this->settings();


    }
    public function search(){
        $u_id = Session::get('u_id');
        $u_name= Input::get('s_value');
        //echo $u_name;
        $data = DB::select("select user_id,user_name from user_info_tbl where user_name like '%$u_name%' and not user_id='$u_id'  ");
        //echo $data;
    
       
        return view('search',['data'=>$data]);
    }
    public function about(){
        Session::put('msg_code',"");
        Session::put('msg_code',"success");
        if(Session::get('msg_overlap_pblm')!=1)
            Session::put('msg_text',"Welcome to about page");
        $u_id = Session::get('u_id');
        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' order by post_id DESC");
        Session::put('msg_overlap_pblm',0);
        return view('blog_about',['data'=>$data]);
    }
    public function settings(){
        if(Session::get('msg_overlap_pblm')!=1){
            Session::put('msg_code',"success");     
            Session::put('msg_text',"Welcome to settings page");
        }

        $u_id = Session::get('u_id');
        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' order by post_id DESC");
        Session::put('msg_overlap_pblm',0);
        return view('blog_settings',['data'=>$data]);
    }
    public function others_profile(){
        Session::put('msg_code',"");

        //get user_id from get method (from url parameter)
        $other_id = Input::get('other_id');
        //get user_id from session key
        $u_id = Session::get('u_id'); // if(Session::has('panier')) for check
            

        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' order by post_id DESC");
        $data2 = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$other_id' and user_info_tbl.user_id='$other_id' order by post_id DESC");
        
        //return view('blog_profile',['data'=>$data]);
        return view('blog_others_profile',['data'=>$data,'data2'=>$data2]);
    }
    public function comments(){
        $current_url =  \Request::fullUrl();
        Session::put('current_url',$current_url);
        //echo  Session::get('current_url'); 
        Session::put('msg_code',"");  
        $u_id = Input::get('u_id'); 
        $post_id = Input::get('post_id');
        Session::put('post_id',$post_id);
        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' and users_posts_tbl.post_id='$post_id' ");
        $cmnts = DB::select("select * from user_info_tbl inner join comments_tbl on user_info_tbl.user_id=comments_tbl.other_user_id and comments_tbl.post_id='$post_id' order by comments_tbl.comment_id DESC");
        
        //updated comments number in users_posts_tbl
        $num_cmnt = DB::select("select count(*) as sum,post_id from comments_tbl group by post_id  ");
        foreach ($num_cmnt as $n_cnt) {
            DB::update("update users_posts_tbl set comments=? where post_id=?",[$n_cnt->sum,$n_cnt->post_id]);
            //echo $n_cnt->post_id."  ".$n_cnt->sum."<br>";
        }

        $num_cmnt = DB::select("select count(*) as sum from comments_tbl where post_id='$post_id'  ");

        return view('mb_comments',['data'=>$data,'cmnts'=>$cmnts,'num_cmnt'=>$num_cmnt]);
        //echo "<pre>".$cmnts[0]->user_name."</pre>";
    }
    public function create_comment(Request $request){
        
        //return redirect('/blog/comments?post_id=20');

        
       // echo  Session::get('current_url'); 
        Session::put('msg_code',"");  
        $u_id = Session::get('u_id'); 
        $post_id = Session::get('post_id');

        $o_u_id = $u_id;
        date_default_timezone_set("Asia/Dhaka");
        $todays_time = date("g:i a , j F Y");  
        $comment = $request->get('cmnt_txt');

        $data = DB::select("select * from user_info_tbl inner join users_posts_tbl on users_posts_tbl.user_id='$u_id' and user_info_tbl.user_id='$u_id' and users_posts_tbl.post_id='$post_id' ");
        DB::insert("insert into comments_tbl (post_id,other_user_id,comment_text,comment_time) values(?,?,?,?)",[$post_id,$o_u_id,$comment,$todays_time]);
        
        return redirect(Session::get('current_url'));
        //echo "<pre>".$cmnts[0]->user_name."</pre>";
    }

}
