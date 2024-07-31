<section class="choose-section pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Us</h2>
            <div class="bar"></div>
        </div>
        
        <div class="row align-items-center">
            @foreach($choose as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="choose-text">
                        <div class="icon">
                            
                            <img src="{{ asset('choose/'. $item->icon) }}" alt="{{ $item->title }}" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
                        </div>
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
