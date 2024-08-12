<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head-landingpage')
    <title>Services detail | {{ $services->title }}</title>
</head>

<body>
    @include('layout.navbar')

    <div class="page-title-area ">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{ $services->title }}</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>{{ $services->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="services-details-video">
                <div class="details-image">
                    <img src="{{ asset($services->icon) }}" alt="image">
                </div>



                <div class="text">
                    <p>{!! $services->description !!}</p>
                </div>
            </div>

            <div class="services-details-overview">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="services-details-desc">
                            {!! $services->long_description !!}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="services-details-image">
                            <img src="{{ asset($services->image) }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>


    </section>

    @include('layout.footer-section')
    @include('layout.script-landingpage')

</body>

</html>
