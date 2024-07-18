@extends('Admin.layout.app')
@section('content')
    <!-- Page-Title -->
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
                                    <th>Name</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->jabatan }}</td>
                                        <td><img src="{{ asset('team/' . $team->foto) }}" alt="user"
                                                class="thumb-lg rounded"></td>
                                        <td>
                                            <div class="button-items">
                                                <a href="{{ route('editteam_admin', $team->id_team) }}"
                                                    class="btn btn-outline-info btn-icon-circle btn-icon-circle-sm"><i
                                                        class="ti ti-pencil"></i></a>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-icon-circle btn-icon-circle-sm"><i
                                                        class="ti ti-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--end table-responsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-12-->
    </div><!--end row-->
@endsection
