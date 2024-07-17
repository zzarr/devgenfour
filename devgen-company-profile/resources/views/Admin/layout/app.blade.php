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
    <!-- left side bar start -->
    @include('Admin.layout.left-sidebar')
    <!-- lefr side bar end -->

    <!-- Top Bar Start -->
    @include('Admin.layout.top-bar')
    <!-- END TOP BAR -->

    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center text-sm-start">
                <script>
                    document.write(new Date().getFullYear())
                </script> @Devgenfour <span class="text-muted d-none d-sm-inline-block float-end">Crafted
                    with <i class="mdi mdi-heart text-danger"></i> by Solid Team</span>
            </footer>
        </div>
    </div>

    <!-- JS -->
    @include('Admin.layout.script-admin')
    @stack('script')
</body>

</html>
