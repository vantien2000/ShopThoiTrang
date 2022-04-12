@extends('users.accounts.master')
@section('content')
<div class="main-wrapper rounded shadown-sm pt-4 pb-2">
    <div class="title text-center">
        <a class="d-block" href=""><img src="https://incucdep.com/wp-content/uploads/2014/12/logo-thoi-trang.jpg" width="100" alt=""></a>
        <h3 class="f-max mt-2">ĐĂNG NHẬP</h3>
        <p class="text-info">Shop thời trang MieFashion</p>
    </div>
    <form action="{{ route('users.post.login') }}" id="login_form_users" class="login-form mr-4 ml-4" method="POST">
        @csrf
        <div class="form-group mt-1">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            {!! $errors->first('email','<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group m-0">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            {!! $errors->first('password','<span class="text-danger">:message</span>') !!}
            {!! $errors->first('mgs','<span class="text-danger">' . $errors->first('mgs') . '</span>') !!}
        </div>
        <div class="btn-form text-center mt-4">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <a href="{{ route('users.register') }}" class="btn btn-info">Đăng Ký</a>
        </div>
    </form>
</div>  
@endsection