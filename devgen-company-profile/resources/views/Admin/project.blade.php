@extends('Admin.layout.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Project</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Project</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Project</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <a href="{{ route('addproject_admin') }}" class="btn btn-primary"><i class="ti ti-plus"></i> Add</a>
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Id Project</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div><!--end table-responsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-12-->
    </div><!--end row-->
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
                ajax: "{{ route('project_admin.datatable') }}",

                columnDefs: [{
                        targets: 1,
                        render: function(data, type, full, meta) {
                            return `<img src="${data}" alt="Thumbnail" height="100">`;
                        }
                    },
                    {
                        targets: 3,
                        render: function(data, type, full, meta) {
                            return data; //memanggil fungsi penghilang tag <p> </p>
                        },
                    },
                    {
                        targets: 4,
                        render: function(data, type, full, meta) {
                            let btn = `
                            <div class="btn-list">
                                <a href="{{ route('editproject_admin', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <button class="btn btn-danger btn-delete" data-id=":id"><i class="fas fa-trash-alt"></i> Delete</button>
                            </div>
                        `;
                            btn = btn.replaceAll(':id', full.id);
                            return btn;
                        },
                    }
                ],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'thumbnail'
                    }, // Ensure this matches the data returned
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'id'
                    } // For action column
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
                        url: "{{ url('admin/project') }}/" + deleteId,
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
