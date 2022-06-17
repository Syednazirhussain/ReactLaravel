<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        if($id == 0){
            $user = new User();
        }else{
            $user = User::findOrFail($id);
        }
        return view('admin.users.edit', compact(['user']));
    }

    public function store(Request $request){
        if($request->id){
            $user = User::findOrFail($request->id);
        }else{
            $user = new User();
        }
        $user->u_id = $request->u_id;
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->email_verified_at = $request->email_verfiy; 
        $user->password = Hash::make($request->password); 
        $user->role = $request->role; 
        $user->contact_number = $request->contact_number; 
        $user->location = $request->location;
        if($request->status == 'on'){
            $user->status = 1;
        }else{
            $user->status = 0;
        }
        $user->save();
        if($request->file('image') != null){
            $path = $request->file('image')->store('user_images/'.$user->id);
            $user->image = $path;
            $user->save();
        }
        return redirect()->back()->with('success', 'Changes saved!'); 
    }
}
