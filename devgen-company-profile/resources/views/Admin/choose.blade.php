@extends('admin.layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endsection

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
                <a href="{{ route('choose.index') }}" class="btn btn-primary mb-2">Add Choose</a>
                <div class="table-responsive">
                    <table id="choose-table" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Title</th>
                                <th>Description</th>
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    var table;
    
    $(document).ready(function() {
        table = $('#choose-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('choose_admin.datatable') }}",
            columns: [
                { data: null, name: 'no' },
                { data: 'id', name: 'id', render: function(data, type, full, meta) {
                        return `<a href="{{ route('choose.edit', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus${data}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>`.replace(':id', data);
                    }
                },
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return meta.row + 1;
                    }
                }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });
</script>
@endsection
