@extends('Admin.layout.app')

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
                <h4 class="page-title">Manajemen Choose</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <a href="{{ route('addchoose_admin') }}" class="btn btn-primary"><i class="ti ti-plus"></i> Add</a>
                <div class="table">
                    <table id="datatable" class="border-top-0 table table-bordered border-bottom">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $("#datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('choose_admin.datatable') }}",
            columnDefs: [
                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    targets: 1,
                    render: function(data, type, full, meta) {
                        return `<img src="/choose/${data}" alt="Icon" height="100">`;
                    },
                },
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        let btn = `
                            <div class="btn-list">
                                <a href="{{ route('editchoose_admin', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <button class="btn btn-danger btn-delete" data-id=":id"><i class="fas fa-trash-alt"></i> Delete</button>
                            </div>
                        `;
                        btn = btn.replaceAll(':id', data);
                        return btn;
                    },
                },
            ],
            columns: [
                { data: 'id' },
                { data: 'icon' },
                { data: 'title' },
                { data: 'description' },
                { data: 'id' }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

        // Delete button click event
        $('#datatable').on('click', '.btn-delete', function() {
            let deleteId = $(this).data('id');
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: "{{ url('admin/choose') }}/" + deleteId,
                    type: 'DELETE',
                    success: function(result) {
                        table.ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        alert('Error deleting record: ' + xhr.statusText);
                    }
                });
            }
        });
    });
</script>
@endpush
