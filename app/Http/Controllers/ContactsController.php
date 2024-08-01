<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\contactmail as ModelsContactmail;
use App\Models\service;
use App\Models\web_setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;


class ContactsController extends Controller
{
    public function contacts(){
        $web_setting=web_setting::where('id',2)->first();
        // dd(  $web_setting);

        // dd($data);
        return view('contacts',['setting'=>$web_setting]);
    }
    public function create(Request $request){
        echo"heee";
    }


public function sendEmail(Request $reqest)  {

    $contactmail = new ModelsContactmail;
    $contactmail->name = $reqest->name;
    $contactmail->email =$reqest->email ;
    $contactmail->message =$reqest->message;
    $contactmail->save();
    if($contactmail){

        Session()->flash('success','Thanks for your feedback.');
        return redirect('/contacts')->withInput();

    }
        
    }
//     // public function footer(){
    //     $web_setting=web_setting::where('id',2)->first();
    //     $services =service::where('active',1)->first();
    //     // dd(  $web_setting);

    //     // dd($data);
    //     return view('Layouts.footer',['setting'=>$web_setting, 'services'=>$services]);
    // }
}
