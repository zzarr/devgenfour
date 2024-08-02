@extends('Admin.layout.app') @section('content')
    <!-- Page-Title -->
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dasboard</a></li>
                        <li class="breadcrumb-item active">Team</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Team</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{ route('storeteam_admin') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label text-end">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label text-end">Jabatan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jabatan" id="jabatan" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label text-end">Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control dropify" type="file" name="foto" id="foto" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_contact" class="col-sm-2 col-form-label text-end">Facebook</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-brand-facebook"></i></span>
                                <input type="text" class="form-control" name="facebook" id="no_contact"
                                    placeholder="Facebook" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label text-end">Linkedin</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-brand-linkedin"></i></span>
                                <input type="text" class="form-control" name="linkedin" id="email"
                                    placeholder="Linkedin" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="instagram" class="col-sm-2 col-form-label text-end">Instagram</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                                <input type="text" class="form-control" name="instagram" id="instagram"
                                    placeholder="Instagram" />
                            </div>
                            <button class="btn btn-success mt-4" type="submit"></i>Submit</button>
                        <a href="{{ route('team_admin') }}" class="btn btn-outline-danger mt-4"><i class="ti ti-arrow-back"></i>
                            Cancel</a>
                        </div>
                        
                    </div>
                    
                    <div class="text-end mt-4">

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
