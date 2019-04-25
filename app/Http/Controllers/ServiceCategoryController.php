<?php

namespace App\Http\Controllers;

use App\ServiceCategory;
use App\Service;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceCategoryRequest;

class ServiceCategoryController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
        ->has('search') ? $request->get('search') : ($request->session()
        ->has('search') ? $request->session()->get('search') : ''));
        $service_categories = ServiceCategory::with('service')->where('name', 'like', '%' .$request->session()->get('search'). '%')->orderBy('id', 'DESC')->paginate(5);
        if($request->ajax()) {
            return view('admin/service_category/ajax', compact('service_categories'));
        } else {
            return view('admin/service_category', compact('service_categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view("admin.service_category.create", compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCategoryRequest $request)
    {
        $service_category = new ServiceCategory;
        $service_category->name = $request->input('name');
        $service_category->content = $request->input('content');
        $service_category->service_id = $request->input('service_category');
        // Check if the form was submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Check if file was uploaded without errors
            if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
                $filename = $_FILES["image"]["name"];
                // Verify file extension
                $extension = $request->file('image')->getClientOriginalExtension(); 
                // Check whether file exists before uploading it
                if(file_exists("uploads/" . time().'_'.md5($filename).'.'.$extension)){
                    echo $filename . " is already exists.";
                } else{
                    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . time().'_'.md5($filename).'.'.$extension);
                    $service_category->image = time().'_'.md5($filename).'.'.$extension;
                }
            } else{
                echo "Error: " . $_FILES["image"]["error"];
            }
        }
        if($service_category->save()){
            Session::flash('success','Create successfully');
            return redirect('admin/service_category');
        }else{
            Session::flash('error', 'Somethings wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service_categories = ServiceCategory::with('service')->where('id',$id)->get();
        return view('admin.service_category.show')->with('service_categories',$service_categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::all();
        $service_categories = DB::table('service_categories')->where('id', $id)->get();
        return view("admin.service_category.edit")->with(['services'=>$services,'service_categories'=>$service_categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service_categories = ServiceCategory::findOrFail($id);
        $file = $request->file('image');
        $currentfile_name = $service_categories->image;
        if(!empty($file)){
            $service_categories->name = $request->input('name');
            $service_categories->content = $request->input('content');
            $service_categories->service_id = $request->input('service_category');
            $filename = $file->getClientOriginalName();
            // Verify file extension
            $extension = $request->file('image')->getClientOriginalExtension(); 
            $file->move('uploads',time().'_'.md5($filename).'.'.$extension);
            unlink('uploads/'.$currentfile_name);
            $service_categories->image = time().'_'.md5($filename).'.'.$extension;
        }
        if(empty($file)){
            $service_categories->name = $request->input('name');
            $service_categories->content = $request->input('content');
            $service_categories->service_id = $request->input('service_category');
        }
        if($service_categories->save()){
            Session::flash('success','Updated successfully!');
            return redirect('admin/service_category');
        }else{
            Session::flash('error','Something wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service_categories = ServiceCategory::findOrFail($id);
        if($service_categories->delete($id)){
            Session::flash('success','Destroyed successfully!');
            return redirect('admin/service_category');
        }else{
            Session::flash('error','Something error!');
        }
    }
}
