<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Session;



class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = service::orderBy('created_at', 'DESC')->paginate(5);
       
        if(!empty($request->keyword)){

            $servicess= service::orderBy('created_at', 'DESC')
            ->where('name','%'.$request->keyword.'%')->first();
            ;
            $data['servicess'] = $servicess;
            return view('admin.services.list', $data);
         
        }

        // dd($services);
        $data['services'] = $services;
        return view('admin.services.list', $data);
    }
   
    public function create()
    {
        return view('admin.services.create');
    }
    public function save(Request $request)
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


            $service = new service;
            $service->name =  $request->name;
            $service->description = $request->description;
            $service->short_description = $request->short_description;
            $service->Image = $imageName;
            $service->active = $request->status;
            $service->save();



            Session()->flash('successc', 'Successfully created data');
       return redirect()->route('services.list');
        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function  edit($id, Request $request)
    {
        $services = service::where('id', $id)->first();
        // dd($services);
        if (empty($services)) {

            Session()->flash('errors', 'Record Not Found');
            return redirect()->route('services.list');
        }
        $data['services'] = $services;
        return view('admin.services.edit', $data);
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


            $service = service::find($id);
            if (empty($service)) {

                Session()->flash('error', 'Record Not Found !');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $service->name =  $request->name;
            $service->description = $request->description;
            $service->short_description = $request->short_description;
            $service->Image = $imageName;
            $service->active = $request->status;
            $service->save();



             Session()->flash('successd', 'Successfully updated data');
            return redirect()->route('services.list');
     
        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function  delete($id, Request $request)
    {
        $service = service::where('id', $id)->first();

        if (!empty($service)) {

            // Session()->flash('errord', 'Records Not Found !');
            // return response([
            //     'status' => 0,
            // ]);
        }
        service::where('id', $id)->delete();
        Session()->flash('successd', 'Successfully deleted data');
       return redirect()->route('services.list');

    }
}
