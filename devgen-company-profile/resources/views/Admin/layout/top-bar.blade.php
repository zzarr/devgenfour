<div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom" id="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div
                            class="bg-light-alt d-flex justify-content-center align-items-center thumb-md rounded-circle">
                            <i class="ti ti-logout"></i>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
        </ul>
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                    <i class="ti ti-menu-2"></i>
                </button>
            </li>
            <!-- <li class="hide-phone app-search">
                <form role="search" action="#" method="get">
                    <input type="search" name="search" class="form-control top-search mb-0"
                        placeholder="Type text...">
                    <button type="submit"><i class="ti ti-search"></i></button>
                </form>
            </li> -->

        </ul>

    </nav>
</div>
