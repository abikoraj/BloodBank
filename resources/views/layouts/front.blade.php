<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Blood Bank</title>
    @yield('css')
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #8a0303">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blood Bank</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
</body>

</html>
