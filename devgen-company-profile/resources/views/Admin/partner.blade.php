@extends('Admin.layout.app')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Partner</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Partner</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Partner</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <a href="{{ route('addpartner_admin') }}" class="btn btn-primary"><i class="ti ti-plus"></i> Add</a>
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
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
            ajax: "{{ route('partner_admin.datatable') }}",

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
                        return '<img src="'+data+'" alt="Partner Image" width="100%" height="100%">';
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        let btn = `
                            <div class="btn-list">
                                <a href="{{ route('editpartner_admin', ':id_partner') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus${data}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </div>
                        `;
                        btn = btn.replaceAll(':id_partner', data);
                        return btn;
                    },
                }

            ],
            columns: [
                { data: 'id_partner' },
                { data: 'image' },
                { data: 'id_partner' }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });
</script>
@endpush
