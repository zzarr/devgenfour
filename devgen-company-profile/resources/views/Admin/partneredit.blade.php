@extends('admin.layout.app')

@section('content')
<div class="row">
        <div class="col-sm-12">
        <div class="page-title-box">
        <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Partner</li>
                        <li class="breadcrumb-item active">Edit Partner</li>
                    </ol>
                </div>
            <h4 class="page-title">Edit Partner</h4>
            </div>
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
                            <input name="image" type="file" class="dropify" data-height="300" data-default-file="{{ asset('' . $partner->image) }}" data-id="{{ $partner->id }}" data-type="image" />
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $partner->name }}" required>
                        </div>
                        <button class="btn btn-success mt-4" style="margin-left: 0px">
                    Submit</button>
                <a href="{{ route('partner_admin') }}" type="button" class="btn btn-outline-danger mt-4"
                    style="margin-left: 5px"><i class="ti ti-arrow-back"></i> Cancel</a>
            
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
            
            $(document).ready(function() {
        $('.dropify').on('dropify.afterClear', function(event, element) {
            var id = $(this).data('id');
            var type = $(this).data('type');
            var url = '{{ route("deletePartnerImage") }}';

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
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
