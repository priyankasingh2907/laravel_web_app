<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class pageController extends Controller
{
    public function index(Request $request){
        $page = page::orderBy('created_at', 'DESC')->paginate(1);
       
        if(!empty($request->keyword)){

            $page= page::orderBy('created_at', 'DESC')
            ->where('name','%'.$request->keyword.'%')->first();
            ;
            $data['page'] = $page;
            return view('admin.page.list', $data);
         
        }

        // dd($page);
        $data['page'] = $page;
        return view('admin.page.list', $data);

    }
    public function create(){
return view('admin.page.create');
    }
    public function save(Request $request){
        {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'content' => 'required',
                ]
            );
            if ($validator->passes()) {
    
                $image = $request->Image;
                // $destinationPath = '/uploads/temp/';
    
                $extenstion = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $extenstion;
                $image->move(public_path() . '/uploads/temp/', $imageName);
    
    
                $page = new page;
                $page->name =  $request->name;
                $page->content = $request->content;
                $page->Image = $imageName;
                $page->active = $request->status;
                $page->save();
    
    
    
                Session()->flash('successc', 'Successfully created data');
           return redirect()->route('page.list');
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
        $page = page::where('id', $id)->first();
        // dd($page);
        if (empty($page)) {

            Session()->flash('errors', 'Record Not Found');
            return redirect()->route('page.list');
        }
        $data['page'] = $page;
        return view('admin.page.edit', $data);
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


            $page = page::find($id);
            if (empty($page)) {

                Session()->flash('error', 'Record Not Found !');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $page->name =  $request->name;
            $page->content = $request->content;
            $page->Image = $imageName;
            $page->active = $request->status;
            $page->save();



            session()->flash('success', 'page updated Succesfully');
            return redirect()->route('page.list');

        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function  delete($id, Request $request)
    {
        $page = page::where('id', $id)->first();

        if (!empty($page)) {

            // Session()->flash('errord', 'Records Not Found !');
            // return response([
            //     'status' => 0,
            // ]);
        }
        page::where('id', $id)->delete();
        Session()->flash('successd', 'Successfully deleted data');
       return redirect()->route('page.list');

    }
}
