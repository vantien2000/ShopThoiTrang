@extends('users.layouts.master')
@section('content')
@include('users.layouts.pageLink')
@php
    $user = Auth::user();
@endphp
<div class="main-container page-profile">
    <div class="container-wrapper">
        <h3 class="text-center f-bolder my-3">THÔNG TIN CÁ NHÂN</h3>
        <form class="row profile-form" action="{{ route('users.post.profile') }}" id="profile_user_form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 col-sm-6">
                <div class="form-group avatar-form">
                    <label class="f-bolder" for="avatar">Avatar</label>
                    <div class="upload-avatar d-flex justify-content-center">
                        <input type="file" id="avatar" name="avatar" class="form-control">
                    </div>
                    <img class="avatar_image" src="{{ !empty($user->avatar) ? asset('/userfiles/images/users/' . $user->avatar) : asset('/userfiles/images/users/default_user.webp') }}" alt="" width="124px" height="124px">
                    {!! $errors->first('avatar','<span class="d-block text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="f-bolder" for="address">Password <span class="text-danger">(*)</span></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu" />
                    {!! $errors->first('password','<span class="d-block text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="f-bolder" for="confirm">Confirm Password <span class="text-danger">(*)</span></label>
                    <input type="password" id="confirm" name="confirm" class="form-control" placeholder="Xác Nhận Mật Khẩu" />
                    {!! $errors->first('confirm','<span class="d-block text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label class="f-bolder" for="username">Username <span class="text-danger">(*)</span></label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->user_name }}" placeholder="Nhập Username" />
                    {!! $errors->first('username','<span class="d-block text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="f-bolder" for="email">Email <span class="text-danger">(*)</span></label>
                    <input type="text" id="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="Nhập Email" />
                    {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="f-bolder" for="phone_number">Phone number <span class="text-danger">(*)</span></label>
                    <input type="text" id="phone_number" value="{{ $user->phone_number }}" name="phone_number" class="form-control" placeholder="Nhập Phone Number" />
                    {!! $errors->first('phone_number','<span class="d-block text-danger">:message</span>') !!}
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label class="f-bolder" for="age">Age </label>
                        <input type="number" value="{{ $user->age }}" id="age" name="age" min="12" max="100" class="form-control" placeholder="Nhập Tuổi" />
                    </div>
                    <div class="col-lg-6 form-group">
                        <label class="f-bolder" for="gender">Gender </label>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check-inline">
                                <input type="radio" name="gender" value="0" checked class="form-check-input" />
                                <label class="form-check-label" {{ $user->gender == 0 ? 'selected' : '' }}  for="gender">Male </label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="gender" value="1" class="form-check-input" />
                                <label class="form-check-label" {{ $user->gender == 1 ? 'selected' : '' }} for="gender">Female </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="f-bolder" for="address">Address <span class="text-danger">(*)</span></label>
                    <input type="text" id="address" value="{{ $user->address }}" name="address" class="form-control" placeholder="Nhập Địa Chỉ" />
                    {!! $errors->first('address','<span class="d-block text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection