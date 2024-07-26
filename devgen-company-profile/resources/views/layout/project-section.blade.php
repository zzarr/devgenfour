<section class="projects-section pt-100 pb-100" id="project-section">
    <div class="container-fluid">
        <div class="section-title">
            <h2>Projects</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incidiunt labore et dolore magna
                aliqua. Quis ipsum suspendisse ultrices gravida.
            </p>
            <div class="bar"></div>
        </div>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-lg-3 p-0">
                    <div class="single-projects two">
                        <div class="projects-image">
                            <img src="{{ asset($project->thumbnail) }}"
                                style="width: 100%; height: 200px; object-fit: cover;">
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
</section>
