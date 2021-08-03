@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('medical.submit') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">Add Medical History</div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title">Hospital Name:</label>
                                <input type="text" class="form-control" id="taskTitle" name="hospital">
                            </div>
                            <div class="form-group">
                                <label for="description">Checkup Date:</label>
                                <input type="date" class="form-control" id="productAmount" name="date" />
                            </div>
                        </div>
                        <div class="card-footer text-right d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
