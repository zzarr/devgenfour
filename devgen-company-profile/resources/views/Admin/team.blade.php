@extends('Admin.layout.app')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Team</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Team</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Team</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <a href="{{ route('addteam_admin') }}" class="btn btn-primary"><i class="ti ti-plus"></i> Add</a>
                    <div class="table-responsive">
                        <table class="table" id="datatable_1">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
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

            table = $("#datatable_1").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('team_admin.datatable') }}",

                columnDefs: [{
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
                                <a href="{{ route('editteam_admin', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <a href="#" data-toggle="modal" data-target="#modal-hapus${data}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </div>
                        `;
                            btn = btn.replaceAll(':id_team', String(data));
                            return btn;
                        },
                    },
                    {
                        targets: 4,
                        render: function(data, type, full, meta) {
                            let url = '{{ asset('team/') }}/' + data;
                            return '<img src="' + url + '" alt="team" class="thumb-lg rounded">';
                        }
                    },
                ],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'jabatan'
                    },
                    {
                        data: 'foto'
                    }
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        });
    </script>
@endpush
