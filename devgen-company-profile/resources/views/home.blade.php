<!DOCTYPE html>
<html lang="zxx" class="theme-light">
   <head> @include('layout.head-landingpage')</head>
    <body>
        <!-- Start Navbar Area -->
        @include('layout.navbar')
        <!-- End Navbar Area -->

        <!-- Start Banner Area -->
       @include('layout.hero-section')
        <!-- End Banner Area -->

        <!-- Start Services Area -->
        @include('layout.services-section')
        <!-- End Services Area -->

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

        <!-- Start Partner Section -->
       @include('layout.mediapatner-section')
        <!-- End Partner Section -->

        <!-- Start Footer Area -->
       @include('layout.footer-section')
        <!-- End Copy Right Area -->

        <!-- Jquery Slim JS -->
        @include('layout.script-landingpage')
     

    </body>
</html>
