<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myController extends Controller
{
    //we are calling view pages by controller.
    // for about page
    public function about(){
        $myname = "Rajib Khan";
        $stid = 150211;
        $my_address = "Khulna";
        // return view('about')->with('name',$myname);
        return view('about',compact('myname','stid'))->with('address',$my_address);
    }
    public function contract(){
        $myname = "Rajib Khan";
        $stid = 150211;
        $my_address = "Khulna";
        return view('contract',compact('myname','stid'))->with('address',$my_address);
    }
}
