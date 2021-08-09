@extends('layouts.front')
{{-- @section('css')
    <style>
        .mh-edit {
            z-index: 3;
        }

        .mh-edit:hover {
            color: #198754;
            /* display: block; */

        }

        .mh-delete:hover {
            color: #DC3545;
        }

    </style>
@endsection --}}
@section('content')
    @php
    $user = Auth::user();
    @endphp
    <div class="container mt-4 ">
        <div class="main-body">
            {{-- @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show py-1 px-2 " role="alert">
                    <small>{{ session()->get('message') }}</small>
                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

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
                                    <p class="text-secondary mb-1">{{ $user->city_id != null ? $user->city->name : '' }}
                                    </p>
                                    <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Profile</a>
                                    <a href="{{ route('user.logout') }}" class="btn btn-outline-danger">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-baseline mt-4">
                        <span class="text-muted h4">Medical History</span>
                        {{-- <a class="btn btn-outline-primary btn-sm rounded-pill" href="{{ route('medical.add') }}">Add
                            New</a> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add New
                        </button>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Hospital</th>
                                        <th scope="col">Date</th>
                                        {{-- <th scope="col">#</th> --}}
                                    </tr>
                                </thead>
                                <tbody style="cursor: pointer;">
                                    @foreach ($user->history->all() as $item)
                                        <tr class="clickable"
                                            onclick="window.location='{{ route('medical.show', ['mh' => $item->id]) }}'">
                                            {{-- <a href="{{ route('medical.show', ['mh' => $item->id]) }}"> --}}
                                            <td>{{ $item->hospital }}</td>
                                            <td>{{ $item->date }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
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
                                    {{ \App\Helper::getBG()[$user->blood_group] }}
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
                    <div class="col-md-12 pt-3">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <span class="text-muted h4"> My Donation Request</span>
                            <a class="btn btn-outline-primary btn-sm rounded-pill" href="{{ route('req.add') }}">Make
                                Request</a>
                        </div>
                        {{-- <h3 class="text-muted pt-3">My Donation Requests</h3> --}}
                        <hr>
                        @foreach ($user->don_req->all() as $item)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="mb-0 h6">City</span>
                                            <span class="text-secondary"
                                                style="margin-left: 0.75rem;">{{ $item->city->name }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="mb-0 h6">Address</span>
                                            <span class="text-secondary"
                                                style="margin-left: 0.75rem;">{{ $item->address }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="mb-0 h6">Hospital</span>
                                            <span class="text-secondary"
                                                style="margin-left: 0.75rem;">{{ $item->hospital }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="mb-0 h6">Blood Group</span>
                                            <span class="text-secondary"
                                                style="margin-left: 0.75rem;">{{ \App\Helper::getBG()[$item->blood_group] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="mb-0 h6">Required Date</span>
                                            <span class="text-secondary"
                                                style="margin-left: 0.75rem;">{{ $item->required_date }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="mb-0 h6">Required Amount</span>
                                            <span class="text-secondary"
                                                style="margin-left: 0.75rem;">{{ $item->required_amount }} Pint</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex">
                                        @if ($item->isComplete != 1)
                                            <div class="flex-fill">
                                                <a href="{{ route('req.edit', ['donreq' => $item->id]) }}"
                                                    class="btn btn-primary btn-sm px-3">Edit</a>
                                                <a href="{{ route('req.delete', ['donreq' => $item->id]) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                            <div>
                                                <form action="{{ route('req.complete', ['donreq' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="checkbox" name="isComplete" value="1" hidden>
                                                    <button type="submit" class="btn btn-success btn-sm">Mark as
                                                        Complete</button>
                                                </form>
                                            </div>
                                        @else
                                            <div>
                                                <form action="{{ route('req.complete', ['donreq' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="checkbox" name="isComplete" value="1" hidden>
                                                    <button type="submit" class="btn btn-light btn-sm" disabled>Marked as
                                                        Complete <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="#0F5132" class="bi bi-check-circle-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal for adding Medical History -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Medical Histroy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('medical.submit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="hospital" class="form-label">Hospital Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="hospital"
                                placeholder="Enter Hospital Name Here" required>
                        </div>
                        <div class="mb-3 col-auto">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date"
                                placeholder="Enter Date Here" required>
                        </div>
                        <div class="mb-3 col-auto d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Medical History -->
    <div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropEditLabel">Edit Medical Histroy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('medical.submit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="hospital" class="form-label">Hospital Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="hospital"
                                placeholder="Enter Hospital Name Here" required>
                        </div>
                        <div class="mb-3 col-auto">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date"
                                placeholder="Enter Date Here" required>
                        </div>
                        <div class="mb-3 col-auto d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
