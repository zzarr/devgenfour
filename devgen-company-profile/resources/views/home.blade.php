<!DOCTYPE html>
<html lang="zxx" class="theme-light">
   

    @include('layout.head-landingpage')

    <body>

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="fria-responsive-nav">
                <div class="container">
                    <div class="fria-responsive-menu">
                        <div class="logo">
                            <a href="index.html">
                                <img
                                    src="img/dev.png"
                                    class="black-logo"
                                    alt="image"
                                />
                                <img
                                    src="img/dev.png"
                                    class="white-logo"
                                    alt="image"
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fria-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img
                                src="img/dev.png"
                                class="black-logo"
                                alt="image"
                            />
                            <img
                                src="img/dev.png"
                                class="white-logo"
                                alt="image"
                            />
                        </a>

                        <div
                            class="collapse navbar-collapse mean-menu"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        Home
                                    </a>
                                    

                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">
                                        About
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Services
                                    </a>
                                    

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Projects
                                    </a>
                                    

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
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
                                                <input
                                                    class="search-input"
                                                    name="search"
                                                    placeholder="Search"
                                                    type="text"
                                                />

                                                <button
                                                    class="search-button"
                                                    type="submit"
                                                >
                                                    <i
                                                        class="flaticon-search"
                                                    ></i>
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
        <!-- End Navbar Area -->

        <!-- Sidebar Modal -->

        <!-- End Sidebar Modal -->

        <!-- Start Banner Area -->
       @include('layout.hero-section')
        <!-- End Banner Area -->

        <!-- Start Features Area -->
 
        <!-- End Features Area -->

        <!-- Start Work Area -->
     
        <!-- End work Area -->

        <!-- Start Services Area -->
        @include('layout.services-section')
        <!-- End Services Area -->

        <!-- Start Support Area -->
       
        <!-- End Support Area -->

        <!-- Start Overview Area -->
        @include('layout.overview-area-section')
        <!-- End Overview Area -->

        {{-- bagian saya --}}

        <!-- Start Choose Area -->
        @include('layout.whychooseus-section')
        <!-- End Choose Area -->

        {{-- bagian saya berakhir --}}

        <!-- team expert section -->
       @include('layout.team-expert-section')
        <!-- End Fun Facts Section -->

        <!-- Start Projects Area -->
        @include('layout.project-section')
        <!-- End Projects Area -->

        <!-- Start Team Area -->
        @include('layout.team-area-section')
        <!-- End Team Area -->

        <!-- Start Skills Area -->
        
        <!-- End Skills Area -->

        <!-- Start Blog Area -->
        
        <!-- End Blog Area -->

        <!-- Start Clients Area -->

        <!-- End Clients Area -->

        <!-- Start Partner Section -->
       @include('layout.mediapatner-section')
        <!-- End Partner Section -->

        <!-- Start Footer Area -->
       @include('layout.footer-section')
        <!-- End Copy Right Area -->

        <!-- Start Go Top Section -->
        @include('layout.go-top-section')
        <!-- End Go Top Section -->

        <!-- dark version -->
        @include('layout.dark-version-section')
        <!-- dark version -->

        <!-- Jquery Slim JS -->
        @include('layout.script-landingpage')
     

    </body>
</html>
