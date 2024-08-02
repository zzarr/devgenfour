@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
        <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Choose</li>
                    </ol>
                </div>
            <h4 class="page-title">Add Choose</h4>
        </div>
    </div>
        <form method="POST" action="{{ route('addchoose_admin') }}" enctype="multipart/form-data">
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
                        <label for="title-input" class="col-sm-2 col-form-label text-end">Description</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="description" id="title-input" required />
                            <button class="btn btn-success mt-4" style="margin-left: 0px">
                            Submit</button>
                <a href="{{ route('choose_admin') }}" type="button" class="btn btn-outline-danger mt-4"
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
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
