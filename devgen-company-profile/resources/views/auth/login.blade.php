<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('metrica/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('metrica/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('metrica/dist/assets/css/app.min.css" rel="stylesheet') }}" type="text/css">
    <title>Document</title>
</head>


<body id="body" class="auth-page enlarge-menu enlarge-menu-all"
    style="background-image: url('metrica/dist/assets/images/p-1.png'); background-size: cover; background-position: center center;">
    <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-3 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="{{ asset('img/logo.png') }}" height="50" alt="logo"
                                                class="auth-logo">
                                        </a>
                                    </div>
                                    <form class="my-4" action="{{ route('login') }}" method="POST">
                                        @csrf <!-- Pastikan menggunakan CSRF token untuk keamanan -->
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="login">Username/Email</label>
                                            <input type="text" class="form-control" id="login" name="login"
                                                placeholder="Enter username or Email" required>
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password"
                                                    id="userpassword" placeholder="Enter password" required>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    id="togglePassword">
                                                    <i class="ti ti-eye" id="eyeIcon"></i>
                                                </button>

                                            </div>
                                        </div><!--end form-group-->



                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Log In <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->




    <script src="{{ asset('metrica/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('metrica/dist/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('metrica/dist/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('metrica/dist/assets/js/app.js') }}"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('userpassword');
            const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', passwordFieldType);

            // Toggle the icon class
            const eyeIcon = document.getElementById('eyeIcon');
            eyeIcon.classList.toggle('ti-eye');
            eyeIcon.classList.toggle('ti-eye-off');
        });
    </script>
</body>

</html>
