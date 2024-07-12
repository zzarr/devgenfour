<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DevGen Landing Page</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- Header Section -->
    <header>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#about-us">About Us</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero">
      <h1>Devgenfour</h1>
      <p>Solusi terbaik untuk pengembangan perangkat lunak Anda</p>
      <a href="#contact" class="btn">Contact Us</a>
    </section>

    <!-- Services Section -->
    <section id="services">
      <h2>Our Services</h2>
      <div class="service">
        <i class="icon-web-development"></i>
        <h3>Web Development</h3>
      </div>
      <div class="service">
        <i class="icon-mobile-app"></i>
        <h3>Mobile App Development</h3>
      </div>
      <div class="service">
        <i class="icon-digital-marketing"></i>
        <h3>Digital Marketing</h3>
      </div>
    </section>

    {{-- bagian saya why choose us --}}

    <!-- Projects Section -->
    <section id="projects">
      <h2>Our Projects</h2>
      <article class="project">
        <h3>Proyek A</h3>
        <p>Deskripsi proyek A.</p>
        <a href="#" class="btn">Detail</a>
      </article>
      <article class="project">
        <h3>Proyek B</h3>
        <p>Deskripsi proyek B.</p>
        <a href="#" class="btn">Detail</a>
      </article>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-choose-us">
      <h2>Why Choose Us</h2>
      <div class="reasons-container">
        <div class="reason">
          <i class="icon-quality"></i>
          <h3>Kualitas Terbaik</h3>
          <p>
            Kami berkomitmen untuk memberikan kualitas terbaik dalam setiap
            proyek yang kami kerjakan, memastikan kepuasan dan keberhasilan
            klien kami.
          </p>
        </div>
        <div class="reason">
          <i class="icon-innovation"></i>
          <h3>Inovasi Terdepan</h3>
          <p>
            Tim kami selalu berinovasi dengan teknologi terbaru untuk memberikan
            solusi yang modern dan efisien bagi kebutuhan bisnis Anda.
          </p>
        </div>
        <div class="reason">
          <i class="icon-support"></i>
          <h3>Dukungan 24/7</h3>
          <p>
            Kami menyediakan dukungan penuh 24/7 untuk memastikan semua
            pertanyaan dan masalah Anda teratasi dengan cepat dan efektif.
          </p>
        </div>
        <div class="reason">
          <i class="icon-experience"></i>
          <h3>Pengalaman Bertahun-tahun</h3>
          <p>
            Dengan bertahun-tahun pengalaman di industri, kami memiliki
            pengetahuan dan keterampilan untuk menangani proyek dari segala
            skala dan kompleksitas.
          </p>
        </div>
      </div>
    </section>

    <!-- Partners Section bagian saya-->
    <section id="partners">
      <h2>Our Partners</h2>
      <div class="partner-slider">
        <img src="image/patner1.png" alt="Partner 1" />
        <img src="image/patner2.png" alt="Partner 2" />
        <img src="image/patner3.png" alt="Partner 3" />
        <img src="image/patner4.png" alt="Partner 4" />
      </div>
    </section>

    <!-- Team Section -->
    <section id="team">
      <h2>Our Team</h2>
      <div class="team-member">
        <img src="team1.jpg" alt="Nama Anggota" />
        <h3>Nama Anggota</h3>
        <p>Divisi</p>
      </div>
      <div class="team-member">
        <img src="team2.jpg" alt="Nama Anggota" />
        <h3>Nama Anggota</h3>
        <p>Divisi</p>
      </div>
    </section>
    {{-- akhir bagian saya --}}

    <!-- Footer Section -->
    <footer>
      <img src="logo.png" alt="Logo Perusahaan" />
      <p>Alamat: Jl. Contoh No. 123, Jakarta</p>
      <p>Telepon: +62 812 3456 7890</p>
      <p>Email: info@devgen.com</p>
      <a href="https://www.instagram.com/devgen" target="_blank">Instagram</a>
    </footer>
  </body>
</html>
