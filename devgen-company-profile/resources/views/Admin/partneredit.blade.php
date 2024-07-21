@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Partner</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updatepartner_admin', $partner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="dropify" id="image" name="image" data-default-file="{{ asset('partners/' . $partner->image) }}" />
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $partner->name }}" required>
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
