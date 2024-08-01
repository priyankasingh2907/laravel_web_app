<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::all()->where('active',1);
        //    dd($blogs);

        $comment = comment::where('status', 1)->first();
        $data['blogs'] = $blogs;
        $data['comment'] = $comment;
        return view('Blog', $data);
    }
    public function detail($id)
    {
        $blogs = Blog::where('id', $id)->first();

        // if (!empty($service)) {
        //     return redirect('/');
        // }
        //    dd($services);
        $data['blogs'] = $blogs;
        return view('blogDetail', $data);
    }
    public function saveComment(Request $request){
$validator = Validator::make($request->all(),[
    'name' =>'required',
    'comment' => 'required',
]);
if($validator->passes())
{
$comment = new comment;
$comment->name= $request->name;
$comment->comment= $request->comment;
$comment->blog_id= $request->blog_id;
$comment->status=1;
$comment->save();

Session()->flash('success','Thank you for your feedback..');
return redirect('/blog')->withInput();

}else{
    return response()->json([
        'status' => 0,
        'errors' => $validator->errord(),
    ]);
}


    }
}
