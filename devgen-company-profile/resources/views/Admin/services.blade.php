@extends('Admin.layout.app')
@section('content')
    <div x-data="{ page: 'services' }">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">Dashboard</li>
                            <li class="breadcrumb-item active">Services</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Services</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div x-show="page === 'services'">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Services Details</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <button x-on:click="page = 'add_service'" class="btn btn-primary"><i class="ti ti-plus"></i>
                                    Add</button>
                                <table class="table" id="datatable_1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Ext.</th>
                                            <th>City</th>
                                            <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                            <th>Completion</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Unity Pugh</td>
                                            <td>9958</td>
                                            <td>Curicó</td>
                                            <td>2005/02/11</td>
                                            <td>37%</td>
                                            <td>
                                                <div class="button-items">
                                                    <button type="button"
                                                        class="btn btn-outline-warning btn-icon-circle btn-icon-circle-sm"><i
                                                            class="ti ti-pencil"></i></button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-icon-circle btn-icon-circle-sm"><i
                                                            class="ti ti-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--end table-responsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-12-->
            </div><!--end row-->
        </div>
        <div x-show="page === 'add_service'">
            <!-- Content for Add Service Page -->
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Form</h4>
                        <p class="text-muted mb-0">Basic example to demonstrate Bootstrap’s form styles.</p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="InlineCheckbox"
                                        data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="InlineCheckbox">Check me out</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-de-primary">Submit</button>
                            <button type="button" class="btn btn-de-danger">Cancel</button>
                        </form>
                    </div><!--end card-body-->
                </div>
            </div>
            <!-- Add your form or content for adding a service here -->
        </div>
    </div>
@endsection
