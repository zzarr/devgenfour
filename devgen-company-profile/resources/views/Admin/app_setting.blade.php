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
    <form method="POST" action="{{ route('app-settings_update', $settings->id_setting) }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3 row">
                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama App</label>
                    <div class="col-lg-9 col-xl-8">
                        <input class="form-control" type="text" value="{{ $settings->name_app }}" name="name_app">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Deskripsi</label>
                    <div class="col-lg-9 col-xl-8">
                        <textarea id="summernote" class="form-control" type="text" name="desc" height="200"><p>{{ $settings->desc }}</p></textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">logo </label>
                    <div class="col-lg-9 col-xl-8">
                        <div class="input-group mb-3">
                            <input name="logo" name="logo" type="file" class="dropify" id="input-file-now-custom-1"
                                data-height="100" data-default-file="{{ asset('img/' . $settings->logo) }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nomor kontak</label>
                <div class="col-lg-9 col-xl-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="las la-phone"></i></span>
                        <input type="text" class="form-control" name="no_contact" value="{{ $settings->no_contact }}"
                            placeholder="Phone" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat Email</label>
                <div class="col-lg-9 col-xl-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="las la-at"></i></span>
                        <input type="text" class="form-control" name="email" value="{{ $settings->email }}"
                            placeholder="Email" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Link Instagram</label>
                <div class="col-lg-9 col-xl-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                        <input type="text" class="form-control" name="instagram" value="{{ $settings->instagram }}"
                            placeholder="Email" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat</label>
                <div class="col-lg-9 col-xl-8">
                    <textarea class="form-control" type="tex" name="alamat" value="">{{ $settings->alamat }}</textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Koordinat maap</label>
                <div class="col-lg-9 col-xl-8">
                    <input class="form-control" type="text" value="{{ $settings->gmaap_coordinat }}"
                        id="gmap_coordinates" name="gmaap_coordinat" placeholder="Latitude, Longitude" required>
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
