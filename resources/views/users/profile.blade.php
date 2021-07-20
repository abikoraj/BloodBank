@extends('layouts.front')
@section('content')
    @php
    $user = Auth::user();
    @endphp
    <div class="container">
        <div class="main-body">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show py-1 px-2 " role="alert">
                    <small>{{ session()->get('message') }}</small>
                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if ($user->image == null)
                                    <img src="{{ asset('assets/images/profile_dummy.png') }}" alt="User"
                                        class="rounded-circle" width="150">
                                @else
                                    <img src="{{ asset($user->image) }}" alt="User" class="rounded-circle" width="150">
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                    <p class="text-secondary mb-1">{{ $user->city_id }}</p>
                                    <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Profile</a>
                                    <a href="{{ route('user.logout') }}" class="btn btn-outline-danger">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quas laboriosam culpa
                            optio illum aperiam deserunt unde laudantium tempora vitae. Cupiditate ipsam provident
                            minima reprehenderit veritatis ratione reiciendis, facere blanditiis. Lorem ipsum dolor
                            sit amet, consectetur adipisicing elit. Sed quas laboriosam culpa optio illum aperiam
                            deserunt unde laudantium tempora vitae. Cupiditate ipsam provident minima reprehenderit
                            veritatis ratione reiciendis, facere blanditiis.
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->phone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->address }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Blood Group</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->blood_group }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Donated On</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->ldd }}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quas laboriosam culpa
                                optio illum aperiam deserunt unde laudantium tempora vitae. Cupiditate ipsam provident
                                minima reprehenderit veritatis ratione reiciendis, facere blanditiis. Lorem ipsum dolor
                                sit amet, consectetur adipisicing elit. Sed quas laboriosam culpa optio illum aperiam
                                deserunt unde laudantium tempora vitae. Cupiditate ipsam provident minima reprehenderit
                                veritatis ratione reiciendis, facere blanditiis.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quas laboriosam culpa
                                optio illum aperiam deserunt unde laudantium tempora vitae. Cupiditate ipsam provident
                                minima reprehenderit veritatis ratione reiciendis, facere blanditiis. Lorem ipsum dolor
                                sit amet, consectetur adipisicing elit. Sed quas laboriosam culpa optio illum aperiam
                                deserunt unde laudantium tempora vitae. Cupiditate ipsam provident minima reprehenderit
                                veritatis ratione reiciendis, facere blanditiis.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
