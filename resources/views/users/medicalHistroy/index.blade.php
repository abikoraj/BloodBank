@extends('layouts.front')
@section('css')
    <style>
        .add-image {
            width: 12rem;
            height: 12rem;
            overflow: hidden;
            cursor: pointer;
        }

        .add-image:hover {
            border: 1px solid #0D6EFD;

        }

        .add-image:hover>svg {
            transition: 0.2s;
            height: 50px;
            width: 50px;
            color: #0D6EFD;
        }

        .img-del {
            position: absolute;
            right: 5px;
            top: 5px;
        }

        .delete {
            display: none;
        }

        .img-box:hover .delete {
            display: block
        }

        @media (max-width: 768px) {
            .delete {
                display: block;
            }
        }

        @media (max-width: 471px) {
            .add-image {
                width: 10rem;
                height: 10rem;
            }
        }

        @media (max-width: 407px) {
            .add-image {
                width: 8rem;
                height: 8rem;
            }
        }

        @media (max-width: 343px) {
            .add-image {
                width: 6.5rem;
                height: 6.5rem;
            }
        }

    </style>
@endsection
@section('content')

    <div class="container justify-content-center align-items-center p-4 mt-4">

        <h2 class="text-muted">Medical History</h2>
        <hr>
        <div class="d-flex justify-content-between fs-5">
            <span>
                <strong class="text-muted">Hospital: </strong> {{ $mhs->hospital }}
            </span>
            <span>
                <strong class="text-muted">Date: </strong> {{ $mhs->date }}
            </span>
            <span>
                <span class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit">
                    <i class="bi bi-pencil-fill"></i>
                </span>
                <a href="{{ route('medical.delete', ['mh' => $mhs->id]) }}" class="btn btn-outline-danger">
                    <i class="bi bi-trash-fill"></i>
                </a>
            </span>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-baseline">
            <span class="text-muted h4"> Medical History Reports</span>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal"
                data-bs-target="#staticBackdropReport" style="padding-left: 2%; padding-right:2%;">
                Add New Report
            </button>
        </div>

        @foreach ($mhs->reports->all() as $report)

            <div class="container bg-white p-3 my-3 rounded">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="text-muted h6">{{ $report->title }}</div>
                    <span>
                        <span class="btn btn-outline-success btn-sm"
                            onclick="editReport('{{ $report->title }}',{{ $report->id }})">
                            <i class="bi bi-pencil-fill"></i>
                        </span>
                        <a href="{{ route('medical.report.delete', ['report' => $report->id]) }}"
                            class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </span>
                </div>
                <hr>
                <div class="row">
                    @foreach ($report->mr_image->all() as $items)
                        <div class="card bg-light shadow add-image m-2 p-0 img-box">
                            <a href="{{ asset($items->rep_image) }}" target="_blank">
                                <img src="{{ asset($items->rep_image) }}" alt="Report Image" class="w-100 h-100">
                            </a>
                            <div class="img-del">
                                <a href="{{ route('medical.image.delete', ['image' => $items->id]) }}"
                                    class="btn btn-outline-danger rounded-circle delete">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </div>

                        </div>
                    @endforeach
                    <div class="card shadow bg-light justify-content-center align-items-center add-image clickable m-2"
                        onclick="showUpload({{ $report->id }})">
                        {{-- data-bs-toggle="modal" data-bs-target="#staticBackdropImage" --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!-- Modal for adding Medical History Report -->
    <div class="modal fade" id="staticBackdropReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropReportLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropReportLabel">Add New Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('medical.report.submit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="name" class="form-label">Report Name</label>
                            <input type="number" name="medical_history_id" value="{{ $mhs->id }}" hidden>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                                placeholder="Enter Report Name Here" required>
                        </div>
                        {{-- <div class="mb-3 col-auto">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date"
                                placeholder="Enter Date Here" required>
                        </div> --}}
                        <div class="mb-3 col-auto d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for adding Medical History Report Images -->
    <div class="modal fade" id="staticBackdropImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropImageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropImageLabel">Add Report Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('medical.image.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="name" class="form-label">Upload Report Image</label>
                            <input type="number" name="medical_history_repo_id" id="medical_history_repo_id" value=""
                                hidden>
                            <input type="file" class="form-control" id="exampleFormControlInput1" name="rep_image"
                                placeholder="Enter Report Name Here" required>
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
                <form action="{{ route('medical.update', ['mh' => $mhs->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="hospital" class="form-label">Hospital Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="hospital"
                                placeholder="Enter Hospital Name Here" value="{{ $mhs->hospital }}" required>
                        </div>
                        <div class="mb-3 col-auto">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date"
                                placeholder="Enter Date Here" value="{{ $mhs->date }}" required>
                        </div>
                        <div class="mb-3 col-auto d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Medical History Report -->
    <div class="modal fade" id="staticBackdropReportEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropReportEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropReportEditLabel">Edit Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('medical.report.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="name" class="form-label">Report Name</label>
                            <input type="text" name="id" required id="e_report_id">
                            <input type="text" class="form-control" name="title" placeholder="Enter Report Name Here"
                                required id="e_report_title">
                        </div>
                        <div class="mb-3 col-auto d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('script')
    <script>
        function showUpload(report_id) {
            $('#medical_history_repo_id').val(report_id);
            $('#staticBackdropImage').modal('show');
        }

        function editReport(name, id) {
            $('#e_report_id').val(id);
            $('#e_report_title').val(name);
            $('#staticBackdropReportEdit').modal('show');

        }
    </script>
@endsection
