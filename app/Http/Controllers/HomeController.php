<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\page;
use App\Models\service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $services=service::where('active',1)->orderBy("created_at",'DESC')->paginate(6);
        $blogs=Blog::where('active',1)->orderBy("created_at",'DESC')->paginate(6);

        return view('home' , ['services'=>$services,'blogs'=>$blogs]);
    }
    public function about(){
       $page = page::where('id',2)->first();
    //    dd( $page );
        return view('about' ,['page'=>$page]);
    }
    public function terms(){
        $page = page::where('id',3)->first();
        //    dd( $page );
            return view('terms' ,['page'=>$page]);

    }
    public function policy(){
        $page = page::where('id',4)->first();
        //    dd( $page );
            return view('policy' ,['page'=>$page]);

    }

}
