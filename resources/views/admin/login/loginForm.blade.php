@extends('admin.login.master')
@section('content')
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h1>Admin</h1></a>
                                <form action="{{ route('admin.login.post') }}" method="POST" id="login-form-admin" class="mt-5 mb-5 login-input">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" id="email" class="form-control" type="email" placeholder="Email">
                                    </div>
                                    {!! $errors->first('email','<span class="text-danger">:message</span>') !!}
                                    <div class="form-group form-pass-login">
                                        <input name="password" id="password" type="password" class="form-control inputPass" placeholder="Password"><span class="icon-eyes fa fa-eye" aria-hidden="true"></span>
                                    </div>
                                    {!! $errors->first('password','<span class="text-danger">:message</span>') !!}
                                    {!! $errors->first('mgs','<span class="text-danger">' . $errors->first('mgs') . '</span>') !!}
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    