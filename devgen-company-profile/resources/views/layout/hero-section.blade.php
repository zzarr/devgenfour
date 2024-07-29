<div class="main-banner-area-two">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="main-banner-content">
                            <h1>{{ $appSetting->name_app }}</h1>
                            <p>
                                {!! $appSetting->desc !!} 
                            </p>
                            @php
                                // Mengambil nomor telepon dari pengaturan aplikasi
                                $phoneNumber = $appSetting->no_contact;
                                // Mengganti nomor telepon yang dimulai dengan '0' menjadi format internasional '+62'
                                if (substr($phoneNumber, 0, 1) === '0') {
                                    $phoneNumber = '+62' . substr($phoneNumber, 1);
                                }
                            @endphp
                            <div class="banner-btn">
                                <a href="https://wa.me/{{ $phoneNumber }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda" class="optional-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <img
                                src="{{ asset('' . $appSetting->logo) }}"
                                class="wow zoomIn"
                                data-wow-delay="0.6s"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-shape">
        <img
            src="assets/img/home-two/cloud.png"
            class="white-image"
            alt="image"
        />
        <img
            src="assets/img/home-two/cloud-2.png"
            class="black-image"
            alt="image"
        />
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
</div>
