<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <title>Blood Bank || @yield('title')</title>

    <style>
        .form-wrap {
            max-width: 800px;
            color: #7c8798;
        }

    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-pic"
        style="background:url('{{ asset('assets/images/auth-bg.jpg') }}') no-repeat center center;">
        @yield('form')
    </div>


    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
