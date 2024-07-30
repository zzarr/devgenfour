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

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 fw-semibold">Visitor</p>
                            <h4 class="my-1"> {{ $visitorCount }}</h4>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md rounded-circle">
                                <i class="ti ti-user-exclamation"></i>
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
                            <p class="text-dark mb-1 fw-semibold">Project Counter</p>
                            <h4 class="my-1">{{ $projectCount }}</h4>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md rounded-circle">
                                <i class="ti ti-code"></i>
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
                            <p class="text-dark mb-1 fw-semibold">About Us Counter</p>
                            <h4 class="my-1">{{ $aboutUsCount }}</h4>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md rounded-circle">
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
                            <p class="text-dark mb-1 fw-semibold">Detail Project Counter</p>
                            <h4 class="my-1">{{ $detailProjectCount }}</h4>
                        </div>
                        <div class="col-auto align-self-center">
                            <div
                                class="bg-light-alt d-flex justify-content-center align-items-center thumb-md rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-info align-self-center text-muted icon-sm">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12" y2="8"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="chartSaya"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('script')
    <!-- Perpustakaan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Konfigurasi chart dengan dataset terpisah untuk setiap counter
        const ctx = document.getElementById('chartSaya').getContext('2d');
        const chartSaya = new Chart(ctx, {
            type: 'line', // Contoh tipe chart
            data: {
                labels: ['Counter'], // Label untuk sumbu x
                datasets: [{
                        label: 'Visitor',
                        data: [{{ $visitorCount }}], // Data untuk Visitor
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Project',
                        data: [{{ $projectCount }}], // Data untuk Project
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'About Us',
                        data: [{{ $aboutUsCount }}], // Data untuk About Us
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Detail Project',
                        data: [{{ $detailProjectCount }}], // Data untuk Detail Project
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
