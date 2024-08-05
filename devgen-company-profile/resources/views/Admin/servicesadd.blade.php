@extends('Admin.layout.app') 

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Service</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{ route('addservices_admin') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label for="icon-input" class="col-sm-2 col-form-label text-end">Icon</label>
                        <div class="col-sm-10">
                            <input type="file" name="icon" class="dropify" id="icon-input" data-default-file="" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="title-input" class="col-sm-2 col-form-label text-end">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" id="title-input" required />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label text-end ">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="summernote" name="description" rows="10" required></textarea>
                        </div>
                    </div>
                            <button class="btn btn-success mt-2" style="margin-left: 186px">
                    Submit</button>
                <a href="{{ route('services_admin') }}" type="button" class="btn btn-outline-danger mt-2"
                    style="margin-left: 5px"><i class="ti ti-arrow-back"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('#summernote').summernote();
        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
