@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Services</li>
                        <li class="breadcrumb-item active">Edit Services</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Services</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateservices_admin', $service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" class="dropify" id="icon" name="icon"
                                data-id="{{ $service->id }}" data-type="icon"
                                data-default-file="{{ asset('' . $service->icon) }}" />
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="dropify" id="gambar" name="gambar"
                                data-id="{{ $service->id }}" data-type="image"
                                data-default-file="{{ asset('' . $service->image) }}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $service->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Singkat</label>
                            <textarea type="text" class="form-control" id="summernote" name="description" rows="10" required>
                            {{ $service->description }}
                        </textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_description">Deskripsi</label>
                            <textarea type="text" class="form-control" id="summernote2" name="long_description" rows="10" required>
                            {{ $service->long_description }}
                        </textarea>
                        </div>


                        <button class="btn btn-success mt-4" style="margin-left: 0px">
                            Submit</button>
                        <a href="{{ route('services_admin') }}" type="button" class="btn btn-outline-danger mt-4"
                            style="margin-left: 5px"><i class="ti ti-arrow-back"></i> Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('#summernote').summernote();
            $('#summernote2').summernote();



            $(document).ready(function() {
                $('.dropify').on('dropify.afterClear', function(event, element) {
                    var id = $(this).data('id');
                    var type = $(this).data('type');
                    var url = '{{ route('deleteServiceImage') }}';

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            type: type
                        },
                        success: function(response) {
                            console.log('Image deleted successfully');
                        },
                        error: function(xhr) {
                            console.log('Error deleting image');
                        }
                    });
                });
            });
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
    <link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush
