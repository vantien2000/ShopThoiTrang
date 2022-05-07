@extends('admin.layouts.master')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @include('admin.links.index')
        <div class="container-fluid">
            <div class="row">
                @if ($admin)
                <div class="col-lg-5 col-xl-4">
                    <div class="shadow-sm rounded bg-white p-4 mb-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="mr-3" src="{{ asset('/userfiles/images/users/' . $admin->avatar) }}" width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">{{ $admin->user_name }}</h3>
                                <p class="text-muted mb-0">Developer</p>
                            </div>
                        </div>
                        <h4>About Me</h4>
                        <div class="infor">
                            <ul class="mr-4">
                                <li>Email: <span class="ml-3">{{ $admin->email }}</span></li>
                                <li>Phone number: <span class="ml-3">{{ $admin->phone_number }}<span></li>
                                <li>Address: <span class="ml-3">{{ $admin->address }}<span></li>
                                <li>Gender: <span class="ml-3">{{ $admin->gender }}<span></li>
                                <li>Age: <span class="ml-3">{{ $admin->age }}<span></li>
                            </ul>
                        </div>
                        <h4>Contact</h4>
                        <div class="">
                            <ul class="d-flex">
                                <li><a href="">a</a></li>
                                <li><a href="">b</a></li>
                                <li><a href="">c</a></li>
                                <li><a href="">d</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-7 col-xl-8">
                    <div class="shadow-sm rounded bg-white p-4 mb-4">
                        <form id="profile-form-admin" action="{{ route('admin.profile.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Change Profile</h3>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-8 col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" id="user_name" class="form-control" name="user_name" value="{{ old("user_name") }}">
                                        {!! $errors->first('user_name','<span class="d-block text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old("email") }}" aria-describedby="emailHelp">
                                        {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old("phone_number") }}">
                                        {!! $errors->first('phone_number','<span class="d-block text-danger">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ old("address") }}">
                                        {!! $errors->first('address','<span class="d-block text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 avatar-upload">
                                    <div class="form-group upload-form">
                                        <label for="exampleInputEmail1">Avatar Upload</label>
                                        <img class="img-profile img-preview cursor-pointer" src="{{ old('avatar') ? old('avatar') : asset('admins/images/profile/3.jpg') }}" alt="">
                                        <label class="btn btn-primary mt-3" for="avatar_upload">Choose File</label>
                                        <input type="file" class="form-control d-none file-upload-avatar" name="avatar" id="avatar_upload">
                                        {!! $errors->first('avatar','<span class="d-block text-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
    
@endsection