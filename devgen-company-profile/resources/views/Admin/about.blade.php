@extends('admin.layout.app')
@section('content')
    <!-- Page-Title -->
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">App setting</li>
                    </ol>
                </div>
                <h4 class="page-title">App setiing</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end page title end breadcrumb -->
    <form method="POST" action="{{ route('about_update', $about->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3 row">
                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Judul</label>
                    <div class="col-lg-9 col-xl-8">
                        <input class="form-control" type="text" value="{{ $about->title }}" name="title">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Deskripsi</label>
                    <div class="col-lg-9 col-xl-8">
                        <textarea id="summernote" class="form-control" type="text" name="description" height="200"><p>{{ $about->description }}</p></textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Gambar </label>
                    <div class="col-lg-9 col-xl-8">
                        <div class="input-group mb-3">
                            <input name="gambar" name="logo" type="file" class="dropify" id="input-file-now-custom-1"
                                data-height="100" data-default-file="{{ asset($about->image) }}" />
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group mb-3 row">
                <div class="col-lg-9 col-xl-8 offset-lg-3">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <button type="button" class="btn btn-outline-danger">Cancel</button>
                </div>
            </div>
        </div>

    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('.dropify').dropify();
        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
