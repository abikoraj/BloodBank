<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.carousel.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.theme.default.min.css') }}"> --}}

    <title>Blood Bank</title>
    <style>
        #alert-close {
            width: 50%;
        }

        @media (max-width: 768px) {
            #alert-close {
                width: 95%;
            }
        }

    </style>
    @yield('css')
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #8a0303">
        <div class="container-fluid">
            <a class="navbar-brand " href="{{ route('home') }}">Blood Bank</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link {{ Route::is('nearme') ? 'active' : '' }}"
                            href="{{ route('nearme') }}">Requests Near Me</a>
                    </li>
                </ul>
                @php
                    $profile = Auth::user();
                @endphp
                <form class="d-flex">
                    <a class="navbar-brand" href="{{ route('user.profile') }}">
                        @if ($profile->image == null)
                            <img src="{{ asset('assets/images/profile_dummy.png') }}" alt="" width="30" height="30"
                                class="d-inline-block align-text-top rounded-circle">
                        @else
                            <img src="{{ asset($profile->image) }}" alt="" width="30" height="30"
                                class="d-inline-block align-text-top rounded-circle">
                        @endif
                        {{ $profile->name }}
                    </a>
                </form>
            </div>
        </div>
    </nav>
    @if (session()->has('message'))
        <div class="position-fixed fixed-bottom  alert alert-success alert-dismissible fade show my-2 mx-auto py-2 text-center"
            role="alert" id="alert-close">
            {{ session()->get('message') }}
        </div>
    @endif
    @yield('content')

    <script>
        function triggerClick() {
            document.querySelector('#profilepic').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

    {{-- <script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    {{-- <script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/owlcarousel/jquery.min.js') }}">
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.navbar-nav a.navbar-link').on('click', function() {
                var navbarToggle = $('.navbar-toggle');
                if (navbarToggle.is(':visible')) {
                    navbarToggle.trigger('click');
                }
            });
        });
    </script>

    {{-- Script for Closing Alert Automatically --}}
    <script>
        setTimeout(function() {
            // Closing the alert
            $('#alert-close').alert('close');
        }, 2000);
    </script>
    @yield('script')
</body>

</html>
