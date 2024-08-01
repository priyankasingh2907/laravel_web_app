<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class pageController extends Controller
{
    public function page(){
        $page = page::all()->where('active', '1');
        //    dd($page);

        // $comment = comment::where('status', 1)->get();
        $data['page'] = $page;
        // $data['comment'] = $comment;
        return view('page', $data);
    }
    public function detail($id)
    {
        $page = page::where('id', $id)->first();

        // if (!empty($service)) {
        //     return redirect('/');
        // }
        //    dd($services);
        $data['page'] = $page;
        return view('pageDetail', $data);
    }
    public function saveComment(Request $request){
$validator = Validator::make($request->all(),[
    'name' =>'required',
    'comment' => 'required',
]);
if($validator->passes())
{
$page = new page;
$page->name= $request->name;
$page->comment= $request->comment;
// $page->blog_id= $request->blog_id;
$page->status=1;
$page->save();

}else{
    return response()->json([
        'status' => 0,
        'errors' => $validator->errord(),
    ]);
}


    }
}
