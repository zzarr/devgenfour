<section class="team-section pb-70" >
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
            @foreach ($team as $image)
            <div class="col-lg-3 ">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="{{ asset('team/' . $image->image)}}">
                    </div>

                    <div class="content">
                        <h3>{{ $image->name }}</h3>
                        <span><h3>{{ $image->jabatan }}</h3></span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4 shadow-sm text-center">
                    <div class="image">
                        <img src="img/team1.jpg" alt="image" />
                    </div>

                    <div class="content">
                        <h3>NAMA</h3>
                        <span>DIVISI</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
