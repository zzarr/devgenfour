@extends('Admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dasboard</a></li>
                        <li class="breadcrumb-item ">Project</li>
                        <li class="breadcrumb-item active">Edit Project</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Project</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="col-lg-12">
            <div class="card-body">
                <form method="POST" action="{{ route('updateproject_admin', $projects->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label text-end">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" id="title"
                                value="{{ $projects->title }}" required />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label text-end">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="summernote" name="description" rows="10" required>{{ $projects->description }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="thumbnail" class="col-sm-2 col-form-label text-end">Thumbnail</label>
                        <div class="col-sm-10">
                            <input name="thumbnail" type="file" class="dropify" data-height="100" data-default-file="{{ asset('' . $projects->thumbnail) }}" data-id="{{ $projects->id }}" data-type="thumbnail" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="project_image" class="col-sm-2 col-form-label text-end">Project image</label>
                        <div class="col-sm-10">
                            <div id="project-images">
                                @foreach($images as $image)
                                    <input name="images[]" type="file" class="dropify" data-height="100" data-default-file="{{ asset('' . $image->image_name) }}" data-id="{{ $image->id }}" data-type="image" />
                                @endforeach
                            </div>
                            <button type="button" id="add-image" class="btn btn-secondary mt-2">Add Image</button>
                        </div>
                    </div>
                    <button class="btn btn-success mt-4" style="margin-left: 185px">
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

        $('#add-image').click(function() {
            var newImageInput = $(
                '<div class="project-image">' +
                '<input name="images[]" type="file" class="dropify" data-height="100" />' +
                '</div>'
            );
            $('#project-images').append(newImageInput);
            newImageInput.find('.dropify').dropify();
        });

            $('.dropify').on('dropify.afterClear', function(event, element) {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var url = '';

                if (type === 'thumbnail') {
                    url = '{{ route("deleteprojectimage") }}';
                } else if (type === 'image') {
                    url = '{{ route("deleteprojectimage") }}';
                }

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
    </script>
@endpush

@push('css')
    <link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
