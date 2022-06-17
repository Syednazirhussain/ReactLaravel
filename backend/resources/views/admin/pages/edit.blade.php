@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="card p-4 col-md-2" > 

            <h4> Pages </h4>
            <br>


            @foreach($all_pages as $value)

                <a class="{{ request()->segment(3) == $value->id ? 'active link p-1' : 'link p-1' }}" href="{{ route('admin.pages_show', $value->id)}}">
                    {{ $value->id }}:  {{ $value->title }} &nbsp;
                </a>
            @endforeach

        </div>
        
        <div class="card  p-4 col-md-9 offset-md-1">
        
            <h4> {{$page->title}} page</h4>

           <br>

            <form method="post" id="formPageEdit" action="{{ route('admin.pages_store') }}">
                @csrf
                <input type="hidden" name="id" value="{{$page->id}}">
                <!-- <div class="form-group">
                    <label for="InputUserId">User Id</label>
                    <input type="text" name="u_id" value="{{$page->u_id}}" class="form-control" id="InputUserId" aria-describedby="userIdHelp" placeholder="Enter User Id">
                    <small id="userIdHelp" class="form-text text-muted">We'll never share your user id with anyone else.</small>
                </div> -->

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$page->title}}" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title" required />
                </div>



                @if($page->id == 2 )

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description"  class="form-control" id="description" aria-describedby="descriptionHelp" placeholder="Enter Description" required >{{$page->description}}</textarea>
                </div>
                

                @endif

                 
                <div class="form-group">
                    <label for="content">Content</label>
                    
                    <textarea type="text" name="content" class="form-control" id="content" aria-describedby="contentHelp" placeholder="Enter Content" rows="5" >{{$page->content}}</textarea>
                </div>

                <!--div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="{{$page->slug}}" class="form-control" id="slug" aria-describedby="slugHelp" placeholder="Enter slug">
                    <small id="slugHelp" class="form-text text-muted">Enter slug.</small>
                </div>

                <div class="form-group">
                    <label for="parent_id">Parent Id</label>
                    <input type="text" name="parent_id" value="{{$page->parent_id}}" class="form-control" id="parent_id" aria-describedby="parent_idHelp" placeholder="Enter Parent Id">
                    <small id="parent_idHelp" class="form-text text-muted">Enter Parent Id.</small>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status" @if($page->status == 1) checked @endif>
                        <label class="form-check-label" for="status">Status</label>
                    </div>
                </div-->
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

    CKEDITOR.replace( 'content', {
        on: {
            blur: function( evt ){        
                ckEditorRequired('content')
            },
            change: function( evt ){        
                console.log(evt.editor.getData());
            }
        }
    } );


    function ckEditorRequired( el ) {
       var messageLength = CKEDITOR.instances[el].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a message' ); 
        }
    }

    $(document).ready(function(){
        $(".show").click(function(){
            var dataId = $(this).attr("data-route");
            // alert(dataId);
                // $.ajax({
                //     type: 'GET',
                //     url: $(this).data('route'),
                //     success: function (data) {
                //         // $("#modalContent").empty().html(data.data);
                //         // basic_tasks();
                //         // // if (typeof ckeditor === 'function') {
                //         //     // }
                //         // $('.select2-modal').select2();
                //         // ckeditor();

                //     }, error: function (data) {
                //         Swal.fire({
                //             icon: 'error',
                //             title: 'Oops something went wrong!',
                //         });
                //     }
                // });
        });
    });
</script>




@endsection

