@extends('Admin.layout.app')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end page title end breadcrumb -->

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 fw-semibold">Projects</p>
                            <h4 class="my-1">77</h4>
                            <p class="mb-0 text-truncate text-muted"><span class="text-success"><i
                                        class="mdi mdi-checkbox-marked-circle-outline me-1"></i></span>26 Project Complete
                            </p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-layers align-self-center text-muted icon-sm">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 fw-semibold">Tasks</p>
                            <h4 class="my-1">41</h4>
                            <p class="mb-0 text-truncate text-muted"><span class="badge badge-soft-success">Active</span>
                                Weekly Avg.Sessions</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-check-square align-self-center text-muted icon-sm">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 fw-semibold">Total Hours</p>
                            <h4 class="my-1">801:30</h4>
                            <p class="mb-0 text-truncate text-muted"><span class="text-muted">01:33</span> /
                                <span class="text-muted">9:30</span> Duration
                            </p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-clock align-self-center text-muted icon-sm">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 fw-semibold">Budget</p>
                            <h4 class="my-1">$24100</h4>
                            <p class="mb-0 text-truncate text-muted"><span class="text-dark">$14k</span> Total used budgets
                            </p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-dollar-sign align-self-center text-muted icon-sm">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div>
@endsection
