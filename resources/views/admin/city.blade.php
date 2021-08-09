@extends('admin.layout')
@php
$city_count = App\Models\City::count();
@endphp
@section('content')

    <h2>Cities</h2>
    <hr>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            <small>{{ session()->get('message') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h5 class="text-muted">Add New City</h5>
    <form action="{{ route('cities.submit') }}" method="post">
        @csrf
        <div class="row gy-2">
            <div class="col-md-10 col-sm-12">
                <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter City Name Here"
                    required>
            </div>
            <div class="col-md-2 col-sm-12">
                <button type="submit" class="btn btn-outline-success rounded-pill px-md-5 px-sm-2 w-100">Add</button>
            </div>
        </div>
    </form>

    <hr class="mt-4">
    <h5 class="text-muted d-inline">Cities List </h5><small class="text-muted ">({{ $city_count }} entries)</small>

    <div>
        <table class="table" id="example">
            <tr>
                <th>
                    #id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Action
                </th>
                <th>

                </th>
            </tr>
            @foreach (App\Models\City::all() as $city)
                <tr>
                    <form action="{{ route('cities.update', ['city' => $city->id]) }}" method="POST">

                        @csrf
                        <td>
                            {{ $city->id }}
                        </td>
                        <td>
                            <input type="text" class="form-control" name="name" placeholder="Name" required
                                value="{{ $city->name }}">

                        </td>
                        {{-- <td>
                        <input type="number" min="0" class="form-control" name="rate" placeholder="Rate" required
                            value="{{ $city->rate }}">

                    </td> --}}
                        <td>
                            <input type="submit" class=" btn btn-primary" value="Update">
                            <a href="{{ route('cities.delete', ['city' => $city->id]) }}" class="btn btn-danger">
                                Delete</a>
                            {{-- <a class="d-inline-block" href="{{ route('payment.plan', ['course' => $city->id]) }}"
                                class="btn btn-success"> Payment Plan</a> --}}
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>

    {{-- <table id="example" class="stripe hover compact" style="width:100%">
        <thead>
            <tr>
                <th>Hospital</th>
                <th>City</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>Required Date</th>
                <th>Amount</th>
                <th>User</th>
                <th>Complete</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table> --}}
@endsection

{{-- @section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection --}}
