<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(Request $request){
        $Blog = Blog::orderBy('created_at', 'DESC')->paginate(5);
       
        if(!empty($request->keyword)){

            $Blog= Blog::orderBy('created_at', 'DESC')
            ->where('name','%'.$request->keyword.'%')->first();
            ;
            $data['Blog'] = $Blog;
            return view('admin.Blog.list', $data);
         
        }

        // dd($Blog);
        $data['Blog'] = $Blog;
        return view('admin.Blog.list', $data);

    }
    public function create(){
return view('admin.blog.create');
    }
    public function save(Request $request){
        {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                ]
            );
            if ($validator->passes()) {
    
                $image = $request->Image;
                // $destinationPath = '/uploads/temp/';
    
                $extenstion = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $extenstion;
                $image->move(public_path() . '/uploads/temp/', $imageName);
    
    
                $Blog = new Blog;
                $Blog->name =  $request->name;
                $Blog->description = $request->description;
                $Blog->short_description = $request->short_description;
                $Blog->Image = $imageName;
                $Blog->active = $request->status;
                $Blog->save();
    
    
    
                Session()->flash('successc', 'Successfully created data');
           return redirect()->route('blog.list');
            } else {
                return response()->json([
                    'status' => 0,
                    'errors' => $validator->errors(),
                ]);
            }
        }
    }
    public function  edit($id, Request $request)
    {
        $Blog = Blog::where('id', $id)->first();
        // dd($Blog);
        if (empty($Blog)) {

            Session()->flash('errors', 'Record Not Found');
            return redirect()->route('Blog.list');
        }
        $data['Blog'] = $Blog;
        return view('admin.blog.edit', $data);
    }
    public function  update($id, Request $request)
    {
        

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );
        if ($validator->passes()) {

            $image = $request->Image;
            // $destinationPath = '/uploads/temp/';

            $extenstion = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extenstion;
            $image->move(public_path() . '/uploads/temp/', $imageName);


            $Blog = Blog::find($id);
            if (empty($Blog)) {

                Session()->flash('error', 'Record Not Found !');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $Blog->name =  $request->name;
            $Blog->description = $request->description;
            $Blog->short_description = $request->short_description;
            $Blog->Image = $imageName;
            $Blog->active = $request->status;
            $Blog->save();



            session()->flash('success', 'Blog updated Succesfully');
            return redirect()->route('blog.list');

        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function  delete($id, Request $request)
    {
        $Blog = Blog::where('id', $id)->first();

        if (!empty($Blog)) {

            // Session()->flash('errord', 'Records Not Found !');
            // return response([
            //     'status' => 0,
            // ]);
        }
        Blog::where('id', $id)->delete();
        Session()->flash('successd', 'Successfully deleted data');
       return redirect()->route('blog.list');

    }
}
