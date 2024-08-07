@extends('Admin.layout.app') @section('content')
    <!-- Page-Title -->
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Partner</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Partner</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end page title end breadcrumb -->

    <div class="card">
        <div class="col-lg-12">
            <div class="card-body">
                <form method="POST" action="{{ route('storepartner_admin') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-end ">Logo</label>
                        <div class="col-sm-10">
                            <input name="image" type="file" class="dropify" data-height="100" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-end ">Nama</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" data-height="100" />
                            <button class="btn btn-success mt-4" style="margin-left: 0px">
                    Submit</button>
                <a href="{{ route('partner_admin') }}" type="button" class="btn btn-outline-danger mt-4"
                    style="margin-left: 5px"><i class="ti ti-arrow-back"></i> Cancel</a>
            
                        </div>
                        
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            $('.dropify').dropify();
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
