<?php


namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // show register form
    public function index(){
        return view("admin.register");
    }
    // Insert data
    public function store(RegisterRequest $request){
    
        $user = new User;
        $user->username = $request->input("username");
        $user->password = Hash::make($request->input("password"));
        $user->email = $request->input("email");
        $user->is_admin = 0;
        if($user->save()){
            Session::flash("success","Registered successfully");
            return redirect("admin/login");
        }else{
            Session::flash("fail","Something error");
        }
    }
}
