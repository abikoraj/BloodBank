@extends('layouts.front')
@section('content')

    @php
    $profile = Auth::user();
    @endphp

    <div class="row mt-md-4 mt-sm-0">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="bg-white px-5 py-3" style="max-width: 800px;">
                <div class="text-center pb-3 pt-2">
                    <h2>Edit Profile</h2>
                    <hr class="my-4">
                </div>

                {{-- <div class="col-md-7 col-lg-8"> --}}
                <form action="{{ route('user.update', ['user' => $profile->id]) }}" method="POST" class="needs-validation"
                    novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4" style="max-width: 300px">
                            @if ($profile->image == null)
                                <img src="{{ asset('assets/images/profile_dummy.png') }}" id="profileDisplay"
                                    onclick="triggerClick()" style="width: 100%; cursor: pointer;">
                            @else
                                <img src="{{ asset($profile->image) }}" id="profileDisplay" onclick="triggerClick()"
                                    style="width: 100%; cursor: pointer;">
                            @endif
                            <input type="file" name="image" onchange="displayImage(this)" id="profilepic"
                                style="display: none;">
                            <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-lg-8">
                            <div class="col-12 mb-2">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"
                                    value="{{ $profile->name }}" required>
                                <div class="invalid-feedback">
                                    Valid Full Name is required.
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $profile->email }}" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="ispublic" value="1"
                                    {{ $profile->ispublic == 1 ? 'checked' : '' }} id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="save-info">Make Profile Public</label>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row gy-3">

                        <div class="col-lg-6">
                            <label for="country" class="form-label">Blood Group</label>
                            <select class="form-select" id="country" name="blood_group" required>
                                <option value="">Choose...</option>
                                {{-- <option value="1">A+</option>
                                <option value="2">A-</option>
                                <option value="3">B+</option>
                                <option value="4">B-</option>
                                <option value="5">O+</option>
                                <option value="6">O-</option>
                                <option value="7">AB+</option>
                                <option value="8">AB-</option> --}}
                                @foreach (\App\Helper::getBG() as $key => $bg)
                                    <option value="{{ $key }}"
                                        {{ $key == $profile->blood_group ? 'selected' : '' }}>
                                        {{ $bg }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Blood Group.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="cc-number" class="form-label">Last Donated Date
                                <small class="text-muted">(Leave blank if not donated yet.)</small></label>
                            <input type="date" class="form-control" name="ldd" id="cc-number" value="{{ $profile->ldd }}"
                                placeholder="Last Donated Date">
                            <div class="invalid-feedback">
                                Last Donated Date is required.
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- <h4 class="mb-3">Payment</h4> --}}

                    <div class="row gy-3">
                        <div class="col-lg-5">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" name="city_id" id="city" required>
                                <option value="">Choose...</option>
                                @foreach (App\Models\City::all() as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $profile->city_id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid City.
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ $profile->address }}" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your address.
                            </div>
                        </div>


                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Update Your Profile</button>
                </form>
            </div>
        </div>
    </div>

@endsection
