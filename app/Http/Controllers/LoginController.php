<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;

class LoginController extends Controller
{

    public function index(){

        if(!isset(Auth::user()->id)){
            return view("admin.login");
        }else{
            return redirect()->intended("admin/");
        }
    }
    public function login(Request $request){
        
        if( Auth::attempt(['username'=>$request->input('username'),'password'=>$request->input('password')])){
            Session::flash("loginsuccess","Logined successfully");
            return redirect()->intended("admin/");
        }else{
            Session::flash('error','Account or password is not correct!');
            return back()->withInput();
        }
    }
}
