<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head-landingpage')
    <title>Document</title>
</head>

<body>
    @include('layout.navbar')
    <div class="page-title-area item-bg-1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Services</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Services One</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="services-section pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <h2>IT Agency Services</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et
                    dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                <div class="bar"></div>
            </div>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">

                            <div class="icon bg-deb0fe">
                                <img src="{{ asset('services/' . $service->icon) }}" style="width: 40%; height: 40%;">
                            </div>

                            <h3>{{ $service->title }}</h3>
                            <p>{!! $service->description !!}</p>
                            <a href="single-services.html" class="read-btn">Read More</a>


                        </div>
                    </div>
                @endforeach


            </div>
        </div>

        <div class="default-shape">
            <div class="shape-1">
                <img src="{{ asset('fria/fria/assets/img/shape/4.png') }}" alt="image">
            </div>

            <div class="shape-2 rotateme">
                <img src="{{ asset('fria/fria/assets/img/shape/5.svg') }}" alt="image">
            </div>

            <div class="shape-3">
                <img src="{{ asset('fria/fria/assets/img/shape/6.svg') }}" alt="image">
            </div>

            <div class="shape-4">
                <img src="{{ asset('fria/fria/assets/img/shape/7.png') }}" alt="image">
            </div>

            <div class="shape-5">
                <img src="{{ asset('fria/fria/assets/img/shape/8.png') }}" alt="image">
            </div>
        </div>
    </section>

    @include('layout.footer-section')
    @include('layout.script-landingpage')
</body>

</html>
