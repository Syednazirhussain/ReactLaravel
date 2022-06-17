<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\Font;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($id){
        if($id == 0){
            $setting = new Setting();
        }else{
            $setting = Setting::findOrFail($id);
        }
        $fornts = Font::select('name','id')->where('is_delete', '!=', 1 )->get();
        return view('admin.settings.edit', compact(['setting','fornts']));
    }

    public function store(Request $request){ 
        
        if($request->id){
            $setting = Setting::findOrFail($request->id);
        }else{
            $setting = new Setting();
        }
        $setting->video_src_type=$request->video_src_type; 
        $setting->video_link_url=$request->video_link_url; 
        $setting->site_name=$request->site_name;
        $setting->background_color=$request->background_color;
        $setting->padding_body_size=$request->padding_body_size;
        $setting->padding_body_color=$request->padding_body_color;
        $setting->site_desc=$request->site_desc;
        $setting->site_logo_svg=$request->site_logo_svg;
        $setting->site_logo_inactive_svg=$request->site_logo_inactive_svg;
        $setting->cursor_circle_text=$request->cursor_circle_text;
        $setting->cursor_border_size = $request->cursor_border_size;
        $setting->cursor_color = $request->cursor_color;
        if($request->cursor_blend_mode == 'on'){
            $setting->cursor_blend_mode = 1;
        }else{
            $setting->cursor_blend_mode = 0;
        }
        $setting->headings_weight=$request->headings_weight;
        $setting->headings_color=$request->headings_color;
        $setting->headings_size =$request->headings_size;
        $setting->headings_desktop_align =$request->headings_desktop_align;
        $setting->body_weight=$request->body_weight;
        $setting->body_color=$request->body_color;
        $setting->body_size=$request->body_size;
        $setting->body_desktop_align=$request->body_desktop_align;
        $setting->links_weight=$request->links_weight;
        $setting->links_color=$request->links_color;
        $setting->links_size=$request->links_size;
        $setting->links_desktop_align=$request->links_desktop_align;
        $setting->selection_color = $request->selection_color;
        

        
        
        $setting->headings_font_family_id=$request->headings_font_family;
        $setting->body_font_family_id=$request->body_font_family;
        $setting->links_font_family_id=$request->links_font_family;

        $headings_font = Font::select('name')->where('id','=',$request->headings_font_family)->first();
        $body_font = Font::select('name')->where('id','=',$request->body_font_family)->first();
        $links_font = Font::select('name')->where('id','=',$request->links_font_family)->first();
        
        $setting->headings_font_family=$headings_font->name ?? '';
        $setting->body_font_family=$body_font->name ?? '';
        $setting->links_font_family=$links_font->name ?? '';
        // new
        $setting->hover_border_color=$request->hover_border_color;
        $setting->hover_border_size=$request->hover_border_size;
        // mobile
        $setting->hover_border_color_mobile=$request->hover_border_color_mobile;
        $setting->hover_border_mobile_size=$request->hover_border_mobile_size;
        $setting->headings_weight_mobile=$request->headings_weight_mobile;
        $setting->headings_color_mobile=$request->headings_color_mobile;
        $setting->headings_size_mobile=$request->headings_size_mobile;
        $setting->headings_desktop_align_mobile=$request->headings_desktop_align_mobile;
        $setting->body_weight_mobile=$request->body_weight_mobile;
        $setting->body_color_mobile=$request->body_color_mobile;
        $setting->body_size_mobile=$request->body_size_mobile;
        $setting->body_desktop_align_mobile=$request->body_desktop_align_mobile;
        $setting->links_weight_mobile=$request->links_weight_mobile;
        $setting->links_color_mobile=$request->links_color_mobile;
        $setting->links_size_mobile=$request->links_size_mobile;
        $setting->links_desktop_align_mobile=$request->links_desktop_align_mobile;
        $setting->headings_font_family_mobile_id=$request->headings_font_family_mobile;
        $setting->body_font_family_mobile_id=$request->body_font_family_mobile;
        $setting->links_font_family_mobile_id=$request->links_font_family_mobile;
        $headings_font_mobile = Font::select('name')->where('id','=',$setting->headings_font_family_mobile_id)->first();
        $body_font_mobile = Font::select('name')->where('id','=',$setting->body_font_family_mobile_id)->first();
        $links_font_mobile = Font::select('name')->where('id','=',$setting->links_font_family_mobile_id)->first();
        $setting->headings_font_family_mobile=$headings_font_mobile->name ?? '';
        $setting->body_font_family_mobile=$body_font_mobile->name ?? '';
        $setting->links_font_family_mobile=$links_font_mobile->name ?? '';
        // mobile
        // new


        $setting->save();
        
        if($request->file('background_image_url') != null){
            $path = $request->file('background_image_url')->store('setting/'.$setting->id);
            $setting->background_image_url = $path;
            $setting->save();
        }
        if($request->bg_image_check == "true"){
            $setting->background_image_url = "no-image.jpg";
            $setting->save();
        }
        if($request->file('site_logo_inactive_url') != null){
            $path = $request->file('site_logo_inactive_url')->store('setting/'.$setting->id);
            $setting->site_logo_inactive_url = $path;
            $setting->save();
        }
        if($request->file('cursor_icon_url') != null){
            $path = $request->file('cursor_icon_url')->store('setting/'.$setting->id);
            $setting->cursor_icon_url = $path;
            $setting->save();
        }
        if($request->file('intro_shape_url_1') != null){
            $path = $request->file('intro_shape_url_1')->store('setting/'.$setting->id);
            $setting->intro_shape_url_1 = $path;
            $setting->save();
        }
        if($request->file('intro_shape_url_2') != null){
            $path = $request->file('intro_shape_url_2')->store('setting/'.$setting->id);
            $setting->intro_shape_url_2 = $path;
            $setting->save();
        }
        if($request->file('favicon_url') != null){
            $path = $request->file('favicon_url')->store('setting/'.$setting->id);
            $setting->favicon_url = $path;
            $setting->save();
        }
        if($request->file('video_url_1') != null){
            $path = $request->file('video_url_1')->store('setting/'.$setting->id);
            $setting->video_url_1 = $path;
            $setting->save();
        }
    
        return redirect()->back()->with('success', 'Changes saved!'); 
    }
}
