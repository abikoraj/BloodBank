@extends('layouts.front')
@section('content')

    <div class="d-flex justify-content-center align-items-center mt-md-4 mt-sm-0">

        <div class="bg-white px-5 py-3" style="max-width: 800px;">
            <div class="text-center pb-3 pt-2">
                <h2>Donation Request</h2>
                <hr class="my-4">
            </div>
            <form action="{{ route('req.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="city_id" class="form-label">City</label>
                        <select class="form-select" id="country" name="city_id" required>
                            <option value="">Choose...</option>
                            @foreach (App\Models\City::all() as $ct)
                                <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select City.
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"
                            required>
                        <div class="invalid-feedback">
                            Please enter Address.
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="hospital" class="form-label">Hospital</label>
                        <input type="hospital" class="form-control" name="hospital" id="hospital"
                            placeholder="Enter Hospital Name" required>
                        <div class="invalid-feedback">
                            Please enter a Hospital name.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row gy-3">

                    <div class="col-md-4">
                        <label for="country" class="form-label">Blood Group</label>
                        <select class="form-select" id="country" name="blood_group" required>
                            <option value="">Choose...</option>
                            @foreach (\App\Helper::getBG() as $key => $bg)
                                <option value="{{ $key }}">
                                    {{ $bg }}</option>

                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Blood Group.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="required_date" class="form-label">Required Date</label>
                        <input type="date" class="form-control" name="required_date" id="required_date"
                            placeholder="Required Date" required>
                        <div class="invalid-feedback">
                            Please enter Blood Required Date.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="required_amount" class="form-label">Required Amount
                            <small class="text-muted">(In Pint)</small>
                        </label>
                        <input type="number" min="1" step="1" class="form-control" name="required_amount"
                            id="required_amount" placeholder="Required Amount" required>
                        <div class="invalid-feedback">
                            Please enter Required Amount.
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Make Request</button>
            </form>
        </div>
    </div>

@endsection
