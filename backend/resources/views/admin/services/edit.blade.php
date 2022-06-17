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
            <h3 class="text-center">Services</h3>
        </div>

        <div class="card p-4 col-md-3 mx-4" >
            <a class="btn btn-primary justify-content-center edit-form" data-route="{{ route('admin.services_show', 0)}}">
                <span class="material-icons">add</span>
                <span>New Service</span>
            </a>
 
            <hr />
            <div class="show-data">
                @foreach($all_service as $key => $value)

                <div class="delete_btns btn mb-2 {{ request()->segment(3) == $value->id ? 'link active btn-outline-primary00 p-1' : 'btn-outline-dark00 p-1' }}">
                    <a class="text edit-form" data-route="{{ route('admin.services_show', $value->id)}}">
                        {{ $key+1 }}:  {{ $value->title }} &nbsp;
                    </a>

                    <form action="{{ route('admin.services_delete', $value->id)}}" class="ms-auto">
                        <a class="btn-del sweet-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"/></svg>
                        </a>
                    </form>
                </div>

                @endforeach
            </div>
        </div>
        
        <div class="card  p-4 col-md-8">
 
            <form method="post" action="{{ route('services_store') }}" class="form-submit">
                @csrf
                <input type="hidden" name="id" value="{{$service->id}}">
                <!-- <div class="form-group">
                    <label for="InputUserId">User Id</label>
                    <input type="text" name="u_id" value="{{$service->u_id}}" class="form-control" id="InputUserId" aria-describedby="userIdHelp" placeholder="Enter User Id">
                    <small id="userIdHelp" class="form-text text-muted">We'll never share your user id with anyone else.</small>
                </div> -->

                 <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$service->title}}" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title" required>
                </div>

                <!-- <div class="form-group">
                    <label for="management">Management</label>
                    <input type="text" name="management" value="{{$service->management}}" class="form-control" id="management" aria-describedby="managementHelp" placeholder="Enter Management">
                </div> -->
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" name="content" class="form-control" id="content" aria-describedby="contentHelp" placeholder="Enter Content" rows="4">{{$service->content}}</textarea>
                </div>
                <!-- <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status" @if($service->status == 1) checked @endif>
                        <label class="form-check-label" for="status">Status</label>
                    </div>
                </div>  -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons">save</span>
                        <span>Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
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
               
                $('#content').val('');
                $('#title').val('');
                $('.show-data').empty();
                let all_service = response[1]['all_service'];
                for(let i=0; i < all_service.length; i++){
                    let c_id = all_service[i].id;
                    let url =  "{{route('admin.services_show','')}}" + "/" + c_id
                    let url1 =  "{{route('admin.services_delete','')}}" + "/" + c_id
                    let c_append = '<div class="delete_btns btn mb-2"><a class="text edit-form" data-route="'+url+'">'+ (i+1) +' '+all_service[i].title +'</a><form action="'+url1+'" class="ms-auto"><a class="btn-del ms-auto sweet-delete"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z"/></svg></a></form></div>';
                    $('.show-data').append(c_append);
                }

                $(".edit-form").on('click', function(){
                    let $urls = $(this).data('route');
                    ajax($urls);
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
        let $urls = $(this).data('route');
        $('#content').val('');
        $('#title').val('');
        ajax($urls);
    }); 

    function ajax($urls){
        // let dataId = $(this).attr("data-route");
        $.ajax({
            type: 'GET',
            url: $urls,
            success: function (form_data) {
                if(form_data.data.service.content == undefined && form_data.data.service.title == undefined){
                    $("input[name='id']").val(0);
                    $("input[name='title']").val('');
                    $("#content").empty();
                }else{
                    $("input[name='id']").val(form_data.data.service.id);
                    $("input[name='title']").val(form_data.data.service.title);
                    $("#content").val(form_data.data.service.content);
                }
            }, error: function (form_data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops something went wrong!',
                });
            }
        });
    }
});
</script>
@endsection
