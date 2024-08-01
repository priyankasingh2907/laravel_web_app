<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\Session\Session;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                $user = Auth::guard('admin')->user();
                if ($user->role == 'admin') {
                    session()->flash('success', 'You Login as admin successfully');
                    return redirect()->route('admin.dashboard');
                } else {
                    Auth::guard('admin')->logout();
                    session()->flash('error', 'Either email/password is incorrect');
                    return redirect()->route('admin.login');
                }
            }else{
                    session()->flash('error', 'Either email/password is incorrect');
                    return redirect()->route('admin.login');
                
            }

        } else {
            return back()->withInput($request->only('email'))->withErrors($validator);
        }
       
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
        
    }
}
