<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class faqController extends Controller
{
    public function index(Request $request){
        $faq = faq::orderBy('created_at', 'DESC')->paginate(2);
       
        if(!empty($request->keyword)){

            $faq= faq::orderBy('created_at', 'DESC')
            ->where('name','%'.$request->keyword.'%')->first();
            ;
            $data['faq'] = $faq;
            return view('admin.faq.list', $data);
         
        }

        // dd($faq);
        $data['faq'] = $faq;
        return view('admin.faq.list', $data);

    }
    public function create(){
return view('admin.faq.create');
    }
    public function save(Request $request){
        {

            $validator = Validator::make(
                $request->all(),
                [
                    'question' => 'required',
                    'answer' => 'required',
                ]
            );
            if ($validator->passes()) {
    
            
                $faq = new faq;
                $faq->answer =  $request->answer;
                $faq->question = $request->question;
                $faq->active = $request->status;
                $faq->save();
    
    
    
                Session()->flash('successc', 'Successfully created data');
           return redirect()->route('faq.list');
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
        $faq = faq::where('id', $id)->first();
        // dd($faq);
        if (empty($faq)) {

            Session()->flash('errors', 'Record Not Found');
            return redirect()->route('faq.list');
        }
        $data['faq'] = $faq;
        return view('admin.faq.edit', $data);
    }
    public function  update($id, Request $request)
    {
        

        $validator = Validator::make(
            $request->all(),
            [
                'question' => 'required',
                'answer' => 'required',
            ]
        );
        if ($validator->passes()) {

            $faq = faq::find($id);
            if (empty($faq)) {

                Session()->flash('error', 'Record Not Found !');
                return response()->json([
                    'status' => 0,
                ]);
            }
                $faq->answer =  $request->answer;
                $faq->question = $request->question;
                $faq->active = $request->status;
                $faq->save();


            session()->flash('success', 'faq updated Succesfully');
            return redirect()->route('faq.list');

        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function  delete($id, Request $request)
    {
        $faq = faq::where('id', $id)->first();

        if (!empty($faq)) {

            // Session()->flash('errord', 'Records Not Found !');
            // return response([
            //     'status' => 0,
            // ]);
        }
        faq::where('id', $id)->delete();
        Session()->flash('successd', 'Successfully deleted data');
       return redirect()->route('faq.list');

    }
}
