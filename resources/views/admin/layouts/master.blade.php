<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Fashion</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admins/images/favicon.png') }}">

    @include('admin.extends.CSS')
</head>

<body>
    @include('admin.layouts.modal')
    <div id="main-wrapper">
        @include('admin.layouts.nav_header')
        @include('admin.layouts.header')
        @include('admin.layouts.navbar')
        @yield('content')
        @include('admin.layouts.footer')
    </div>
    @include('admin.extends.JS')
</body>
</html>