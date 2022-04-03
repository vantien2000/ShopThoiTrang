<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Fashion</title>
    <!-- Favicon icon -->

    @include('users.extends.CSS')
</head>

<body>

    <div class="main-container">
        @include('users.layouts.header')
        <div class="main-wrapper">
            @include('users.layouts.banner')
            <div class="container">
                <div class="top">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-center m-auto">
                        <ul class="navbar-nav top-navbar">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">NEW </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">SALE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">TOP RATE</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="product-wrapper">
                        <div class="product">
                            <a href="">
                                <img src="https://cf.shopee.vn/file/008d7e1f9a3d39ae9d6a7cc09a6c3233" width="200" height="250" alt="">
                            </a>
                            <p class="m-0">Product Name</p>
                            <div class=""><span>100000 <sup>vnđ</sup></span> <span>120000 <sup>vnđ</sup></span></div>
                        </div>
                        <div class="product">
                            <a href="">
                                <img src="https://cf.shopee.vn/file/008d7e1f9a3d39ae9d6a7cc09a6c3233" width="200" height="250" alt="">
                            </a>
                            <p class="m-0">Product Name</p>
                            <div class=""><span>100000 <sup>vnđ</sup></span> <span>120000 <sup>vnđ</sup></span></div>
                        </div>
                        <div class="product">
                            <a href="">
                                <img src="https://cf.shopee.vn/file/008d7e1f9a3d39ae9d6a7cc09a6c3233" width="200" height="250" alt="">
                            </a>
                            <p class="m-0">Product Name</p>
                            <div class=""><span>100000 <sup>vnđ</sup></span> <span>120000 <sup>vnđ</sup></span></div>
                        </div>
                        <div class="product">
                            <a href="">
                                <img src="https://cf.shopee.vn/file/008d7e1f9a3d39ae9d6a7cc09a6c3233" width="200" height="250" alt="">
                            </a>
                            <p class="m-0">Product Name</p>
                            <div class=""><span>100000 <sup>vnđ</sup></span> <span>120000 <sup>vnđ</sup></span></div>
                        </div>
                        <div class="product">
                            <a href="">
                                <img src="https://cf.shopee.vn/file/008d7e1f9a3d39ae9d6a7cc09a6c3233" width="200" height="250" alt="">
                            </a>
                            <p class="m-0">Product Name</p>
                            <div class=""><span>100000 <sup>vnđ</sup></span> <span>120000 <sup>vnđ</sup></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('users.extends.JS')
</body>
</html>