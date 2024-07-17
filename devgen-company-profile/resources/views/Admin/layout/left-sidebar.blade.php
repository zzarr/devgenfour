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
                        <a class="nav-link" href="{{ route('dashboard_admin') }}">
                            <i class="ti ti-compass menu-icon"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ti ti-info-circle menu-icon"></i>
                            <span>Manajemen About us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('services_admin') }}" class="nav-link text-black">
                            <i class="mdi mdi-wrench menu-icon"></i>
                            <span>Manajemen Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('choose.index') }}" class="nav-link">
                            <i class="ti ti-question-mark menu-icon"></i>
                            <span>Manajemen Why Choose Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project_admin') }}" class="nav-link">
                            <i class="ti ti-code menu-icon"></i>
                            <span>Manajemen Project</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('partner_admin') }}" class="nav-link">
                            <i class="mdi mdi-charity menu-icon"></i>
                            <span>Manajemen Partner</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('team_admin') }}" class="nav-link">
                            <i class="ti ti-friends menu-icon"></i>
                            <span>Manajemen Team</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('app_setting_admin') }}" class="nav-link">
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
