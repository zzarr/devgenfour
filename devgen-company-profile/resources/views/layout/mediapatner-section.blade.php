<div class="partner-section ptb-100">
    <div class="container">
        <div class="section-title">
        <h2>Partner</h2>
        </div>
        <div class="partner-slider owl-carousel owl-theme owl-centered">
            @foreach ($partners as $image)
            <div class="partner-item">
                <a href="#">
                    <img src="{{ asset('' . $image->image)}}">
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>


