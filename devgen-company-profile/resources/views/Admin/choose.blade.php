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

    @if (session('success'))
        <div class="alert icon-custom-alert alert-outline-success alert-dismissible fade show floating-alert "
            role="alert">
            <i class="mdi mdi-check-all alert-icon"></i>
            <div class="alert-text">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
    @endif

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
                                    <th class="column-desc">Description</th>
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
                ajax: "{{ route('choose_admin.datatable') }}",
                columnDefs: [{
                        targets: 0,
                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        targets: 1,
                        render: function(data, type, full, meta) {
                            return `<img src="/${data}" alt="Icon" class="thumb-lg rounded" style="width: 100px; height: 100px; object-fit: cover;">`;
                        },
                    },
                    {
                        targets: 3,
                        render: function(data, type, full, meta) {
                            return data; //memanggil fungsi penghilang tag <html> </html> dari controller
                        },
                    },
                    {
                        targets: 4,
                        render: function(data, type, full, meta) {
                            let btn = `
                            <div class="btn-list">
                                <a href="{{ route('editchoose_admin', ':id') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                <button class="btn btn-danger btn-delete" data-id=":id"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </div>
                        `;
                            btn = btn.replaceAll(':id', data);
                            return btn;
                        },
                    },
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
                        data: 'description'
                    },
                    {
                        data: 'id'
                    }
                ],
                language: {
                    searchPlaceholder: 'Cari...',
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

                        confirmButton.style.fontSize =
                            '18px'; // Ukuran font untuk tombol konfirmasi
                        confirmButton.style.padding = '12px 24px'; // Padding tombol konfirmasi
                        confirmButton.style.borderRadius =
                            '6px'; // Border radius tombol konfirmasi

                        cancelButton.style.fontSize = '18px'; // Ukuran font untuk tombol batal
                        cancelButton.style.padding = '12px 24px'; // Padding tombol batal
                        cancelButton.style.borderRadius = '6px'; // Border radius tombol batal
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('admin/choose') }}/" + deleteId,
                            type: 'DELETE',
                            success: function(result) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: 'Item Anda telah dihapus.',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    willOpen: () => {
                                        const confirmButton = Swal
                                            .getConfirmButton();
                                        confirmButton.style.fontSize =
                                            '18px'; // Ukuran font untuk tombol OK
                                        confirmButton.style.padding =
                                            '10px 50px'; // Padding tombol OK
                                        confirmButton.style.borderRadius =
                                            '6px'; // Border radius tombol OK
                                    }
                                });
                                table.ajax.reload(null, false);
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: 'Kesalahan!',
                                    text: 'Kesalahan saat menghapus data: ' +
                                        xhr.statusText,
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    willOpen: () => {
                                        const confirmButton = Swal
                                            .getConfirmButton();
                                        confirmButton.style.fontSize =
                                            '18px'; // Ukuran font untuk tombol OK
                                        confirmButton.style.padding =
                                            '10px 50px'; // Padding tombol OK
                                        confirmButton.style.borderRadius =
                                            '6px'; // Border radius tombol OK
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


@include('Admin.styles.th');
