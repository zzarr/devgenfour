<section id="services-section" class="services-section bg-background pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>IT Agency Services</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incidiunt labore et dolore magna
                aliqua. Quis ipsum suspendisse ultrices gravida.
            </p>
            <div class="bar"></div>
        </div>

        <div class="row">
            @foreach ($services as $services)
            <div class="col-lg-4 col-md-6">
                <div class="single-services">

                        <div class="icon bg-deb0fe">
                            <img src="{{ asset('services/' . $services->icon) }}" style="width: 40%; height: 40%;">
                        </div>

                    <h3>{{ $services->title }}</h3>
                    <p>{!! $services->description !!}</p>



                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="default-shape">
        <div class="shape-1">
            <img src="assets/img/shape/4.png" alt="image" />
        </div>

        <div class="shape-2 rotateme">
            <img src="assets/img/shape/5.svg" alt="image" />
        </div>

        <div class="shape-3">
            <img src="assets/img/shape/6.svg" alt="image" />
        </div>

        <div class="shape-4">
            <img src="assets/img/shape/7.png" alt="image" />
        </div>

        <div class="shape-5">
            <img src="assets/img/shape/8.png" alt="image" />
        </div>
    </div>
</section>
