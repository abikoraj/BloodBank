<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebars.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/datatables.min.css" />

    <title>Blood Bank</title>
    @yield('css')
    <style>
        #alert-close {
            width: 50%;
        }

        @media (max-width: 774px) {
            #alert-close {
                width: 95%;
            }
        }

    </style>
</head>

<body>

    <div class="sidebar bg-dark">
        <ul class="list-unstyled">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="text-white">
                    <i class="bi bi-droplet-fill text-danger fs-4"></i> <span class="ms-1 side-name ">Blood Bank</span>
                </a>
            </li>
            <hr class="text-white side-hr">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link text-white {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> <span class="ms-1 side-name ">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}"
                    class="nav-link text-white {{ Route::is('admin.users') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> <span class="ms-1 side-name ">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.requests') }}"
                    class="nav-link text-white {{ Route::is('admin.requests') ? 'active' : '' }}">
                    <i class="bi bi-clipboard-plus"></i> <span class="ms-1 side-name ">Requests</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cities') }}"
                    class="nav-link text-white {{ Route::is('cities') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> <span class="ms-1 side-name ">Cities</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sliders.index') }}"
                    class="nav-link text-white {{ Route::is('sliders.index') ? 'active' : '' }}">
                    <i class="bi bi-collection"></i> <span class="ms-1 side-name ">Sliders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.logout') }}" class="nav-link text-white">
                    <i class="bi bi-power"></i> <span class="ms-1 side-name ">Logout</span>
                </a>
            </li>
        </ul>

    </div>

    <div class="content bg-light">
        @yield('content')
    </div>

    @if (session()->has('message'))
        <div class="position-fixed fixed-bottom  alert alert-success alert-dismissible fade show my-2 mx-auto py-2 text-center"
            role="alert" id="alert-close">
            {{ session()->get('message') }}
        </div>
    @endif

    {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/js/form-validation.js') }}"></script>

    <!-- datatable-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>

    {{-- Script for Closing Alert Automatically --}}
    <script>
        setTimeout(function() {
            // Closing the alert
            $('#alert-close').alert('close');
        }, 2000);
    </script>

    @yield('js')
</body>

</html>
