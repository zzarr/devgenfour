@extends('Admin.layout.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Services</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Services</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <a href="{{ route('addservices_admin') }}" class="btn btn-primary"><i class="ti ti-plus"></i>
                            Add</a>
                        <div class="table">
                            <table class="table" id="datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="column-no">No</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th class="column-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be loaded by DataTables -->
                                </tbody>
                            </table>
                        </div><!-- end table-responsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-12-->
        </div><!--end row-->
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
                ajax: "{{ route('services_admin.datatable') }}",
                columnDefs: [{
                        targets: 0,
                        className: 'column-no',
                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        targets: 1,
                        render: function(data, type, full, meta) {
                            return `<img src="/services/${data}" alt="Icon" height="100">`;
                        },
                    },
                    {
                        targets: 3,
                        className: 'column-action',
                        render: function(data, type, full, meta) {
                            let btn = `
                            <div class="btn-list">
                                <a href="{{ route('editservices_admin', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <button class="btn btn-danger btn-delete" data-id=":id"><i class="fas fa-trash-alt"></i> Delete</button>
                            </div>
                        `;
                            btn = btn.replaceAll(':id_services', full.id_services);
                            return btn;
                        },
                    }
                ],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'icon'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'id'
                    }
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $('#datatable').on('click', '.btn-delete', function() {
                let deleteId = $(this).data('id');
                if (confirm('Are you sure you want to delete this item?')) {
                    $.ajax({
                        url: "{{ url('admin/services') }}/" + deleteId,
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


<style>
    .column-no {
        width: 50px;
        /* Adjust this value as needed */
    }

    .column-action {
        width: 150px;
        /* Adjust this value as needed */
    }
</style>
