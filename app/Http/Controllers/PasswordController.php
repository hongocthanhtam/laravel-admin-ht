<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use URL;
use App\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reset_password');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changePassword(Request $request){

        $input = $request->all();
        $email = $input["email"];
        Mail::send('admin.mail_receiver', array('email'=>$input["email"]), function($message) use ($email) {
	        $message->to($email,'Tieutinh')->subject('Change password!');
	    });
        Session::flash('sendmail_success', 'Send message successfully! Please go to your email!');
        return view('admin.login');
    }
    public function mail_receiver(){
        return view('admin.mail_receiver');
    }
    public function changepass(){
        
        return view('admin.change_password');
    }
    
    public function changepass_handle(Request $request){
        $emailInput = $request->input('email');
        $passInput = $request->input('password');
        $user = User::where([
            ['email', $emailInput],
        ])->first();
        if(isset($user)){
            $user['password'] = Hash::make($passInput);
            if($user->save()){
                Session::flash('checkmail_success', 'Change password successfully!');
                return view('admin.login');
            }
        }else{
            Session::flash('checkmail_fail', 'Email wrong!');
            return back()->withInput();
        }
    }
}
