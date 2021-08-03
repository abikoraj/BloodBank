@extends('admin.layout')
@section('content')

    <h2>Donation Requests</h2>
    <hr>
    @php
    $donreq = \App\Models\DonationRequest::all();
    @endphp

    <table id="example" class="stripe hover compact" style="width:100%">
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
            @foreach ($donreq as $req)

                <tr>
                    <td>{{ $req->hospital }}</td>
                    <td>{{ $req->city_id != null ? $req->city->name : '' }}</td>
                    <td>{{ $req->blood_group }}</td>
                    <td>{{ $req->address }}</td>
                    <td>{{ $req->required_date }}</td>
                    {{-- <td>{{ \App\Helper::getBG()[$req->blood_group] }}</td> --}}
                    <td>{{ $req->required_amount }} Pint</td>
                    <td>{{ $req->user->name }}</td>
                    <td>{{ $req->isComplete }}
                        @if ($req->isComplete == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0F5132"
                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        @endif
                    </td>

                </tr>
            @endforeach

        </tbody>
        {{-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> --}}
    </table>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
