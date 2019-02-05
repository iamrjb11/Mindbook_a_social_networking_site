<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class resourceController extends Controller
{
    public function create(){
        $data = DB::select("select * from user_info_tbl");
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        return view('course.course_reg',['data'=>$data]);
        //$data = $request->input();
        
    }
    public function show(Request $request){
        $inputs = $request->all();
        $url = $request->url();
        $f_url = $request->fullurl();
        $method = $request->method();
        // return $inputs;
        $validation = $request->validate([
            'c_name'=>'required'
        ]);
        $ses= $request->session()->get('ses');
        print_r($inputs);
        print_r("url : ".$url);
        print_r("    Ful url : ".$f_url);
        print_r("    Method : ".$method);
        print_r("    Session : ".$ses);
        DB::insert("insert into user_info_tbl (name,sex,age) values(?,?,?)",["ra","male",25]);
    }
}
