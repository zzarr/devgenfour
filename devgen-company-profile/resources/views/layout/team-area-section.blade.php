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
