<!-- resources/views/project.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project['title'] }}</title>
    <!-- Tambahkan link Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <div class="container">
        <div class="project-header">
            <h1>Projects</h1>
            <nav>
                <a href="{{ url('/home') }}">Home</a>
                <span>&gt;</span>
                <a href=#>Single Projects</a>
            </nav>
        </div>

        <div class="project-images">
            <div>
                <img src="{{ $project['image1'] }}" alt="Project Image 1" class="img-fluid">
            </div>
            <div>
                <img src="{{ $project['image2'] }}" alt="Project Image 2" class="img-fluid">
            </div>
        </div>

        <div class="project-details">
            <h2>{{ $project['title'] }}</h2>
            <p>{{ $project['description'] }}</p>
            <ul>
                <li><i class="fas fa-check"></i> Core Development: No fake products and services. The customer is king; their lives and needs are the inspiration.</li>
                <li><i class="fas fa-check"></i> Define Your Choices: No fake products and services. The customer is king; their lives and needs are the inspiration.</li>
            </ul>
            <p>Nostrud no eos, no impedit dissentias mea...</p>
            <div class="project-meta">
                <p><strong>Client:</strong> {{ $project['client'] }}</p>
                <p><strong>Category:</strong> {{ $project['category'] }}</p>
                <p><strong>Date:</strong> {{ $project['date'] }}</p>
                <div class="project-share">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            <a href="#" class="btn">Live Preview</a>
        </div>
    </div>
</body>
</html>
