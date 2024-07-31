@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Service</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateservices_admin', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" class="dropify" id="icon" name="icon" data-default-file="{{ asset('services/' . $service->icon) }}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $service->description }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
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
