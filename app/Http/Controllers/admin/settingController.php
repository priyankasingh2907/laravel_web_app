<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use App\Models\feature_service;
use App\Models\service;
use App\Models\web_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class settingController extends Controller
{
    public function index(Request $request){
        $web_setting = web_setting::orderBy('created_at', 'DESC')->paginate(1);
    //    
        if(!empty($request->keyword)){

            $web_setting= web_setting::orderBy('created_at', 'DESC')
            ->where('name','%'.$request->keyword.'%')->first();
            ;
            $data['web_setting'] = $web_setting;
            return view('admin.web_setting.list', $data);
         
        }

        // dd($web_setting);
        // $data1['web_setting'] = $web_setting;
        // $data2['services'] = $services;
        return view('admin.web_setting.list', ['web_setting'=>$web_setting ]);

    }
    public function create(){
        $services = service::orderBy('name','asc')->get();
        // dd( $services);

        $data['services'] = $services;
return view('admin.web_setting.create',$data);
    }
    public function save(Request $request){
        {

            $validator = Validator::make(
                $request->all(),
                [
                    'website_title' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                  
                ]
            );
            if ($validator->passes()) {
    
              
                $web_setting = new web_setting;
                $web_setting->website_title =  $request->website_title;
                $web_setting->email = $request->email;
                $web_setting->phone = $request->phone;
                $web_setting->facebook_url = $request->facebook_url;
                $web_setting->twitter_url = $request->twitter_url;
                $web_setting->instagram_url = $request->instagram_url;
                $web_setting->contact_card_one = $request->contact_card_one;
                $web_setting->contact_card_two = $request->contact_card_two;
                $web_setting->contact_card_three = $request->contact_card_three;
                $web_setting->save();
    
    
    
                Session()->flash('successc', 'Successfully created data');
           return redirect()->route('setting.list');
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
        $web_setting = web_setting::where('id', $id)->first();
        // dd($web_setting);
        if (empty($web_setting)) {

            Session()->flash('errors', 'Record Not Found');
            return redirect()->route('web_setting.list');
        }
        $data['web_setting'] = $web_setting;
        return view('admin.web_setting.edit', $data);
    }
    public function  update($id, Request $request)
    {
        

        $validator = Validator::make(
            $request->all(),
            [
                'website_title' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]
        );
        if ($validator->passes()) {

        
            $web_setting = web_setting::find($id);
            if (empty($web_setting)) {

                Session()->flash('error', 'Record Not Found !');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $web_setting->website_title =  $request->website_title;
            $web_setting->email = $request->email;
            $web_setting->phone = $request->phone;
            $web_setting->facebook_url = $request->facebook_url;
            $web_setting->titter_url = $request->titter_url;
            $web_setting->instagram_url = $request->instagram_url;
            $web_setting->contact_card_one = $request->contact_card_one;
            $web_setting->contact_card_two = $request->contact_card_two;
            $web_setting->contact_card_three = $request->contact_card_three;
            $web_setting->save();



            session()->flash('success', 'web_setting updated Succesfully');
            return redirect()->route('web_setting.list');

        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function  delete($id, Request $request)
    {
        $web_setting = web_setting::where('id', $id)->first();

        if (!empty($web_setting)) {

            // Session()->flash('errord', 'Records Not Found !');
            // return response([
            //     'status' => 0,
            // ]);
        }
        web_setting::where('id', $id)->delete();
        Session()->flash('successd', 'Successfully deleted data');
       return redirect()->route('web_setting.list');

    }
}
