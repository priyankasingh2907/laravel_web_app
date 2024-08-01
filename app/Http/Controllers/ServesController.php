<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServesController extends Controller
{
    public function services()
    {
        $services = service::all()->where('active', '1');
        //    dd($services);
        $data['services'] = $services;
        return view('services', $data);
    }
    public function detail($id)
    {
        $service = service::where('id', $id)->first();

        // if (!empty($service)) {
        //     return redirect('/');
        // }
        //    dd($services);
        $data['service'] = $service;
        return view('serviceDetail', $data);
    }
}
