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
                <h4 class="card-title">Team</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable_1">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Ext.</th>
                                <th>City</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                <th>Completion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Unity Pugh</td>
                                <td>9958</td>
                                <td>Curicó</td>
                                <td>2005/02/11</td>
                                <td>37%</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--end table-responsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-12-->
</div><!--end row-->
@endsection
