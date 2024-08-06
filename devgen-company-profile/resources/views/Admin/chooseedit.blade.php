@extends('admin.layout.app') @section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard_admin') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Choose</li>
                        <li class="breadcrumb-item active">Edit Choose</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Choose</h4>
            </div>
        </div>
    </div>

<<<<<<< HEAD
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form
                    action="{{ route('updatechoose_admin', $choose->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input
                            type="file"
                            class="dropify"
                            id="icon"
                            name="icon"
                            data-default-file="{{ asset('choose/' . $choose->icon) }}"
                            data-id="{{ $choose->id }}" 
                            data-type="icon"
                        />
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ $choose->title }}"
                            required
                        />
                    </div>
                 <div class="form-group">
                        <label for="description">Description</label>
                        <textarea 
                            type="text"
                            class="form-control"
                            id="summernote"
                            name="description"
                            rows="10"
                            required>
=======
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updatechoose_admin', $choose->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" class="dropify" id="icon" name="icon"
                                data-default-file="{{ asset('' . $choose->icon) }}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $choose->title }}" required />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="summernote" name="description" rows="10" required>
>>>>>>> 60a76db1de60db577ac6f449129770d394afec6c
                            {{ $choose->description }}
                        </textarea>
                        </div>

                        <button class="btn btn-success mt-4" style="margin-left: 0px">
                            Submit</button>
                        <a href="{{ route('choose_admin') }}" type="button" class="btn btn-outline-danger mt-4"
                            style="margin-left: 5px"><i class="ti ti-arrow-back"></i> Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('#summernote').summernote();

        $(document).ready(function() {
        $('.dropify').on('dropify.afterClear', function(event, element) {
            var id = $(this).data('id');
            var type = $(this).data('type');
            var url = '{{ route("deleteChooseIcon") }}';

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
    });
    </script>
@endpush


@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}" />
<link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">

=======
    @endsection @push('script')
    <script>
        $(document).ready(function() {
            $(".dropify").dropify();
            $('#summernote').summernote();
        });
    </script>
    @endpush @push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}" />
    <link href="{{ asset('summer-note/summernote-bs4.min.css') }}" rel="stylesheet">
>>>>>>> 60a76db1de60db577ac6f449129770d394afec6c
@endpush
