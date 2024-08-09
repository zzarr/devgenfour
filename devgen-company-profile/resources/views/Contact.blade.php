<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head-landingpage')
    <title>Contact</title>
</head>

<body>
    @include('layout.navbar')

    <div class="page-title-area " style="background-image: url('{{ asset('assets/img/bg/bg-1.jpg') }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-box pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact-box">
                        <i class="flaticon-pin"></i>
                        <div class="content-title">
                            <h3>Address</h3>
                            <p>{{ $appSetting->alamat }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-contact-box">
                        <i class="flaticon-envelope"></i>
                        <div class="content-title">
                            <h3>Email</h3>
                            <a href="mailto:hello@fria.com">{{ $appSetting->email }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-contact-box">
                        <i class="flaticon-phone-call"></i>
                        <div class="content-title">
                            @php
                                $phoneNumber = $appSetting->no_contact;
                                if (substr($phoneNumber, 0, 1) === '0') {
                                    $phoneNumber = '+62' . substr($phoneNumber, 1);
                                }
                            @endphp
                            <h3>Phone</h3>
                            <a href="tel:123456123">{{ $phoneNumber }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('layout.footer-section')
    @include('layout.script-landingpage')
</body>

</html>
