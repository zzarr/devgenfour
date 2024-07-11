<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('Admin.layout.head-admin')
    <title>Document</title>
</head>

<body id="body">
    <div class="left-sidebar">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{ asset('metrica/dist/assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="{{ asset('img/dev.png') }}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ asset('img/dev.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <div class="menu-body navbar-vertical tab-content">
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="menu-label mt-0">M<span>ain</span></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarDashboards">
                                <i class="ti ti-compass menu-icon"></i>
                                <span>Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ti ti-info-circle menu-icon"></i>
                                <span>Managemen About us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-wrench menu-icon"></i>
                                <span>Managemen Service</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ti ti-question-mark menu-icon"></i>
                                <span>Managemen why choose us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ti ti-code menu-icon"></i>
                                <span>Managemen project</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-charity menu-icon"></i>
                                <span>Managemen Partner</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ti ti-friends menu-icon"></i>
                                <span>Managemen Team</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ti ti-settings menu-icon"></i>
                                <span>App setting</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!-- end leftbar-tab-menu-->

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
            </ul>
            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li>
                <li class="hide-phone app-search">
                    <form role="search" action="#" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0"
                            placeholder="Type text...">
                        <button type="submit"><i class="ti ti-search"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <!-- END TOP BAR -->

    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>

    <!-- JS -->
    @include('Admin.layout.script-admin')
</body>

</html>
