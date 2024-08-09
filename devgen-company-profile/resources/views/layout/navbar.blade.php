<div class="navbar-area">
    <div class="fria-responsive-nav">
        <div class="container">
            <div class="fria-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        {{-- <img src="{{ asset('img/' . $appSetting->logo) }}" class="black-logo" alt="image" />
                        <img src="{{ asset('img/' . $appSetting->logo) }}" class="white-logo" alt="image" /> --}}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="fria-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset($appSetting->logo) }}" style="height: 40px; width: auto;" alt="logo" />

                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">
                                Home
                            </a>


                        <li class="nav-item">
                            <a href="{{ route('about-us') }}" class="nav-link">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('services') }}" class="nav-link">
                                Services
                            </a>


                        <li class="nav-item">
                            <a href="{{ route('projects.galery') }}" class="nav-link" id="projects-link">
                                Projects
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <div class="others-options">
                        <div class="option-item">
                            <i class="close-btn flaticon-cancel"></i>
                            <div class="search-overlay search-popup">
                                <div class="search-box">
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="Search"
                                            type="text" />

                                        <button class="search-button" type="submit">
                                            <i class="flaticon-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
