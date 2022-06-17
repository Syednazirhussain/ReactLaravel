@extends('layouts.app')

@section('content')

<form  method="post" action="{{ route('admin.settings_store') }}" enctype="multipart/form-data">

<div class="container action-bar col-md-12 p-0">
    <div class="row justify-content-center">

        <div class="col-md-8 p-0 client ">

            <div class="d-flex">
                <h3>Settings Form</h3>
                
                <button type="submit" class="btn btn-primary ms-auto">
                    <span class="material-icons">save</span>
                    <span>Save Changes</span>
                </button>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
            
                @if (\Session::has('success'))
                    <div class="mt-2 alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
        
                @csrf
                <input type="hidden" name="id" value="{{$setting->id}}">

                <div class="card site_info p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="true" href="#collapseSiteInfo" role="button"  aria-controls="collapseSiteInfo">Site Info</h4>

                    <div class="row collapse0" id="collapseSiteInfo">
                        <div class="form-group col-md-12">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" name="site_name" value="{{$setting->site_name}}" class="form-control" id="site_name" aria-describedby="site_nameHelp" placeholder="Enter Site Name">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="site_desc" class="form-label">Site Desc</label>
                            <input type="site_desc" name="site_desc" value="{{$setting->site_desc}}" class="form-control" id="site_desc" aria-describedby="site_descHelp" placeholder="Enter Site Desc">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="padding_body_size" class="form-label">Padding Size</label>
                            <input type="text" name="padding_body_size" value="{{$setting->padding_body_size}}" class="form-control" id="padding_body_size" aria-describedby="padding_body_sizeHelp" placeholder="1em or 12px">
                        </div>
 

                        <div class="form-group col-md-4">
                            <label for="padding_body_color" class="form-label">Padding Color</label>
                            <input type="color" name="padding_body_color" value="{{$setting->padding_body_color}}" class="form-control" id="padding_body_color" aria-describedby="padding_body_colorHelp" placeholder="Enter Padding Body Color">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="background_color" class="form-label">Background Color</label>
                            <input type="color" name="background_color" value="{{$setting->background_color}}" class="form-control" id="background_color" aria-describedby="background_colorHelp" placeholder="Enter Background Color">
                        </div>

                        <div class="clearfix"></div>
                       
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label d-flex">
                                <span>Background Image Url</span>
                                <button type="button" class="reset_image ms-auto">Reset Image</button>
                            </label>
                            
                            <div class="input-group">
                                <div class="file form-control">

                                    <span class="icon-upload material-icons">upload</span>
                                    
                                    <input class="form-control file-preview image-perview-input" name="background_image_url" id="background_image_url" type="file" accept="image/png, image/gif, image/jpeg, image/svg+xml" />
                                    <input class=" bg-image-check" name="bg_image_check" value= "false" type= "hidden"/>
                                    
                                </div>
                                
                                <span class="input-group-text upload-preview__img">
                                 
                                    <img src="{{ url('/uploads/') }}/{{$setting->background_image_url}}" id="background_image_url__img" class="image-perview-img"/>
                                    
                                </span>
                            </div>
                            
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Favicon Url</label>
                            <div class="input-group">
                                <div class="file form-control">
                                    <span class="icon-upload material-icons">upload</span>
                                    
                                    <input class="form-control file-preview" name="favicon_url" id="favicon_url" type="file" accept="image/png, image/gif, image/jpeg, image/svg+xml" />
                                </div>
                                <span class="input-group-text upload-preview__img">
                                    <img src="{{ url('/uploads/') }}/{{$setting->favicon_url}}" id="favicon_url__img" />
                                </span>
                            </div>
                        </div>




                        <div class="form-group col-md-6">
                            <label for="site_logo_svg" class="form-label">Site Logo Svg</label>
                            <textarea type="text" rows="4" name="site_logo_svg" value="{{$setting->site_logo_svg}}" class="form-control" id="site_logo_svg" aria-describedby="site_logo_svgHelp" placeholder="Enter Site Logo Svg">{{$setting->site_logo_svg}}</textarea>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="site_logo_inactive_svg" class="form-label">Site Logo Inactive Svg</label>
                            <textarea type="text" rows="4" name="site_logo_inactive_svg"  value="{{$setting->site_logo_inactive_svg}}" class="form-control" id="site_logo_inactive_svg" aria-describedby="site_logo_inactive_svgHelp" placeholder="Enter Site Logo Inactive Svg">{{$setting->site_logo_inactive_svg}}</textarea>
                        </div>
                    </div>
                </div>


                <div class="card intro p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseIntro" role="button"  aria-controls="collapseIntro">Intro Graphics</h4>

                    <div class="row collapse " id="collapseIntro">
                       
                        <div class="form-group col-md-6">
                    
                            <label for="image" class="form-label">Intro Shape Url 1</label>
                            <div class="input-group">
                                <div class="file form-control">
                                
                                    <span class="icon-upload material-icons">upload</span>
                                    
                                    <input class="form-control file-preview" name="intro_shape_url_1" id="intro_shape_url_1" type="file" accept="image/png, image/gif, image/jpeg, image/svg+xml" />
                                </div>
                                <span class="input-group-text upload-preview__img">
                                    <img src="{{ url('/uploads/') }}/{{$setting->intro_shape_url_1}}" id="intro_shape_url_1__img" />
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            
                            <label for="image" class="form-label">Intro Shape Url 2</label>
                            <div class="input-group">
                                <div class="file form-control">

                                    <span class="icon-upload material-icons">upload</span>
                                    
                                    <input class="form-control file-preview" name="intro_shape_url_2" id="intro_shape_url_2" type="file" accept="image/png, image/gif, image/jpeg, image/svg+xml" />
                                </div>
                                <span class="input-group-text upload-preview__img">
                                    <img src="{{ url('/uploads/') }}/{{$setting->intro_shape_url_2}}" id="intro_shape_url_2__img" />
                                </span>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseVideo" role="button"  aria-controls="collapseVideo">Video</h4>
                        
                        <div class="form-group col-md-12 collapse mb-0" id="collapseVideo">
                                

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                
                                <li class="nav-item" role="presentation">                                            
                                    <input class="d-none" type="radio" id="video_src_type_link" name="video_src_type" value="link" @if($setting->video_src_type == 'link') checked @endif>
                                    <label class="nav-link active" for="video_src_type_link"
                                            data-bs-toggle="tab" data-bs-target="#videoLinkTab" type="button" role="tab" aria-controls="videoLinkTab" aria-selected="false" >
                                            Link Upload</label>
                                </li>
                                
                                <li class="nav-item" role="presentation">
                                    <input class="d-none" type="radio" id="video_src_type_file" name="video_src_type" value="file" @if($setting->video_src_type == null || $setting->video_src_type == 'file') checked @endif>
                                    <label class="nav-link" for="video_src_type_file"
                                            data-bs-toggle="tab" data-bs-target="#videoFileTab" type="button" role="tab" aria-controls="videoFileTab" aria-selected="false" >Video Upload</label>                                    
                                </li>
                            </ul>
                            <div class="tab-content p-4" id="myTabContent">
                                
                                <div class="tab-pane fade show active" id="videoLinkTab" role="tabpanel" aria-labelledby="videoLinkTab-tab">
                                    <input type="text" id="video_link_url" class="form-control" name="video_link_url" value="{{$setting->video_link_url}}" />
                                </div>

                                <div class="tab-pane fade" id="videoFileTab" role="tabpanel" aria-labelledby="videoFileTab-tab">
                                    
                                    <div class="input-group">
                                        <div class="file form-control video">
                                            <span class="icon-upload material-icons">upload</span>
                                            <input class="form-control video-input" name="video_url_1" id="video_url_1" type="file" data-limit="40" accept="video/mp4,video/x-m4v,video/*" />
                                        </div>
                                        <span class="input-group-text upload-preview__img">
                                            <video width="320" height="240" muted controls id="video_url_1_preview">
                                                <source src="{{ url('/uploads/') }}/{{$setting->video_url_1}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </span>
                                    </div>

                                </div>
                            </div>

                        </div>
                </div>

                <div class="card p-3 mb-2">

                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseCursor" role="button"  aria-controls="collapseCursor">Cursor</h4>

                    <div class="row collapse " id="collapseCursor">
                       
                        <div class="form-group col-md-6 mb-0">
                            
                            <label for="image" class="form-label">Image</label>
                            <div class="input-group">
                                <div class="file form-control">
                                    <input class="form-control file-preview" name="cursor_icon_url" id="cursor_icon_url" type="file" accept="image/png, image/gif, image/jpeg, image/svg+xml" >
                                </div>
                                <span class="input-group-text upload-preview__img">
                                    <img src="{{ url('/uploads/') }}/{{$setting->cursor_icon_url}}" id="cursor_icon_url__img" />
                                </span>
                            </div>
                        </div>
                        

                        <div class="col-md-6">
                            

                            <div class="form-group col-md-12">
                                <label for="cursor_circle_text" class="form-label">Text</label>
                                <input type="text" name="cursor_circle_text" value="{{$setting->cursor_circle_text}}" class="form-control" id="cursor_circle_text" aria-describedby="cursor_circle_textHelp" placeholder="Enter Cursor Circle Text" />
                            </div>

                            <div class="row"> 
                            
                                <div class="form-group col-md-7 mb-0">
                                    <label for="cursor_color" class="form-label">Color</label>
                                    <input type="color" name="cursor_color" value="{{$setting->cursor_color}}" class="form-control" id="cursor_color" aria-describedby="cursor_colorHelp" placeholder="Enter Cursor Color">
                                    <div class="form-group mt-4">
                                        <div class="form-check">
                                            <input type="checkbox" name="cursor_blend_mode" class="form-check-input" id="cursor_blend_mode" @if($setting->cursor_blend_mode == 1) checked @endif>
                                            <label class="form-check-label" for="cursor_blend_mode">Blend Mode</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-5 mb-0">
                                    <label for="cursor_border_size" class="form-label"> Border Size</label>
                                    <input type="text" name="cursor_border_size" value="{{$setting->cursor_border_size}}" class="form-control" id="cursor_border_size" aria-describedby="cursor_border_sizeHelp" placeholder="i.e. 1px or 1em">
                                </div>

                            </div>

                        </div>



                    </div>
                </div>

           

                <div class="card p-3 mb-2">

                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseHeadings" role="button"  aria-controls="collapseHeadings">Headings</h4>

                    <div class="row collapse " id="collapseHeadings">

                        <div class="form-group col-md-3">
                            <label for="headings_font" class="form-label">Font Family</label>
                            
                            <select class="form-control" name="headings_font_family">
                            <option value="">Select Font Family</option>    
                                @foreach($fornts as $fornt)
                                <option value="{{$fornt->id}}" @if($setting->headings_font_family_id == $fornt->id) SELECTED @endif > {{$fornt->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="headings_color" class="form-label">Color</label>
                            <input type="color" name="headings_color" value="{{$setting->headings_color}}" class="form-control" id="headings_color" aria-describedby="headings_colorHelp" placeholder="Enter Headings Color">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="headings_size" class="form-label">Size</label>
                            <input type="text" name="headings_size" value="{{$setting->headings_size}}" class="form-control" id="headings_size" aria-describedby="headings_sizeHelp" placeholder="i.e. 16px or 1em">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="headings_desktop_align" class="form-label w-100">Align</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">  
                                <input type="radio" class="btn-check" name="headings_desktop_align" id="headings_left" value="left" @if($setting->headings_desktop_align == "left") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_left">Left</label>

                                <input type="radio" class="btn-check" name="headings_desktop_align" id="headings_center" value="center" @if($setting->headings_desktop_align == "center") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_center">Center</label>

                                <input type="radio" class="btn-check" name="headings_desktop_align" id="headings_right" value="right" @if($setting->headings_desktop_align == "right") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_right">Right</label>
                            </div>
                        </div>


                        
                        <div class="form-group col-md-7">
                            <label for="headings_weight" class="form-label">Weight</label>
                            
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    
                                <input type="radio" class="btn-check" name="headings_weight" id="headings_weight_1" value="100" @if($setting->headings_weight == "100") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_1">100</label>

                                <input type="radio" class="btn-check" name="headings_weight" id="headings_weight_2" value="200" @if($setting->headings_weight == "200") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_2">200</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="300" id="headings_weight_3" @if($setting->headings_weight == "300") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_3">300</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="400" id="headings_weight_4" @if($setting->headings_weight == "400") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_4">400</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="500" id="headings_weight_5" @if($setting->headings_weight == "500") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_5">500</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="600" 
                                id="headings_weight_6" @if($setting->headings_weight == "600") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_6">600</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="700" id="headings_weight_7" @if($setting->headings_weight == "700") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_7">700</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="800" id="headings_weight_8" @if($setting->headings_weight == "800") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_8">800</label>

                                <input type="radio" class="btn-check" name="headings_weight" value="900" id="headings_weight_9" @if($setting->headings_weight == "900") checked @endif>
                                <label class="btn btn-outline-primary" for="headings_weight_9">900</label> 
                            </div>

                        </div>


                        
                    </div>
                </div>


                <div class="card p-3 mb-2">

                        <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseHeadings_mobile" role="button"  aria-controls="collapseHeadings_mobile">Headings 📱 Mobile View</h4>

                        <div class="row collapse " id="collapseHeadings_mobile">

                            <div class="form-group col-md-3">
                                <label for="headings_font_mobile" class="form-label">Font Family</label>
                                
                                <select class="form-control" name="headings_font_family_mobile">
                                <option value="">Select Font Family</option>    
                                    @foreach($fornts as $fornt)
                                    <option value="{{$fornt->id}}" @if($setting->headings_font_family_mobile_id == $fornt->id) SELECTED @endif > {{$fornt->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-2">
                                <label for="headings_color_mobile" class="form-label">Color</label>
                                <input type="color" name="headings_color_mobile" value="{{$setting->headings_color_mobile}}" class="form-control" id="headings_color_mobile" aria-describedby="headings_color_mobileHelp" placeholder="Enter Headings Color">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="headings_size_mobile" class="form-label">Size</label>
                                <input type="text" name="headings_size_mobile" value="{{$setting->headings_size_mobile}}" class="form-control" id="headings_size_mobile" aria-describedby="headings_size_mobileHelp" placeholder="i.e. 16px or 1em">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="headings_desktop_align_mobile" class="form-label w-100">Align</label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">  
                                    <input type="radio" class="btn-check" name="headings_desktop_align_mobile" id="headings_left_mobile" value="left" @if($setting->headings_desktop_align_mobile == "left") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_left_mobile">Left</label>

                                    <input type="radio" class="btn-check" name="headings_desktop_align_mobile" id="headings_center_mobile" value="center" @if($setting->headings_desktop_align_mobile == "center") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_center_mobile">Center</label>

                                    <input type="radio" class="btn-check" name="headings_desktop_align_mobile" id="headings_right_mobile" value="right" @if($setting->headings_desktop_align_mobile == "right") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_right_mobile">Right</label>
                                </div>
                            </div>

                            
                            <div class="form-group col-md-7">
                                <label for="headings_weight_mobile" class="form-label">Weight</label>
                                
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        
                                    <input type="radio" class="btn-check" name="headings_weight_mobile" id="headings_weight_mobile_1" value="100" @if($setting->headings_weight_mobile == "100") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_1">100</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" id="headings_weight_mobile_2" value="200" @if($setting->headings_weight_mobile == "200") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_2">200</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="300" id="headings_weight_mobile_3" @if($setting->headings_weight_mobile == "300") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_3">300</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="400" id="headings_weight_mobile_4" @if($setting->headings_weight_mobile == "400") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_4">400</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="500" id="headings_weight_mobile_5" @if($setting->headings_weight_mobile == "500") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_5">500</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="600" 
                                    id="headings_weight_mobile_6" @if($setting->headings_weight_mobile == "600") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_6">600</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="700" id="headings_weight_mobile_7" @if($setting->headings_weight_mobile == "700") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_7">700</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="800" id="headings_weight_mobile_8" @if($setting->headings_weight_mobile == "800") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_8">800</label>

                                    <input type="radio" class="btn-check" name="headings_weight_mobile" value="900" id="headings_weight_mobile_9" @if($setting->headings_weight_mobile == "900") checked @endif>
                                    <label class="btn btn-outline-primary" for="headings_weight_mobile_9">900</label> 
                                </div>

                            </div>


                        </div>
                        </div>




               
               
               
               
               
                <div class="card p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseBody" role="button"  aria-controls="collapseBody">Body</h4>

                    <div class="row collapse " id="collapseBody">
                
                        <div class="form-group col-md-3">
                            <label for="body_font" class="form-label">Font Family</label>
                            
                            <select class="form-control" name="body_font_family">
                            <option value="">Select Font Family</option>    
                                @foreach($fornts as $fornt)
                                <option value="{{$fornt->id}}" @if($setting->body_font_family_id == $fornt->id) SELECTED @endif > {{$fornt->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            <label for="body_color" class="form-label">Color</label>
                            <input type="color" name="body_color" value="{{$setting->body_color}}" class="form-control" id="body_color" aria-describedby="body_colorHelp" placeholder="Enter Body Color">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="body_size" class="form-label">Size</label>
                            <input type="text" name="body_size" value="{{$setting->body_size}}" class="form-control" id="body_size" aria-describedby="body_sizeHelp" placeholder="i.e. 16px or 1em">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="body_desktop_align" class="form-label w-100">Align</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">  
                                <input type="radio" class="btn-check" name="body_desktop_align" id="body_left" value="left" @if($setting->body_desktop_align == "left") checked @endif>
                                <label class="btn btn-outline-primary" for="body_left">Left</label>

                                <input type="radio" class="btn-check" name="body_desktop_align" id="body_center" value="center" @if($setting->body_desktop_align == "center") checked @endif>
                                <label class="btn btn-outline-primary" for="body_center">Center</label>

                                <input type="radio" class="btn-check" name="body_desktop_align" id="body_right" value="right" @if($setting->body_desktop_align == "right") checked @endif>
                                <label class="btn btn-outline-primary" for="body_right">Right</label>
                            </div>
                        </div>

                        
                        <div class="form-group col-md-7">
                            <label for="body_weight" class="form-label">Weight</label>
                        
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    
                                <input type="radio" class="btn-check" name="body_weight" value="100" id="body_weight_1" @if($setting->body_weight == "100") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_1">100</label>

                                <input type="radio" class="btn-check" name="body_weight" value="200" id="body_weight_2" @if($setting->body_weight == "200") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_2">200</label>

                                <input type="radio" class="btn-check" name="body_weight" value="300" id="body_weight_3" @if($setting->body_weight == "300") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_3">300</label>

                                <input type="radio" class="btn-check" name="body_weight" value="400" id="body_weight_4" @if($setting->body_weight == "400") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_4">400</label>

                                <input type="radio" class="btn-check" name="body_weight" value="500" id="body_weight_5" @if($setting->body_weight == "500") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_5">500</label>

                                <input type="radio" class="btn-check" name="body_weight" value="600" id="body_weight_6" @if($setting->body_weight == "600") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_6">600</label>

                                <input type="radio" class="btn-check" name="body_weight" value="700" id="body_weight_7" @if($setting->body_weight == "700") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_7">700</label>

                                <input type="radio" class="btn-check" name="body_weight" value="800" id="body_weight_8" @if($setting->body_weight == "800") checked @endif>
                                <label class="btn btn-outline-primary" id="body_weight_8">800</label>

                                <input type="radio" class="btn-check" name="body_weight" value="900" id="body_weight_9" @if($setting->body_weight == "900") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_9">900</label> 
                            </div>

                        </div>


                    </div>
                </div>


                <div class="card p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseBody_mobile" role="button"  aria-controls="collapseBody_mobile">Body 📱 Mobile View</h4>

                    <div class="row collapse " id="collapseBody_mobile">
                
                        <div class="form-group col-md-3">
                            <label for="body_font_mobile" class="form-label">Font Family</label>
                            
                            <select class="form-control" name="body_font_family_mobile">
                            <option value="">Select Font Family</option>    
                                @foreach($fornts as $fornt)
                                <option value="{{$fornt->id}}" @if($setting->body_font_family_mobile_id == $fornt->id) SELECTED @endif > {{$fornt->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            <label for="body_color_mobile" class="form-label">Color</label>
                            <input type="color" name="body_color_mobile" value="{{$setting->body_color_mobile}}" class="form-control" id="body_color_mobile" aria-describedby="body_color_mobileHelp" placeholder="Enter Body Color Mobile">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="body_size_mobile" class="form-label">Size</label>
                            <input type="text" name="body_size_mobile" value="{{$setting->body_size_mobile}}" class="form-control" id="body_size_mobile" aria-describedby="body_size_mobileHelp" placeholder="i.e. 16px or 1em">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="body_desktop_align_mobile" class="form-label w-100">Align</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">  
                                <input type="radio" class="btn-check" name="body_desktop_align_mobile" id="body_left_mobile" value="left" @if($setting->body_desktop_align_mobile == "left") checked @endif>
                                <label class="btn btn-outline-primary" for="body_left_mobile">Left</label>

                                <input type="radio" class="btn-check" name="body_desktop_align_mobile" id="body_center_mobile" value="center" @if($setting->body_desktop_align_mobile == "center") checked @endif>
                                <label class="btn btn-outline-primary" for="body_center_mobile">Center</label>

                                <input type="radio" class="btn-check" name="body_desktop_align_mobile" id="body_right_mobile" value="right" @if($setting->body_desktop_align_mobile == "right") checked @endif>
                                <label class="btn btn-outline-primary" for="body_right_mobile">Right</label>
                            </div>
                        </div>

                        
                        <div class="form-group col-md-7">
                            <label for="body_weight_mobile" class="form-label">Weight</label>
                        
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    
                                <input type="radio" class="btn-check" name="body_weight_mobile" value="100" id="body_weight_mobile_1" @if($setting->body_weight_mobile == "100") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_1">100</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="200" id="body_weight_mobile_2" @if($setting->body_weight_mobile == "200") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_2">200</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="300" id="body_weight_mobile_3" @if($setting->body_weight_mobile == "300") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_3">300</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="400" id="body_weight_mobile_4" @if($setting->body_weight_mobile == "400") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_4">400</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="500" id="body_weight_mobile_5" @if($setting->body_weight_mobile == "500") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_5">500</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="600" id="body_weight_mobile_6" @if($setting->body_weight_mobile == "600") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_6">600</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="700" id="body_weight_mobile_7" @if($setting->body_weight_mobile == "700") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_7">700</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="800" id="body_weight_mobile_8" @if($setting->body_weight_mobile == "800") checked @endif>
                                <label class="btn btn-outline-primary" id="body_weight_mobile_8">800</label>

                                <input type="radio" class="btn-check" name="body_weight_mobile" value="900" id="body_weight_mobile_9" @if($setting->body_weight_mobile == "900") checked @endif>
                                <label class="btn btn-outline-primary" for="body_weight_mobile_9">900</label> 
                            </div>

                        </div>

                    </div>
                </div>



                <div class="card p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseLinks" role="button"  aria-controls="collapseLinks">Links</h4>

                    <div class="row collapse " id="collapseLinks">

                        <div class="form-group col-md-3">
                            <label for="links_font" class="form-label">Font Family</label>
                            
                            <select class="form-control" name="links_font_family">
                            <option value="">Select Font Family</option>    
                                @foreach($fornts as $fornt)
                                <option value="{{$fornt->id}}" @if($setting->links_font_family_id == $fornt->id) SELECTED @endif > {{$fornt->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            <label for="links_color" class="form-label">Color</label>
                            <input type="color" name="links_color" value="{{$setting->links_color}}" class="form-control" id="links_color" aria-describedby="links_colorHelp" placeholder="Enter Links Color">
                        </div>

                        <div class="form-group col-md-3"> 
                            <label for="links_size" class="form-label">Size</label>
                            <input type="text" name="links_size" value="{{$setting->links_size}}" class="form-control" id="links_size" aria-describedby="links_sizeHelp" placeholder="i.e. 16px or 1em">
                        </div>

                        
                        <div class="form-group col-md-7">
                            <label for="links_weight" class="form-label">Weight</label>
                            
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    
                                <input type="radio" class="btn-check" name="links_weight" value="100" id="links_weight_1" @if($setting->links_weight == "100") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_1">100</label>

                                <input type="radio" class="btn-check" name="links_weight" value="200" id="links_weight_2" @if($setting->links_weight == "200") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_2">200</label>

                                <input type="radio" class="btn-check" name="links_weight" value="300" id="links_weight_3" @if($setting->links_weight == "300") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_3">300</label>

                                <input type="radio" class="btn-check" name="links_weight" value="400" id="links_weight_4" @if($setting->links_weight == "400") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_4">400</label>

                                <input type="radio" class="btn-check" name="links_weight" value="500" id="links_weight_5" @if($setting->links_weight == "500") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_5">500</label>

                                <input type="radio" class="btn-check" name="links_weight" value="600" id="links_weight_6" @if($setting->links_weight == "600") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_6">600</label>


                                <input type="radio" class="btn-check" name="links_weight" value="700" id="links_weight_7" @if($setting->links_weight == "700") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_7">700</label>

                                <input type="radio" class="btn-check" name="links_weight" value="800" id="links_weight_8" @if($setting->links_weight == "800") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_8">800</label>

                                <input type="radio" class="btn-check" name="links_weight" value="900" id="links_weight_9" @if($setting->links_weight == "900") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_9">900</label> 
                            </div>

                            
                        </div>

                        <!--div class="form-group col-md-7">
                            <label for="links_desktop_align" class="form-label w-100">Links Align</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">  
                                <input type="radio" class="btn-check" name="links_desktop_align" id="links_left" value="left" @if($setting->links_desktop_align == "left") checked @endif>
                                <label class="btn btn-outline-primary" for="links_left">Left</label>

                                <input type="radio" class="btn-check" name="links_desktop_align" id="links_center" value="center" @if($setting->links_desktop_align == "center") checked @endif>
                                <label class="btn btn-outline-primary" for="links_center">Center</label>

                                <input type="radio" class="btn-check" name="links_desktop_align" id="links_right" value="right" @if($setting->links_desktop_align == "right") checked @endif>
                                <label class="btn btn-outline-primary" for="links_right">Right</label>
                            </div>
                        </div-->
                    </div>
                </div>


                

                <div class="card p-3 mb-2">
                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapseLinks_mobile" role="button"  aria-controls="collapseLinks_mobile">Links 📱 Mobile View</h4>

                    <div class="row collapse " id="collapseLinks_mobile">

                        <div class="form-group col-md-3">
                            <label for="links_font_mobile" class="form-label">Font Family</label>
                            
                            <select class="form-control" name="links_font_family_mobile">
                            <option value="">Select Font Family</option>    
                                @foreach($fornts as $fornt)
                                <option value="{{$fornt->id}}" @if($setting->links_font_family_mobile_id == $fornt->id) SELECTED @endif > {{$fornt->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            <label for="links_color_mobile" class="form-label">Color</label>
                            <input type="color" name="links_color_mobile" value="{{$setting->links_color_mobile}}" class="form-control" id="links_color_mobile" aria-describedby="links_color_mobileHelp" placeholder="Enter Links Color Mobile">
                        </div>

                        <div class="form-group col-md-3"> 
                            <label for="links_size_mobile" class="form-label">Size</label>
                            <input type="text" name="links_size_mobile" value="{{$setting->links_size_mobile}}" class="form-control" id="links_size_mobile" aria-describedby="links_size_mobileHelp" placeholder="i.e. 16px or 1em">
                        </div>

                        
                        <div class="form-group col-md-7">
                            <label for="links_weight_mobile" class="form-label">Weight</label>
                            
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    
                                <input type="radio" class="btn-check" name="links_weight_mobile" value="100" id="links_weight_mobile_1" @if($setting->links_weight_mobile == "100") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_1">100</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="200" id="links_weight_mobile_2" @if($setting->links_weight_mobile == "200") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_2">200</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="300" id="links_weight_mobile_3" @if($setting->links_weight_mobile == "300") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_3">300</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="400" id="links_weight_mobile_4" @if($setting->links_weight_mobile == "400") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_4">400</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="500" id="links_weight_mobile_5" @if($setting->links_weight_mobile == "500") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_5">500</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="600" id="links_weight_mobile_6" @if($setting->links_weight_mobile == "600") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_6">600</label>


                                <input type="radio" class="btn-check" name="links_weight_mobile" value="700" id="links_weight_mobile_7" @if($setting->links_weight_mobile == "700") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_7">700</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="800" id="links_weight_mobile_8" @if($setting->links_weight_mobile == "800") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_8">800</label>

                                <input type="radio" class="btn-check" name="links_weight_mobile" value="900" id="links_weight_mobile_9" @if($setting->links_weight_mobile == "900") checked @endif>
                                <label class="btn btn-outline-primary" for="links_weight_mobile_9">900</label> 
                            </div>

                            
                        </div>

                        <!--div class="form-group col-md-7">
                            <label for="links_desktop_align_mobile" class="form-label w-100">Links Align</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">  
                                <input type="radio" class="btn-check" name="links_desktop_align_mobile" id="links_left_mobile" value="left" @if($setting->links_desktop_align_mobile == "left") checked @endif>
                                <label class="btn btn-outline-primary" for="links_left_mobile">Left</label>

                                <input type="radio" class="btn-check" name="links_desktop_align_mobile" id="links_center_mobile" value="center" @if($setting->links_desktop_align_mobile == "center") checked @endif>
                                <label class="btn btn-outline-primary" for="links_center_mobile">Center</label>

                                <input type="radio" class="btn-check" name="links_desktop_align_mobile" id="links_right_mobile" value="right" @if($setting->links_desktop_align_mobile == "right") checked @endif>
                                <label class="btn btn-outline-primary" for="links_right_mobile">Right</label>
                            </div>
                        </div-->

                    </div>
                </div>






                <div class="card p-3 mb-2">

                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapsehover_border" role="button"  aria-controls="collapsehover_border">Hover Border</h4>

                    <div class="row collapse " id="collapsehover_border">

                        <div class="form-group col-md-3">
                            <label for="hover_border_color" class="form-label">Color</label>
                            <input type="color" name="hover_border_color" value="{{$setting->hover_border_color}}" class="form-control" id="hover_border_color" aria-describedby="hover_border_colorHelp" placeholder="Enter hover_border Color">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="hover_border_size" class="form-label">Size</label>
                            <input type="text" name="hover_border_size" value="{{$setting->hover_border_size}}" class="form-control" id="hover_border_size" aria-describedby="hover_border_sizeHelp" placeholder="i.e. 2px or 1em" maxlength="3">
                        </div>

                    </div>
                </div>
                
                <!-- mobile -->
                <div class="card p-3 mb-2">

                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapsehover_border_mobile" role="button"  aria-controls="collapsehover_border_mobile">Hover Border 📱 Mobile View </h4>

                    <div class="row collapse " id="collapsehover_border_mobile">

                        <div class="form-group col-md-3">
                            <label for="hover_border_color_mobile" class="form-label">Color</label>
                            <input type="color" name="hover_border_color_mobile" value="{{$setting->hover_border_color_mobile}}" class="form-control" id="hover_border_color_mobile" aria-describedby="hover_border_color_mobileHelp" placeholder="Enter Hover Border Color Mobile">
                        </div>

                        <!-- <div class="form-group col-md-3">
                            <label for="hover_border_mobile_size" class="form-label">Size</label>
                            <input type="text" name="hover_border_mobile_size" value="{{$setting->hover_border_mobile_size}}" class="form-control" id="hover_border_mobile_size" aria-describedby="hover_border_mobile_sizeHelp" placeholder="i.e. 2px or 1em">
                        </div> -->

                    </div>
                </div>



                <div class="card p-3 mb-2">

                    <h4 data-bs-toggle="collapse" aria-expanded="false" href="#collapse_selection" role="button"  aria-controls="collapsehover_border">Selection</h4>

                    <div class="row collapse " id="collapse_selection">

                        <div class="form-group col-md-3">
                            <label for="selection_color" class="form-label">Selection Color</label>
                            <input type="color" name="selection_color" value="{{$setting->selection_color}}" class="form-control" id="selection_color" aria-describedby="selection_colorHelp" placeholder="Selection Color">
                        </div>

                    </div>
                </div>
             

            </div>
            
        </div>
    </div>
</div>

</form>


<script>
$(document).ready(function () {
    $('.reset_image').click(function(){
        $("input[name=bg_image_check]").val('true');
        $('.image-perview-img').attr('src',"{{ url('/uploads/') }}/no-image.jpg");
    })
})
 const input = document.getElementById('video_url_1')
 
 input.addEventListener('change', (event) => {
     const target = event.target
       if (target.files && target.files[0]) {
       const sizeLimitInMB = parseFloat( event.target.getAttribute('data-limit') );
       const maxSizeLimit = sizeLimitInMB * 1024 * 1024;
       if (target.files[0].size > maxSizeLimit) {
         alert(`Select file size is ${maxSizeLimit} Big file`)
         target.value = '' // Reset select file
       }
   }
 })







 
let uploadVideoFilePreviewFunc = function(){
  let videoFileInputs = document.querySelectorAll('.video-input');

    videoFileInputs.forEach(function (el, index) {

    el.addEventListener('change', function() {
    
      let _idEl = el.getAttribute('id');
      let _idVid = el.getAttribute('id')+"_preview";
      console.log(_idVid)
      let file = event.target.files[0];
      let blobURL = URL.createObjectURL(file);
      document.getElementById( _idVid ).src = blobURL;
      document.getElementById( _idVid ).play()
      
    })
    
  })
}
                   
uploadVideoFilePreviewFunc()
</script>

@endsection


