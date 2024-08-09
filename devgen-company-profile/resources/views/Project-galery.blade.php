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
                        <h2>Projects</h2>
                        <ul>
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            <li>Projects Galery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="projects-section pt-100 pb-70">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Projects</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et
                    dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                <div class="bar"></div>
            </div>

            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-4">
                        <div class="single-projects">
                            <div class="projects-image">
                                <img src="{{ asset($project->thumbnail) }}" alt="image">
                            </div>

                            <div class="projects-content">
                                <a href="{{ route('showproject', ['id' => $project->id]) }}">
                                    <h3>{{ $project->title }}</h3>
                                </a>


                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @include('layout.footer-section')
    @include('layout.script-landingpage')

</body>

</html>
