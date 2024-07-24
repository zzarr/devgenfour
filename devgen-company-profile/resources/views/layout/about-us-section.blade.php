<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>About</h2>
                    <ul>
                        <li>
                        <a href="{{ url('/home') }}" class="nav-link">home</a>
                        </li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="about-section ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="about-image">
                    <img src="{{ asset('img/' . $aboutUs->image) }}" alt="Image"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-tab">
                    <h2>{{ $aboutUs->title }}</h2>
                    <div class="bar"></div>
                    <p>{{ $aboutUs->description }}</p>
                    <a class="default-btn" href="#">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>