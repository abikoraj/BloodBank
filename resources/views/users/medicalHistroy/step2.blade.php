@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">Add Medical History Report</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Report Title:</label>
                                <input type="text" class="form-control" id="taskTitle" name="name">
                            </div>
                            {{-- <div class="form-group">
                                <label for="description">Checkup Date:</label>
                                <input type="text" class="form-control" id="productAmount" name="amount" />
                            </div> --}}
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
