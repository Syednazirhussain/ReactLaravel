@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Users Form</h1>

            <form method="post" action="{{ route('admin.users_store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="InputUserId">User Id</label>
                    <input type="text" name="u_id" value="{{$user->u_id}}" class="form-control" id="InputUserId" aria-describedby="userIdHelp" placeholder="Enter User Id">
                    <small id="userIdHelp" class="form-text text-muted">We'll never share your user id with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
                    <small id="usernameHelp" class="form-text text-muted">Enter User Name.</small>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$user->email}}"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                    <small id="emailHelp" class="form-text text-muted">Enter Email.</small>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" value="{{$user->password}}" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter password">
                    <small id="passwordHelp" class="form-text text-muted">Enter password.</small>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" value="{{$user->role}}" class="form-control" id="role" aria-describedby="roleHelp" placeholder="Enter Role">
                    <small id="roleHelp" class="form-text text-muted">Enter Role.</small>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" value="{{$user->contact_number}}" class="form-control" id="contact_number" aria-describedby="contact_numberHelp" placeholder="Enter Contact Number">
                    <small id="contact_numberHelp" class="form-text text-muted">Enter Contact Number.</small>
                </div>

                <div class="form-group">
                    <label for="email_verfiy">Email Verfiy</label>
                    <input type="date" name="email_verfiy" value="{{$user->email_verfiy}}" class="form-control" id="email_verfiy" aria-describedby="email_verfiyHelp" placeholder="Enter Email Verfiy">
                    <small id="email_verfiyHelp" class="form-text text-muted">Enter Email Verfiy.</small>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" value="{{$user->location}}" class="form-control" id="location" aria-describedby="locationHelp" placeholder="Enter Location">
                    <small id="locationHelp" class="form-text text-muted">Enter Location.</small>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status" @if($user->status == 1) checked @endif>
                        <label class="form-check-label" for="status">Status</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control form-control-sm" name="image" id="image" type="file">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
