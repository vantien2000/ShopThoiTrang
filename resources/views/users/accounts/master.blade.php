<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('users/css/accounts/main.css') }}">
</head>
<body>
    <div class="main-container">
        @yield('content')
    </div>
    <script src="{{ asset('admins/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('admins/js/plugins-init/jquery-validate.js') }}"></script>
    <script src="{{ asset('users/js/validation_form.js') }}"></script>
</body>
</html>