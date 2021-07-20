@extends('users.layout')
@section('title', 'Register')
@section('form')
    <div class="row form-wrap shadow">
        <div class="col-lg-6 col-md-6"
            style="background: #282828 url('{{ asset('assets/images/register.svg') }}') no-repeat center center;">
        </div>
        <div class="col-lg-6 col-md-6 bg-white">
            <div class="p-3 form-signin">
                <div class="text-center">
                    <img src="{{ asset('assets/images/icon.png') }}" alt="wrapkit">
                </div>
                <h2 class="mt-3 text-center">Register</h2>
                <form class="mt-4" method="POST" action="{{ route('user.register') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="form-floating mb-2 p-0">
                            <input type="text" class="form-control" name="name" id="floatingInput"
                                value="{{ old('name') }}" placeholder="Enter Full Name" required>
                            <label for="floatingInput" class="text-muted">Full Name</label>
                        </div>
                        <div class="form-floating mb-2 p-0">
                            <input type="tel" class="form-control" name="phone" id="floatingInput"
                                value="{{ old('phone') }}" placeholder="Enter Phone Number" required>
                            <label for="floatingInput" class="text-muted">Phone Number</label>
                        </div>
                        <div class="form-floating mb-2 p-0">
                            <input type="password" class="form-control" name="password" id="floatingInput"
                                placeholder="Password" required>
                            <label for="floatingPassword" class="text-muted">Password</label>
                        </div>
                        <div class="text-center p-0">
                            <button type="submit" class="w-100 btn btn-dark">Register</button>
                        </div>
                        <div class="col-lg-12 text-center mt-5 mb-1">
                            Already have an account? <a href="{{ route('user.login') }}" class="text-danger">Sign In</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
