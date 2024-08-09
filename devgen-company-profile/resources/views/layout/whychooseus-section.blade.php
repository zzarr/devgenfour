<section class="choose-section ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            <div class="bar"></div>
        </div>

        <div class="row align-items-center">
            <!-- Konten dinamis -->
            <div class="col-lg-8 col-md-6">
                <div class="choose-content-wrapper">
                    @foreach($choose as $item)
                        <div class="choose-content">
                            {{-- penambahan image --}}
                            <div class="icon">
                                <img src="{{ asset(''. $item->icon) }}" alt="{{ $item->title }}" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
                            </div>
                            <div class="text-content">
                                <h3>{{ $item->title }}</h3>
                                <p>{!! $item->description !!} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Gambar statis -->
            <div class="col-lg-4 col-md-6">
                <div class="choose-image">
                    <img src="assets/img/why-choose-us.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
