<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

@include('layout.head-landingpage')

</head>

<body>

@include('layout.navbar')

<div class="page-title-area" style="background-image: url('{{ asset($aboutUs->image) }}')">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>About</h2>
                    <ul>
                        <li><a href="home">Home</a></li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start About Area -->
<section class="about-section ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-5">
                <div class="about-image">
                    <img
                                src="{{ asset('' . $aboutUs->image) }}"/>
                </div>
            </div>
            
        
            <div class="col-lg-6 p-0">
                <div class="about-tab">
                    <h2>{{ $aboutUs->title }}</h2>
                    <div class="bar"></div>
                    <p>{!! $aboutUs->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-section pb-70">
    <div class="container">
        <div class="section-title">
            <h2>Our Expert Team</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incidiunt labore et dolore magna
                aliqua. Quis ipsum suspendisse ultrices gravida.
            </p>
            <div class="bar"></div>
        </div>

        <div class="row">
            @foreach ($team as $teams)
                <div class="col-lg-4 col-md-6">
                    <div class="single-team">
                        <div class="image">
                            <img src="{{ asset('' . $teams->foto) }}"
                                style="width: 365px; height: 490px; object-fit: cover;">
                        </div>

                        <div class="content">
                            <h3>{{ $teams->name }}</h3>
                            <span>{{ $teams->jabatan }}</span>

                            <ul class="social">
                                <li>
                                    <a href="{{ $teams->facebook }}">
                                        <i class="mdi mdi-facebook fs-5"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ $teams->linkedin }}">
                                        <i class="mdi mdi-linkedin fs-5"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ $teams->instagram }}">
                                        <i class="fab fa-instagram fs-5"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

</body>

@include('layout.footer-section')

@include('layout.script-landingpage')

</html>
