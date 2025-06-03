@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Events - Prima Data Kursus</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="events-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <!-- <h1 class="sitename">Kegiatan</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="{{ route('courses')}}">Daftar Sekarang</a> -->

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-15">
              <h1>Kegiatan LKP Prima Data<br></h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Events Section -->
    <section id="events" class="events section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event1.jpg" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Sosialisai Sekolah</a></h5>
                <p class="fst-italic text-center">1-2 Februari 2024</p>
                <p class="card-text">Tim LKP Prima Data mengadakan sosialisasi di beberapa sekolah, yaitu SMA Negeri 1 Tarusan, SMA Negeri 2 Bayang hingga SMA Negeri 1 Lunang Silaut.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event2.jpg" class="card-img" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Juara 2 Lomba KKIN (Kompetisi Keterampilan Instruktur Nasional) Ke IX</a></h5>
                <p class="fst-italic text-center">5-9 Mei 2024, BBPVP Padang</p>
                <p class="card-text">Perwakilan dari LKP Prima Data atas nama Doni Rahma Retno, S.Kom mengikuti lomba bidang IT Solution For Bussiniess dan mendapatkan Juara 2. Lomba antar Instruktur se Indonesia yang dilaksanakan oleh Kemnaker di BBPVB Padang.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event3.jpg" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Pelatihan Instruktur Practical Office Advanced</a></h5>
                <p class="fst-italic text-center">26 Februari - 8 Maret 2024, BBPVP Medan</p>
                <p class="card-text">Upgrading Instruktur LKP Prima Data atas nama Lora Nining Purwanti kejuruan Teknologi Informasi dan Komunikasi. Kegiatan ini di adakan oleh Kementerian Ketenagakerjaan RI bertujuan untuk menambah skill dan sertifikasi mengajar materi Administrasi Perkantoran.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event4.jpg" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Pelatihan Metodologi Instruktur</a></h5>
                <p class="fst-italic text-center">11 - 22 Maret 2024, BBPVP Bandung</p>
                <p class="card-text">Pelatihan Metodologi Instruktur LKP Prima Data atas nama Belin Heyo Fathia kejuruan Teknologi Informasi dan Komunikasi. Kegiatan ini di adakan oleh Kementerian Ketenagakerjaan RI dilaksanakan di Bandung, Jawa Barat. Pelatihan ini bertujuan untuk sertifikasi mengajar.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event5.jpg" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Pelatihan Content Creator</a></h5>
                <p class="fst-italic text-center">5 - 10 Mei 2024, The ZHM Premier Hotel Padang</p>
                <p class="card-text">Pelatihan Content Creator Instruktur LKP Prima Data atas nama Belin Heyo Fathia. Kegiatan ini diadakan oleh DIT Bina Intala Kemdikbudristek RI.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event6.jpg" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Mahir Microsoft Office Excel</a></h5>
                <p class="fst-italic text-center">PT. Tjahaja Baru Agri</p>
                <p class="card-text">Staf PT. Thajaja Baru Agri mengikuti pelatihan mahir Microsoft Office Excel di LKP Prima Data yang di ampu oleh Instruktur atas nama Lora Nining Purwanti. Staf tersebut terdiri dari Manager, Sekretaris, Bendahara dan karyawan</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets\img\events\event7.jpg" alt="">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Workshop Visualisai</a></h5>
                <p class="fst-italic text-center">Otoritas Penerbangan Bandar Udara Internasional Minangkabau</p>
                <p class="card-text">Pelatihan AutoCAD 3 Dimensi di adakan di kantor Otoritas Bandar Udara Internasional Minangkabau, di ampu oleh Instruktur atas nama Aulia Riski Alda, ST.MT</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Events Section -->

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

@endsection