@extends('Admin.layout.app')

@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Choose List</h3>
            </div>
            <div class="card-body">
            <a href="{{ route('choose.create') }}" class="btn btn-primary"><i class="ti ti-plus"></i> Add</a>

                <div class="table">
                <table id="datatable" class="border-top-0 table table-bordered border-bottom">
                <thead class="thead-light">

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

@push('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        table = $("#datatable").DataTable({
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
                        let btn = `
                            <div class="btn-list">
                                <a href="{{ route('choose.edit', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus${data}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </div>
                        `;
                        btn = btn.replaceAll(':id', data);
                        return btn;
                    },
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        if (data && data.length > 150) {
                            return data.substr(0, 150) + '...';
                        }
                        return data;
                    }
                },
            ],
            columns: [
                { data: 'id' },
                { data: 'id' },
                { data: 'title' },
                { data: 'description' }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });
</script>
@endpush
