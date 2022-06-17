<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $all_pages = Page::get();
        if($id == 0){
            $page = new Page();
        }else{
            $page = Page::findOrFail($id);
        }
        return view('admin.pages.edit', compact(['page','all_pages']));
    }

    public function store(Request $request){
        if($request->id){
            $page = Page::findOrFail($request->id);
        }else{
            $page = new Page();
        }
        $page->u_id = $request->u_id;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->content = $request->content;
        $page->slug = $request->slug;
        $page->parent_id = $request->parent_id;
        $page->user_id = Auth::user()->id;
        if($request->status == 'on'){
            $page->status = 1;
        }else{
            $page->status = 0;
        }
        $page->save();
        return redirect()->back()->with('success', 'Changes saved!');
    }
}
