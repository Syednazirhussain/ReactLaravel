<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request, $id){
        $all_clients = Client::where('is_delete','!=', 1)->get();
        if($id == 0){
            $client = new Client();
        }else{
            $client = Client::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json([
                'data' => ['client' => $client ,'all_clients' => $all_clients]
            ]);
        }
        return view('admin.clients.edit', compact(['client','all_clients']));
    }

    public function store(Request $request){
            if($request->id){
                $client = Client::findOrFail($request->id);
            }else{
                $client = new Client();
            }
            $client->u_id = $request->u_id ?? '';
            $client->title = $request->title;
            $client->management = $request->management;
            $client->content = $request->content;
            if($request->status == 'on'){
                $client->status = 1;
            }else{
                $client->status = 0;
            }
            $client->user_id = Auth::user()->id ?? '';
            $client->save();
            $all_clients = Client::where('is_delete','!=', 1)->get();
            if ($request->ajax()) {
                if ($request->id == 0) {
                    return response()->json([['Data Is Inserted Successfully'],['all_clients' => $all_clients],['clients']]);
                } else {
                    return response()->json([['Data Is Updated Successfully'],['all_clients' => $all_clients],['clients']]);
                }
            }
        // return redirect()->back()->with('success', 'Changes saved!');
    }
    
    public function delete(Request $request, $id){
        $service = Client::findOrFail($id);
        $service->is_delete = 1;
        $service->save();
        return redirect()->back()->with('success', 'Changes saved!');
    }
}
