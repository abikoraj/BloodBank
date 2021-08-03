<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/datatables.min.css" />

    <title>Blood Bank</title>
</head>

<body style="background: #DDDDDD">

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                @include('admin.sidebar')
            </div>
            <div class="col py-3 px-5">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    {{-- <script>
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
    </script> --}}
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>

    <!-- datatable-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.navbar-nav a.navbar-link').on('click', function() {
                var navbarToggle = $('.navbar-toggle');
                if (navbarToggle.is(':visible')) {
                    navbarToggle.trigger('click');
                }
            });
        });
    </script> --}}
    @yield('js')
</body>

</html>
