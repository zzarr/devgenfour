@extends('Admin.layout.app') @section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dasboard</a></li>
                        <li class="breadcrumb-item ">Team</li>
                        <li class="breadcrumb-item active">Edit Team</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Team</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{ route('updateteam_admin', $team->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="example-text-input"
                                value="{{ $team->name }}" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-sm-2 col-form-label text-end">Jabatan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jabatan" id="example-text-input"
                                value="{{ $team->jabatan }}" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-tel-input" class="col-sm-2 col-form-label text-end">Foto</label>
                        <div class="col-sm-10">
                            <input class=" dropify" type="file" name="foto" id="example-tel-input"
                                data-default-file="{{ asset('team/' . $team->foto) }}" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_contact" class="col-sm-2 col-form-label text-end">Facebook</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-brand-facebook"></i></span>
                                <input type="text" class="form-control" name="facebook" id="no_contact"
                                    value="{{ $team->facebook }}" placeholder="Facebook" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label text-end">Linkedin</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-brand-linkedin"></i></span>
                                <input type="text" class="form-control" name="linkedin" id="email"
                                    value="{{ $team->linkedin }}" placeholder="Linkedin" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="instagram" class="col-sm-2 col-form-label text-end">Instagram</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                                <input type="text" class="form-control" name="instagram" id="instagram"
                                    value="{{ $team->instagram }}" placeholder="Instagram" />
                            </div>
                            <button class="btn btn-success mt-4" style="margin-left: 0px">
                    Submit</button>
                <a href="{{ route('team_admin') }}" type="button" class="btn btn-outline-danger mt-4"
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
            $('#summernote').summernote();
            $('.dropify').dropify();
        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
