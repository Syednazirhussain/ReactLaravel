<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Font;
class FontsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request,$id){
        $all_font = Font::where('is_delete','!=', 1)->get();
        if($id == 0){
            $font = new Font();
        }else{
            $font = Font::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json([
                'data' => ['font' => $font ,'all_fonts' => $all_font]
            ]);
        }
        return view('admin.fonts.edit', compact(['font','all_font']));
    }
    public function store(Request $request){
        if($request->id){
            $font = Font::findOrFail($request->id);
        }else{
            $font = new Font();
        }
        $font->name = $request->name;
        $font->link = $request->link;
        $font->user_id = Auth::user()->id;
        $font->save();
        $all_font = Font::where('is_delete','!=', 1)->get();
        if ($request->ajax()) {
            if ($request->id == 0) {
                return response()->json([['Data Is Inserted Successfully'],['all_font' => $all_font],['fonts']]);
            } else {
                return response()->json([['Data Is Updated Successfully'],['all_font' => $all_font],['fonts']]);
            }
        }
        return redirect()->back()->with('success', 'Changes saved!');
    }
    public function delete($id){
        $font = Font::findOrFail($id);
        $font->is_delete = 1;
        $font->save();
        return redirect()->back()->with('success', 'Changes saved!');
    }
}
