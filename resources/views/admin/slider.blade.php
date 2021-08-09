@extends('admin.layout')
@section('content')
    <h2>Sliders</h2>
    <hr>
    <h5 class="text-muted">Add New Slider Image</h5>
    <form action="{{ route('sliders.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row gy-2">
            <div class="col-md-10 col-sm-12">
                <input type="file" name="image" class="form-control rounded-pill" placeholder="Enter City Name Here"
                    required>
            </div>
            <div class="col-md-2 col-sm-12">
                <button type="submit" class="btn btn-outline-success rounded-pill w-100"
                    style="padding-right: 5%; padding-left: 5%;">Upload</button>
            </div>
        </div>
    </form>
    <hr class="mt-4">
    <h5 class="text-muted">Sliders List</h5>
    @foreach (App\Models\Slider::all() as $slider)

        <div class="card shadow mx-3 my-5">
            {{-- <form class="form-group" action="{{ route('sliders.update', ['slider' => $slider->id]) }}" method="POST"
                enctype="multipart/form-data"> --}}
            {{-- @csrf --}}
            <div>
                <img src="{{ asset($slider->image) }}" class="profileDisplay" onclick="triggerClick()"
                    style="width: 100%; cursor: pointer;">
                <input type="file" name="image" onchange="displayImage(this)" id="profilepic" style="display: none;">
                <span class="text-danger">@error('image'){{ $message }} @enderror</span>
            </div>
            <div class="d-flex justify-content-between m-2 px-2">
                <button type="submit" class="btn btn-primary"
                    onclick="editReport('{{ $slider->image }}',{{ $slider->id }})">Update</button>
                <a href="{{ route('sliders.delete', ['slider' => $slider->id]) }}" class="btn btn-danger">Delete</a>
            </div>
            {{-- </form> --}}
        </div>

    @endforeach

    <!-- Modal for Editing Slider Images -->
    <div class="modal fade" id="SliderEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="SliderEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SliderEditLabel">Add Report Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sliders.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <input type="hidden" name="id" required id="e_slider_id">
                            <label for="name" class="form-label">Upload Report Image</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" name="image"
                                placeholder="Enter Report Name Here" required id="e_slider_image">
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

@section('js')
    <script>
        function editReport(image, id) {
            $('#e_slider_id').val(id);
            $('#e_slider_image').val(image);
            $('#SliderEdit').modal('show');
        }
    </script>
@endsection
