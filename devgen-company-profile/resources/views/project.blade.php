<!DOCTYPE html>
<html lang="zxx" class="theme-light">
<head>
    @include('layout.head-landingpage')
 <style>

        /* CSS Custom */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .project-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .project-header nav {
            margin-top: 10px;
        }
        .project-header nav a {
            color: #007bff;
            text-decoration: none;
        }
        .project-header nav span {
            margin: 0 5px;
            color: #6c757d;
        }
        .project-images {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
        .project-images div {
            margin: 0 10px;
        }
        .project-images img {
            width: 400px; /* Ukuran gambar */
            height: 400px; /* Ukuran gambar */
            border-radius: 8px;
            background-color: #ddd;
            display: block;
        }
        .project-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .project-details h2 {
            margin-top: 0;
        }
        .project-details ul {
            list-style: none;
            padding: 0;
        }
        .project-details ul li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .project-details ul li i {
            color: #28a745;
            margin-right: 10px;
        }
        .project-meta {
            margin-top: 20px;
        }
        .project-meta p {
            margin: 5px 0;
        }
        .project-share a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
@include('layout.navbar')
<body>
    

        <div class="page-title-area" style="background-image: url('{{ asset('project/thumbnail/' . $project->thumbnail) }}')">
            <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{$project->title }}</h2>
                            <ul>
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                <li > {{$project->title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($projectimg as $p)
                <div class="col-lg-4 col-md-4 d-flex " >
                    <div class="project-details-image">
                        <img src="{{ asset('project/image/' . $p->image_name) }}" style="width: 100%; height: auto;">
                    </div>
                </div>
              @endforeach
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="section-title">
                <h2> {{ $project->title }}</h2>
                <p>{!! $project->description !!}</p>
                <div class="bar"></div>
            </div>
            
            <div class="row"> 
                @foreach ($projects as $project)
                <div class="col-lg-3">
                    <div class="single-projects">
                        <div class="projects-image">
                            <img src="{{ asset('project/thumbnail/' . $project->thumbnail)}}" style="width: 100%; height: 200px; object-fit: cover;">
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

        @include('layout.footer-section', ['numbers' => $numbers, 'appSetting' => $appSetting])
        @include('layout.script-landingpage')
</body>
</html>
