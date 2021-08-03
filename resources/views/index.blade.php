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
            <div class="carousel-item active">
                {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg> --}}
                <img src="{{ asset('assets/images/hero-1.png') }}" class="bd-placeholder-img" width="100%" height="100%"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                        {{-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> --}}
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/hero-2.png') }}" class="bd-placeholder-img" width="100%" height="100%"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        {{-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> --}}
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
                        {{-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> --}}
                    </div>
                </div>
            </div>
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
    <div class="container marketing">

        {{-- <div class="input-group ">
            <input type="text" class="form-control rounded-pill" placeholder="Search" aria-label="Search"
                style="margin-right: 1rem;" aria-describedby="button-addon2">
            <button class="btn btn-outline-success rounded-pill px-md-5 px-sm-2" type="button"
                id="button-addon2">Search</button>
        </div>
        <br> --}}
        <div class="row gy-2">
            <div class="col-md-10 col-sm-12">
                <input type="text" class="form-control rounded-pill" placeholder="Search" aria-label="Search"
                    style="margin-right: 1rem;" aria-describedby="button-addon2">
            </div>
            <div class="col-md-2 col-sm-12">
                <button class="btn btn-outline-success rounded-pill px-md-5 px-sm-2 w-100" type="button"
                    id="button-addon2">Search</button>
            </div>
        </div>
        <hr>
        {{-- <hr class="featurette-divider"> --}}

    </div>
@endsection
