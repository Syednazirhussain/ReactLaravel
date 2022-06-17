@extends('layouts.app')

@section('content')
<style>
    .delete_btns {
    display: flex;
}

.delete_btns svg {
    width: 18px;
    fill: red;
}
</style>

<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-12">
        <h3 class="text-center">Fonts</h3>
    </div>
        
        <div class="card p-4 col-md-3 mx-4" > 

        <a class="btn btn-primary justify-content-center edit-form" data-route="{{ route('admin.fonts_show', 0)}}">
                <span class="material-icons">add</span>
                <span>New Font</span>
            </a>
 
            <hr />
            <div class="show-data">
            @foreach($all_font as $value)
                <div class="delete_btns btn mb-2 {{ request()->segment(3) == $value->id ? 'link active btn-outline-primary00 p-1' : 'btn-outline-dark00 p-1' }}">
                    <a class="{{ request()->segment(3) == $value->id ? 'active link p-1' : 'link p-1' }} edit-form" data-route="{{ route('admin.fonts_show', $value->id)}}">
                        {{ $value->id }}:  {{ $value->name }} &nbsp;
                    </a>
                    <form action="{{ route('admin.fonts_delete', $value->id)}}" class="ms-auto">
                        <a class="btn-del sweet-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"/></svg>
                        </a>
                    </form>
                </div>
                @endforeach
            </div>

        </div>
        
        <div class="card p-4 col-md-8">
            <h4> {{$font->name}} Font</h4>
           <br>
            <form method="post" id="formPageEdit" action="{{ route('admin.fonts_store') }}" class="form-submit">
                @csrf
                <input type="hidden" name="id" value="{{$font->id}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$font->name}}" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" required />
                </div>

                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" value="{{$font->link}}" class="form-control" id="link" aria-describedby="linkHelp" placeholder="Enter Link" required />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" data-click="false" id="submit">
                        <span class="material-icons">save</span> 
                        <span>Save</span>
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div> 
                
                @if (\Session::has('success'))
                    <div class="mt-2 alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
            </form>
        </div> 
    </div>
</div>

<script>
    CKEDITOR.replace( 'content' );
</script>
<script>
$(document).ready(function(){
    $(document).on('submit', '.form-submit', function (e) {
        e.preventDefault();
        var data = new FormData($('.form-submit').get(0));
        $.ajax({
            type: 'POST',
            url: $('.form-submit').attr('action'),
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response[0],
                });

                $('.show-data').empty();
                let all_fonts = response[1]['all_font'];
                for(let i=0; i < all_fonts.length; i++){
                    let c_id = all_fonts[i].id;
                    let url =  "{{route('admin.fonts_show','')}}" + "/" + c_id
                    let url1 =  "{{route('admin.fonts_delete','')}}" + "/" + c_id
                    let c_append = '<div class="delete_btns btn mb-2"><a class="text edit-form" data-route="'+url+'">'+ (i+1) +' '+all_fonts[i].name +'</a><form action="'+url1+'" class="ms-auto"><a class="btn-del ms-auto sweet-delete"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"/></svg></a></form></div>';
                    $('.show-data').append(c_append);
                }
                
                $(".edit-form").on('click', function(){
                    let dataId = $(this).attr("data-route");

                    $.ajax({
                        type: 'GET',
                        url: $(this).data('route'),
                        success: function (form_data) {
                            
                            if(form_data.data.font.name == undefined && form_data.data.font.link == undefined){
                                $("input[name='id']").val(0);
                                $("input[name='name']").val('');
                                $("input[name='link']").val('');
                            }else{
                                $("input[name='id']").val(form_data.data.font.id);
                                $("input[name='name']").val(form_data.data.font.name);
                                $("input[name='link']").val(form_data.data.font.link);
                            }
                        }, error: function (form_data) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops something went wrong!',
                            });
                        }
                    });
                });
            },
            error: function (request, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops something went wrong!',
                });
            }
        });
    });

    $(".edit-form").on('click', function(){
        
        let dataId = $(this).attr("data-route");
        $.ajax({
            type: 'GET',
            url: $(this).data('route'),
            success: function (form_data) {
                if(form_data.data.font.name == undefined && form_data.data.font.link == undefined){
                    $("input[name='id']").val(0);
                    $("input[name='name']").val('');
                    $("input[name='link']").val('');
                }else{
                    $("input[name='id']").val(form_data.data.font.id);
                    $("input[name='name']").val(form_data.data.font.name);
                    $("input[name='link']").val(form_data.data.font.link);
                }
            }, error: function (form_data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops something went wrong!',
                });
            }
        });
    }); 
});
</script>
@endsection
