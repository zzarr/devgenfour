<section class="footer-section pt-100 pb-70" id="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div>
                    <img src="{{ asset('' . $appSetting->logo) }}" style="width: 80%; height: auto;" class="wow zoomIn"
                        data-wow-delay="0.6s" alt="image" />
                </div>
            </div>
            <div class="col-md-4">
                <h5> Contact Us</h5>

                @php
                    $phoneNumber = $appSetting->no_contact;
                    if (substr($phoneNumber, 0, 1) === '0') {
                        $phoneNumber = '+62' . substr($phoneNumber, 1);
                    }
                @endphp
                <p><i class="flaticon-phone-call"></i> Phone: {{ $phoneNumber }}</p>
                <p><i class="flaticon-envelope"></i> Email: {{ $appSetting->email }}</p>
                <p><i class="flaticon-pin"></i> Address: {{ $appSetting->alamat }}</p>

            </div>
            <div class="col-md-3">
                <h5>Follow Us</h5>
                <a href="{{ $appSetting->instagram }}" target="_blank" class="text-black"><i
                        class="ti ti-brand-instagram"></i> instagram</a>
            </div>
            <div class="col-md-3">
                <h5>Our Location</h5>
                
                <div id="map" style="height: 150px; width: 75%;"></div>
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

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var coordinat = "{{ $appSetting->gmap_coordinat }}";
    var coordinates = coordinat.split(','); 
    var latitude = parseFloat(coordinates[0].trim());
    var longitude = parseFloat(coordinates[1].trim());
    var map = L.map('map').setView([latitude, longitude], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var marker = L.marker([latitude, longitude]).addTo(map)
        .openPopup();
    marker.on('click', function(e) {
        window.open(`https://www.google.com/maps?q=${latitude},${longitude}`, '_blank');
    });
</script>

