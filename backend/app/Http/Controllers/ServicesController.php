<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function show(Request $request,$id){
        $all_service = Service::where('is_delete','!=', 1)->get();
        if($id == 0){
            $service = new Service();
        }else{
            $service = Service::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json([
                'data' => ['service' => $service ,'all_service' => $all_service]
            ]);
        }
        return view('admin.services.edit', compact(['service','all_service']));
    }

    public function store(Request $request){
        if($request->id){
            $service = Service::findOrFail($request->id);
        }else{
            $service = new Service();
        }
        $service->u_id = $request->u_id;
        $service->title = $request->title;
        $service->management = $request->management;
        $service->content = $request->content;
        if($request->status == 'on'){
            $service->status = 1;
        }else{
            $service->status = 0;
        }
        $service->user_id = Auth::user()->id;
        $service->save();
        $all_service = Service::where('is_delete','!=', 1)->get();
        if ($request->ajax()) {
            if ($request->id == 0) {
                return response()->json([['Data Is Inserted Successfully'],['all_service' => $all_service],['services']]);
            } else {
                return response()->json([['Data Is Updated Successfully'],['all_service' => $all_service],['services']]);
            }
        }

        return redirect()->back()->with('success', 'Changes saved!');
    }
    
    public function delete($id){
        $service = Service::findOrFail($id);
        $service->is_delete = 1;
        $service->save();
        return redirect()->back()->with('success', 'Changes saved!');
    }
}
