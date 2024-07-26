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

<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>About</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
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
            <div class="col-lg-6 p-0">
                <div class="about-image">
                    <img
                                src="{{ asset('' . $aboutUs->image) }}"
                                class="wow zoomIn"
                                data-wow-delay="0.6s"
                                alt="image"
                            />
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-tab">
                    <h2>{{ $aboutUs->title }}</h2>
                    <div class="bar"></div>
                    <p>{!! $aboutUs->description !!}</p>

                    <div class="tab about-list-tab">
                        <ul class="tabs">
                            <li>
                                <a href="#"> Our History </a>
                            </li>
                            <li>
                                <a href="#"> Our Mission </a>
                            </li>
                            <li>
                                <a href="#"> Friendly Support </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

@include('layout.footer-section')

@include('layout.script-landingpage')

</html>