<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq(){
        $faq = faq::all()->where('active', '1');
        //    dd($blogs);

        // $comment = comment::where('status', 1)->get();
        $data['faq'] = $faq;
        // $data['comment'] = $comment;
        return view('faq', $data);
    }
}
