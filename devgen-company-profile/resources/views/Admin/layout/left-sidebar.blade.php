<div class="left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('dashboard_admin') }}" class="logo">

            <span>
                <img src="{{ asset('img/logo.png') }}" alt="logo-large" class="logo-lg logo-light" style="width: 150px; height: auto;">
                <img src="{{ asset('img/logo.png') }}" alt="logo-large" class="logo-lg logo-dark" style="width: 150px; height: auto;">
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
                        <a class="nav-link text-black" href="{{ route('dashboard_admin') }}">
                            <i class="ti ti-gauge menu-icon"></i>
                            <span>Dashboard</span>
                        </a>

                    <li class="nav-item">
                        <a href="{{ route('services_admin') }}" class="nav-link text-black ">
                            <i class="mdi mdi-wrench menu-icon"></i>
                            <span>Manajemen Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('choose_admin') }}" class="nav-link text-black">
                            <i class="ti ti-question-mark menu-icon"></i>
                            <span>Manajemen Why Choose Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project_admin') }}" class="nav-link text-black">
                            <i class="ti ti-code menu-icon"></i>
                            <span>Manajemen Project</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('partner_admin') }}" class="nav-link text-black">
                            <i class="mdi mdi-charity menu-icon"></i>
                            <span>Manajemen Partner</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('team_admin') }}" class="nav-link text-black">
                            <i class="ti ti-friends menu-icon"></i>
                            <span>Manajemen Team</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('app_setting_admin') }}" class="nav-link text-black">
                            <i class="ti ti-settings menu-icon"></i>
                            <span>App Setting</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- end leftbar-tab-menu-->
