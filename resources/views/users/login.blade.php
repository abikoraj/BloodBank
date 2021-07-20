@extends('users.layout')
@section('title', 'Login')
@section('form')
    <div class="row form-wrap shadow">
        <div class="col-lg-6 col-md-6"
            style="background: #282828 url('{{ asset('assets/images/login.svg') }}') no-repeat center center;">
        </div>
        <div class="col-lg-6 col-md-6 bg-white">
            <div class="p-3 form-signin">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show py-1 px-2 " role="alert">
                        <small>{{ session()->get('message') }}</small>
                        <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show py-1 px-2 " role="alert">
                        <small>{{ session()->get('error') }}</small>
                        <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="text-center">
                    <img src="{{ asset('assets/images/icon.png') }}" alt="wrapkit">
                </div>
                <h2 class="mt-3 text-center">Sign In</h2>
                <p class="text-center">Enter your phone number and password to Login.</p>
                <form action="{{ route('user.login') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="form-floating mb-2 p-0">
                            <input type="tel" name="phone" class="form-control" id="floatingInput"
                                placeholder="Enter Phone Number">
                            <label for="floatingInput" class="text-muted">Phone Number</label>
                            <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-floating mb-2 p-0">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <label for="floatingPassword" class="text-muted">Password</label>
                        </div>
                        <div class="text-center p-0">
                            <button type="submit" class="w-100 btn btn-dark">Sign In</button>
                        </div>
                        <div class="col-lg-12 text-center mt-5 mb-1">
                            Don't have an account? <a href="{{ route('user.register') }}" class="text-danger">Register</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
