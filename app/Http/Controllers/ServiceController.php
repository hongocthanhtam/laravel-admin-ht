<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use DB;
use Session;
use File;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $request->session()->put('search', $request
        ->has('search') ? $request->get('search') : ($request->session()
        ->has('search') ? $request->session()->get('search') : ''));
        $services = Service::where('name', 'like', '%' .$request->session()->get('search'). '%')->orderBy('id','DESC')->paginate(5);
        if($request->ajax()) {
            return view('admin/service/ajax', compact('services'));
        } else {
            return view('admin/service', compact('services'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.service.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service;
        $service->name = $request->input('name');
        $service->content = $request->input('content');
        $service->icon = $request->input('icon');
        if($service->save()){
            Session::flash('success','Create successfully');
            return redirect('admin/service');
        }else{
            Session::flash('error', 'Somethings wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $services = DB::table('services')->where('id', $id)->get();
        $services = Service::where('id',$id)->get();
        return view('admin.service.show')->with('services',$services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = DB::table('services')->where('id', $id)->get();
        return view("admin.service.edit")->with(['services'=>$services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $services = Service::findOrFail($id);
        $services->name = $request->input('name');
        $services->content = $request->input('content');
        $service->icon = $request->input('icon');
        if($services->save()){
            Session::flash('success','Updated successfully!');
            return redirect('admin/service');
        }else{
            Session::flash('error','Something wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        if($services->delete($id)){
            Session::flash('success','Destroyed successfully!');
            return redirect('admin/service');
        }else{
            Session::flash('error','Something error!');
        }
    }
    // function search(Request $request){
    //     if($request->ajax()){
    //     $output = '';
    //     $query = $request->get('query');
    //         if($query != ''){
    //             $data = Service::where('name', 'like', '%'.$query.'%')
    //             ->orWhere('content', 'like', '%'.$query.'%')
    //             ->orWhere('icon', 'like', '%'.$query.'%')
    //             ->orderBy('id', 'asc')
    //             ->paginate(5);
    //         }else{
    //             $data = Service::orderBy('id', 'asc')->paginate(5);
    //         }
            // $total_row = $data->count();
            // if($total_row > 0){
            //     foreach($data as $row){
            //         $output .= "
            //         <tr>
            //             <td>".$row->id."</td>
            //             <td>".$row->name."</td>
            //             <td>".$row->content."</td>
            //             <td><span class=".$row->icon."></span></td>
            //             <td>
            //                 <a href=".route('service/show',['id'=>$row->id]).">
            //                     <span class='glyphicon glyphicon-eye-open'></span>
            //                 </a>
            //                 <a href=".route('service/edit',['id'=>$row->id]).">
            //                     <span class='glyphicon glyphicon-pencil'></span>
            //                 </a>
            //                 <a href=".route('service/destroy',['id'=>$row->id]).">
            //                     <span class='glyphicon glyphicon-trash'></span>
            //                 </a>
            //             </td>
            //         </tr>
            //         ";
            //     }
            // }else{
            //     $output = '
            //     <tr>
            //         <td align="center" colspan="5">No Data Found</td>
            //     </tr>
            //     ';
            // }
            // $data = array(
            //     'table_data'  => $output,
            //     'total_data'  => $total_row,
            // );
            // echo json_encode($data);
    //     }
    // }
}