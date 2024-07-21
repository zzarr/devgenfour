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


<body>
    @include('layout.navbar')
    <div>
        {{-- <div class="project-header" style="background-color: rgb(143, 218, 251); width: 100%; height: 200px; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white;">
            <h1 style="color: white;">Projects</h1>
            <div style="display: flex; justify-content: center; align-items: center; color: black;">
                <a href="{{ url('/home') }}" style="margin-right: 5px;">Home</a>
                <span style="margin-right: 5px;">&gt;</span>
                <a href="#">Single Projects</a>
            </div>
        </div> --}}
        <div class="page-title-area item-bg-1">
            <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Projects</h2>
                            <ul>
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                <li>{{ $project['title'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="project-images">
            <div>
                <img src="{{ asset('project/image/' . $project->image_name)}}">
            </div>
            <div>
                <img src="{{ $project['image2'] }}" alt="Project Image 2" class="img-fluid">
            </div>
        </div>

        <div class="project-details">
            <h2>{{ $project['title'] }}</h2>
            <p>{!! $project->description !!}</p>
        </div>
    </div>
    {{-- @include('layout.footer-section')
    @include('layout.script-landingpage') --}}
</body>
</html>
