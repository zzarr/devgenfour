@extends('Admin.layout.app')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Partner</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Partner</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    @if (session('success'))
        <div class="alert icon-custom-alert alert-outline-success alert-dismissible fade show floating-alert " role="alert">
            <i class="mdi mdi-check-all alert-icon"></i>
            <div class="alert-text">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
    @endif

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
                                    <th>Name</th> <!-- Add this line -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        return `<img src="${data}" alt="Partner Image" height="100">`;
                    },
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        let btn = `
                            <div class="btn-list">
                                <a href="{{ route('editpartner_admin', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <button class="btn btn-danger btn-delete" data-id=":id"><i class="fas fa-trash-alt"></i> Delete</button>
                            </div>
                        `;
                        btn = btn.replaceAll(':id', full.id);
                        return btn;
                    },
                },
            ],
            columns: [
                { data: 'id' },
                { data: 'image' },
                { data: 'name' },
                { data: 'id' }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

        $('#datatable').on('click', '.btn-delete', function() {
            let deleteId = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak akan dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                willOpen: () => {
                    const confirmButton = Swal.getConfirmButton();
                    const cancelButton = Swal.getCancelButton();

                    confirmButton.style.fontSize = '18px'; // Ukuran font untuk tombol konfirmasi
                    confirmButton.style.padding = '12px 24px'; // Padding tombol konfirmasi
                    confirmButton.style.borderRadius = '6px'; // Border radius tombol konfirmasi

                    cancelButton.style.fontSize = '18px'; // Ukuran font untuk tombol batal
                    cancelButton.style.padding = '12px 24px'; // Padding tombol batal
                    cancelButton.style.borderRadius = '6px'; // Border radius tombol batal
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/partner') }}/" + deleteId,
                        type: 'DELETE',
                        success: function(result) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Item Anda telah dihapus.',
                                icon: 'success',
                                confirmButtonText: 'OK',
                                willOpen: () => {
                                    const confirmButton = Swal.getConfirmButton();
                                    confirmButton.style.fontSize = '18px'; // Ukuran font untuk tombol OK
                                    confirmButton.style.padding = '10px 50px'; // Padding tombol OK
                                    confirmButton.style.borderRadius = '6px'; // Border radius tombol OK
                                }
                            });
                            table.ajax.reload(null, false);
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Kesalahan!',
                                text: 'Kesalahan saat menghapus data: ' + xhr.statusText,
                                icon: 'error',
                                confirmButtonText: 'OK',
                                willOpen: () => {
                                    const confirmButton = Swal.getConfirmButton();
                                    confirmButton.style.fontSize = '18px'; // Ukuran font untuk tombol OK
                                    confirmButton.style.padding = '10px 50px'; // Padding tombol OK
                                    confirmButton.style.borderRadius = '6px'; // Border radius tombol OK
                                }
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
