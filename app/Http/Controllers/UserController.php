<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $users = User::where('id',$id)->get();
        return view('admin.user.show')->with(['users' => $users]);
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
        $users = User::findOrFail($id);
        if($users->delete($id)){
            Session::flash('success','Destroyed successfully!');
            return redirect('admin/user');
        }else{
            Session::flash('error','Something error!');
        }
    }
    public function change_password(){
        return view('admin.change_password');
    }
    public function change_pass_handle(Request $request){

        $user = User::find(Auth::user()->id);
        if( Auth::user()->password === $request->input('current_password') ){
            $user->password = md5($request->input('new_password'));
            if($user->save()){
                Session::flash('change_pass_success','Changed password successfully!');
                return redirect('admin/');
            }
        }else{
            Session::flash('change_pass_fail','Current password is not correct!');
            return back()->withInput();
        }
        
    }
}