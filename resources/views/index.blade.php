@extends('layouts.front')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/carousel.css') }}">
@endsection
@section('content')

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach (App\Models\Slider::all() as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                    <img src="{{ asset($slider->image) }}" class="bd-placeholder-img" width="100%" height="100%"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">
                </div>
            @endforeach
            {{-- <div class="carousel-item">
                <img src="{{ asset('assets/images/hero-2.png') }}" class="bd-placeholder-img" width="100%" height="100%"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/hero-3.png') }}" class="bd-placeholder-img" width="100%" height="100%"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">

                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                    </div>
                </div>
            </div> --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- <div class="hero">
        <div class="owl-carousel owl-theme heroCarousel">
            @foreach (App\Models\Slider::take(3)->get() as $item)
                <div class="item">
                    <div class="hero__slide">
                        <img src="{{ asset($item->image) }}" alt="">

                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}


    <div class="container marketing">
        <div class="row gy-2 justify-content-center">
            <div class="col-md-2 col-sm-12">
                {{-- <input type="text" class="form-control rounded-pill" placeholder="Search" aria-label="Search"
                    style="margin-right: 1rem;" aria-describedby="button-addon2"> --}}
                <select name="" id="input-bg" class="form-control rounded-pill">
                    @foreach (\App\Helper::getBG() as $key => $bg)
                        <option value="{{ $key }}">
                            {{ $bg }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="col-md-4 col-sm-12">
                {{-- <input type="text" class="form-control rounded-pill" placeholder="Search" aria-label="Search"
                    style="margin-right: 1rem;" aria-describedby="button-addon2"> --}}
                <select name="" id="input-city" class="form-control rounded-pill">
                    <option value="-1">Please Select A City</option>
                    @foreach (\App\Models\City::all() as $key => $city)
                        <option value="{{ $city->id }}">
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="col-md-2 col-sm-12">
                <button class="btn btn-outline-success rounded-pill w-100" type="button" id="button-addon2"
                    style="padding-left: 1%; padding-right: 1%;" onclick="search()">Search</button>
            </div>
        </div>
        <hr>
        <div id="search-result" class="py-3">

        </div>
        {{-- <hr class="featurette-divider"> --}}

    </div>

    {{-- <div class="owl-carousel">
        <div class="bg-green"> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
    </div> --}}
@endsection
@section('script')
    {{-- <script src="{{ asset('assets/owlcarousel/jquery.min.js') }}">
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        lock = false;

        function search() {
            data = {
                bg: $('#input-bg').val(),
                city: $('#input-city').val()
            };
            axios.post('{{ route('search') }}', data)
                .then((res) => {
                    html = "";
                    res.data.forEach(user => {
                        html += "<div class='mb-3 p-4 bg-white shadow'>";
                        html += "<div class='row'>" +
                            "<div class='col-md-3 col-sm-6'>" +
                            "<label class='fw-bolder text-muted'>Name</label>" +
                            "<div>" + user.name + "</div>" +
                            "</div>" +
                            "<div class='col-md-3 col-sm-6'>" +
                            "<label class='fw-bolder text-muted'>Phone</label>" +
                            "<div>" + user.phone + "</div>" +
                            "</div>" +
                            "<div class='col-md-3 col-sm-6'>" +
                            "<label class='fw-bolder text-muted'>Address</label>" +
                            "<div>" + user.address + "</div>" +
                            "</div>" +
                            "<div class='col-md-3 col-sm-6'>" +
                            "<label class='fw-bolder text-muted'>Last Donated Date</label>" +
                            "<div>" + user.ldd + "</div>" +
                            "</div>" +
                            "</div>";
                        html += "</div>";
                        console.log('for each');
                    });
                    console.log('html=', html);
                    $('#search-result').html(html);
                })
                .catch((err) => {

                });
        }
    </script>
@endsection
