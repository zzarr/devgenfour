<section class="footer-section pt-100 pb-70" id="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <img
                        src="{{ asset('' . $appSetting->logo) }}"
                        class="wow zoomIn"
                        data-wow-delay="0.6s"
                        alt="image"
                    />
                </div>
            </div>
            <div class="col-md-3">
                <h5>Contact Us</h5>
                @foreach ($numbers as $number)
                @php
                    $phoneNumber = $number->no_contact;
                    if (substr($phoneNumber, 0, 1) === '0') {
                        $phoneNumber = '+62' . substr($phoneNumber, 1);
                    }
                @endphp
                <p>Phone: {{ $phoneNumber }}</p>
                <p>Email: {{ $appSetting->email }}</p>
                @endforeach
            </div>
            <div class="col-md-3">
                <h5>Follow Us</h5>
                <a href="{{ $appSetting->instagram }}" target="_blank" class="text-black">instagram</a>
            </div>
            <div class="col-md-3">
                <h5>Our Location</h5>
                <p>{{ $appSetting->alamat }}</p>
            </div>
        </div>
    </div>
</section>
<!-- End Footer Area -->

<!-- Start Copy Right Area -->
<div class="copyright-area">
    <div class="container">
        <div class="copyright-area-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>
                        Copyright @
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{ $appSetting->name_app }} All Rights Reserved
                    </p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <ul>
                        <li>
                            <a href="terms-condition.html">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="privacy-policy.html">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
