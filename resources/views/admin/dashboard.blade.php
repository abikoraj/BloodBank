@extends('admin.layout')
@php
$user_count = App\Models\User::where('role', 2)->count();
$req_count = App\Models\DonationRequest::count();
$city_count = App\Models\City::count();
@endphp
@section('content')
    <div class="container">
        <h2>Dashboard</h2>
        <hr>
        <div class="row">

            <div class="col-md-auto shadow bg-white justify-content-center m-3 p-4 rounded-3">
                <div class="row">
                    <div class="w-auto text-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                    </div>
                    <div class="w-auto text-center">
                        <span class="h1 text-info">Users</span>
                        <br>
                        <span class="text-muted fs-3">{{ $user_count }}</span>

                    </div>
                </div>

            </div>

            <div class="col-md-auto shadow bg-white justify-content-center m-3 p-4 rounded-3">
                <div class="row">
                    <div class="w-auto text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </div>
                    <div class="w-auto text-center">
                        <span class="h1 text-warning">Requests</span>
                        <br>
                        <span class="text-muted fs-3">{{ $req_count }}</span>

                    </div>
                </div>

            </div>

            <div class="col-md-auto shadow bg-white justify-content-center m-3 p-4 rounded-3">
                <div class="row">
                    <div class="w-auto text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                            <path
                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                        </svg>
                    </div>
                    <div class="w-auto text-center">
                        <span class="h1 text-success">Cities</span>
                        <br>
                        <span class="text-muted fs-3">{{ $city_count }}</span>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
