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
            @yield('content')
        </div>
        @include('users.home.shop_image')
        @include('users.layouts.footer')
    </div>
    @include('users.extends.JS')
</body>
</html>