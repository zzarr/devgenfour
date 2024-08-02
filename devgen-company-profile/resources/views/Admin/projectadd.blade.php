@extends('Admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Project</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Project</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="col-lg-12">
            <div class="card-body">
                <form method="POST" action="{{ route('storeproject_admin') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label text-end ">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" id="title" required />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label text-end ">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="summernote" name="description" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telephone" class="col-sm-2 col-form-label text-end ">thumbnail</label>
                        <div class="col-sm-10">
                            <input name="thumbnail" type="file" class="dropify" data-height="100" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label text-end ">Project image</label>
                        <div class="col-sm-10">
                            <input name="images[]" type="file" class="dropify" data-height="100" multiple />
                        </div>
                        
                    </div>
                    <button class="btn btn-success mt-4" style="margin-left: 186px">
                    Submit</button>
                <a href="{{ route('project_admin') }}" type="button" class="btn btn-outline-danger mt-4"
                    style="margin-left: 5px"><i class="ti ti-arrow-back"></i> Cancel</a>
            
                </form>
            </div>
        </div>
    </div>
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
