<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PictoGallery</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('/img/PI (3).png') ?>" rel="icon" type="image/png">



  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&family=Prata&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/template/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/template/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/template/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('/template/assets/vendor/aos/aos.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('/template/assets/css/main.css') ?>" rel="stylesheet">

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div style="display: flex; align-items: center; justify-content: flex-start;">
        <h1 style="font-family: 'Prata', serif; margin-right: 10px; color: white;">PI</h1>
        <p style="font-family: 'Open Sans', sans-serif; margin: 0; color: white; vertical-align: middle;">PictoGallery</p>
      </div>
      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('/landingpage#hero') ?>" class="active">Home</a></li>
          <li><a href="<?= base_url('/landingpage#about') ?>">About</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main id="main">
    <section id="hero" class="hero">
      <img src="<?= base_url('/img/2.jpg') ?>" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di PictoGallery</h2>
            <p data-aos="fade-up" data-aos-delay="200">unggah momen berharga anda</p>
          </div>
        </div>
      </div>
    </section>


    <section id="about" class="about">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">
          <div class="col-xl-5 content">
            <img class="mb-3" src="<?= base_url('/img/14.png') ?>" width="250px">
            <p>Selamat datang di PictoGallery, tempat di mana setiap momen berharga terabadikan dengan unik. Unggah foto anda, nikmati pengalaman tak terbayar, dan temukan keindahan desain website yang berbeda. </p>
            <a href="<?= base_url('/pictogallery/auth/login') ?>" class="read-more"><span>Masuk</span></a>
          </div>
          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-lightbulb"></i>
                  <h3>Tampilan </h3>
                  <p> Pengalaman unggah foto yang mudah dan tampilan desain yang berbeda</p>
                </div>
              </div>
              <div class="col-md-6 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-unlock"></i>
                  <h3>Kebebasan</h3>
                  <p>Nikmati kebebasan penuh! Unggah dan bagikan foto Anda tanpa biaya tambahan.</p>
                </div>
              </div>
              <div class="col-md-6 " data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-chat"></i>
                  <h3>Komentar</h3>
                  <p>Terlibatlah dalam interaksi tak terbatas dengan memberikan komentar pada unggahan pengguna lainnya.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Kecepatan </h3>
                  <p>Memastikan setiap klik dan muatan halaman berlangsung dengan cepat, memberikan Anda kemudahan dalam menikmati momen-momen visual tanpa hambatan </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>




  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <div style="display: flex; align-items: center; justify-content: flex-start;">
            <h1 style="font-family: 'Prata', serif; margin-right: 10px; ">PI</h1>
            <p style="font-family: 'Open Sans', sans-serif; margin: 0;  vertical-align: middle;">PictoGallery</p>
          </div>
          <p>This PictoGallery website makes it a new experience for you to upload photos</p>
          <div class="social-links d-flex mt-4">
            <a href="https://www.instagram.com/alifhmiysf/"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/in/ali-fahmi-yusuf-798883274/"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-7 col-md-12 footer-contact text-center text-md-end"> <!-- Updated class and added text-md-end -->
          <h4>Contact</h4>
          <p>Ali Fahmi Yusuf</p>
          <p>Yogyakarta, Indonesia</p>
          <p><strong>Email:</strong> <span>alifahmiyusuf631@gmail.com</span></p>
        </div>
      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1">Ali Fahmi Yusuf</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('/template/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?= base_url('/template/assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
  <script src="<?= base_url('/template/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?= base_url('/template/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
  <script src="<?= base_url('/template/assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?= base_url('/template/assets/vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('/template/assets/js/main.js') ?>"></script>

</body>

</html>