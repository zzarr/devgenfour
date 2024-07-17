@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Choose Management</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('choose.create') }}" class="btn btn-primary mb-2">Add Choose</a>
                    <table class="table table-bordered" id="choose-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#choose-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('choose.index') }}',
        columns: [
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush