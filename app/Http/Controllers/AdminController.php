<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data= $request->input();
            // echo $data['email']; die;
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>'1'])){
                // echo "hey, I entered here!"; die;
                // add session variable for admin session at the time of successful login
                // Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        // if(Session::has('adminSession')){
            // 
        // }else{
        //     return redirect('/admin')->with('flash_message_error', 'Please login to access the dashboard');
        // }
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logged out successfully');
    }
}
