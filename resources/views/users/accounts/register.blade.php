@extends('users.accounts.master')
@section('content')
<div class="main-wrapper register-page rounded shadown-sm">
    <div class="row">
        <div class="col-lg-6 m-0 p-0 register-left">
            <img src="https://top10tphcm.com/wp-content/uploads/2018/11/hightway-store-Copy-1.jpg" width="100%" height="600px" alt="" class="img-shop d-block">
        </div>
        <div class="col-lg-6 register-right">
            <h3 class="title">ĐĂNG KÝ THÀNH VIÊN</h3>
            <form id="register_form_users" action="{{ route('users.post.register') }}" class="register-form mt-4" method="POST">
                @csrf
                <div class="row form-group mr-1">
                    <div class="col-sm-6">
                        <label for="user_name">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Tên đăng nhập">
                        {!! $errors->first('user_name','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-sm-6 pl-0">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                </div>
                <div class="row form-group mr-1">
                    <div class="col-sm-6">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Số điện thoại">
                        {!! $errors->first('phone_number','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-sm-6 pl-0">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ">
                        {!! $errors->first('address','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                </div>
                <div class="row form-group mr-1">
                    <div class="col-sm-6">
                        <label for="username">Tuổi</label>
                        <input type="text" name="age" class="form-control" id="age" placeholder="Tuổi">
                        {!! $errors->first('age','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-sm-6 pl-0">
                        <label for="gender">Giới Tính</label><br>
                        <input type="radio" checked name="gender" id="gender" value="1"> Nam &emsp; &emsp;
                        <input type="radio" name="gender" id="gender" value="0"> Nữ
                    </div>
                </div>
                <div class="row form-group mr-1">
                    <div class="col-sm-6">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                        {!! $errors->first('password','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                    <div class="col-sm-6 pl-0">
                        <label for="confirm">Nhập Lại Mật khẩu</label>
                        <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Nhập lại mật khẩu">
                        {!! $errors->first('confirm','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                </div>
                <div class="btn-form text-center mt-4">
                    <button type="submit" class="btn btn-register btn-primary">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>  
@endsection