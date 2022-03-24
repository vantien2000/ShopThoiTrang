@extends('admin.layouts.master')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @include('admin.links.index')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-xl-4">
                    <div class="shadow-sm rounded bg-white p-4 mb-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">Tiến Nguyễn</h3>
                                <p class="text-muted mb-0">Developer</p>
                            </div>
                        </div>
                        <h4>About Me</h4>
                        <div class="infor">
                            <ul class="mr-4">
                                <li>Email: <span class="ml-3">absc@gmail.com</span></li>
                                <li>Phone number: <span class="ml-3">0123456789<span></li>
                                <li>Address: <span class="ml-3">Thanh Hóa<span></li>
                                <li>Gender: <span class="ml-3">Male<span></li>
                                <li>Age: <span class="ml-3">22<span></li>
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
                <div class="col-lg-7 col-xl-8">
                    <div class="shadow-sm rounded bg-white p-4 mb-4">
                        <form>
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Change Profile</h3>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-8 col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="form-group justify-content-center">
                                        <label for="exampleInputEmail1">Avatar Upload</label>
                                        <div class="">
                                            <img class="img-profile" src="{{ asset('admins/images/profile/3.jpg') }}" alt="">
                                        </div>
                                        <input type="file" class="form-control" name="" id="">
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