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
                <form method="POST" action="">
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
                        <label for="telephone" class="col-sm-2 col-form-label text-end ">thumnail</label>
                        <div class="col-sm-10">
                            <input name="images" type="file" class="dropify" data-height="100" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label text-end ">Project image</label>
                        <div class="col-sm-10">
                            <input name="images" type="file" class="dropify" data-height="100" multiple />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="number" class="col-sm-2 col-form-label text-end ">Number</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="number" id="number" required />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // set editor height
                width: 500,
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true // set focus to editable area after initializing summernote
            });

            $('.dropify').dropify();
        });
    </script>
@endpush
