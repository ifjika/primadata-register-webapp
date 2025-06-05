@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Prima Data Kursus</title>
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

<body class="index-page">

    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl position-relative d-flex align-items-center pt-100">

            <!-- <a href="index.html" class="logo d-flex align-items-center me-auto"> -->
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <!-- <h1 class="sitename">LKP Prima Data</h1> -->
            <!-- </a> -->

            <nav id="navmenu" class="navmenu">
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- <a class="btn-getstarted" href="{{ route('courses')}}">Daftar Sekarang</a> -->

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->

        <section id="hero" class="hero section">

            <img src="assets/img/hero-bg3.jpg" alt="" data-aos="fade-in">

            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="100">Kursus Komputer<br>Bersertifikasi BNSP dan LSK-TIK</h2>
                <p data-aos="fade-up" data-aos-delay="200">Unggul Teknologi, Muda Berkarya</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{route('courses')}}" class="btn-get-started">Daftar Sekarang</a>
                </div>
            </div>

        </section> <!--Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Keunggulan LKP Prima Data</h3>
                        <p class="fst-italic">
                            LKP Prima Data merupakan Lembaga Kursus dan Pelatihan Komputer yang bersertifikasi dan sudah terakreditasi dari BAN-PNF dan LA LPK.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Instruktur berpengalaman dibidangnya dan sudah bersertifikasi dari BNSP dan LSK-TIK</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Materi pembelajaran sesuai dengan kebutuhan industri berdasarkan SKKNI KEMNAKER</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Lembaga kursus memiliki TUK-TIK (Tempat Uji Kompetensi) LSK TIK</span></li>
                        </ul>
                        <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section>
        <!-- About Section -->

        <!-- Counts Section -->
        <section id="counts" class="section counts light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="2652" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Peserta Kursus</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Lulusan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kegiatan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="9" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Instruktur</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Counts Section -->

        <!-- Why Us Section -->
        <section id="why-us" class="section why-us">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box">
                            <h3>Kenapa harus memilih LKP Prima Data?</h3>
                            <div align="justify">
                                <p>
                                    LKP Prima Data merupakan Lembaga Kursus Komputer berdiri sejak tahun 1997. Lembaga ini sudah memiliki NPSN, VIN dari Kemnaker, Izin dari Kemdikbudristek RI serta sudah terakreditasi B dari BAN PNF dan LA LPK.
                                    Lembaga ini juga memiliki TUK-TIK (tempat uji kompetensi) LSK TIK. Instruktur yang mengajar sudah berpengalaman di bidang nya dan bersertifikasi. Kursus di LKP Prima Data sangat nyaman karena di fasilitasi WIFI Area,
                                    parkir luas, kelas Full AC dan terletak di pusat kota.
                                </p>
                            </div>
                            <!-- <div class="text-center">
                                <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
                            </div> -->
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>Terakreditasi</h4>
                                    <p>Akreditasi B dari BAN PNF dan LA LPK</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>VIN Kemnaker</h4>
                                    <p>Memiliki VIN dari Kemnaker dan izin dari Kemnaker. Memiliki izin dari Kemdikbudristek RI</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>TUK-TIK</h4>
                                    <p>Memiliki TUK-TIK (Tempat Uji Kompetensi Teknologi Informasi dan Komunikasi) dari LSK</p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Why Us Section -->

        <!-- Features Section -->
        <h1>
            <center>Mitra Kerja Sama</center>
        </h1>
        <section id="features" class="features section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="features-item">
                            <i class="bi bi-eye" style="color: #ffbb2c;"></i>
                            <h3><a href="" class="stretched-link">PT. Kunango Jantan</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="features-item">
                            <i class="bi bi-infinity" style="color: #5578ff;"></i>
                            <h3><a href="" class="stretched-link">PT. Tjahaja Baru Agri</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="features-item">
                            <i class="bi bi-mortarboard" style="color: #e80368;"></i>
                            <h3><a href="" class="stretched-link"></a>Politeknik Negeri Padang</h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="features-item">
                            <i class="bi bi-nut" style="color: #e361ff;"></i>
                            <h3><a href="" class="stretched-link">PT. Surya Persada Erasindo</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="features-item">
                            <i class="bi bi-shuffle" style="color: #47aeff;"></i>
                            <h3><a href="" class="stretched-link">PT. Sentral Theta Jaya</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="features-item">
                            <i class="bi bi-star" style="color: #ffa76e;"></i>
                            <h3><a href="" class="stretched-link">RCM Print</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="features-item">
                            <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
                            <h3><a href="" class="stretched-link">Sate Manangkabau</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
                        <div class="features-item">
                            <i class="bi bi-camera-video" style="color: #4233ff;"></i>
                            <h3><a href="" class="stretched-link">J-Bross Computer</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
                        <div class="features-item">
                            <i class="bi bi-command" style="color: #b2904f;"></i>
                            <h3><a href="" class="stretched-link">Politeknik LP3i</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
                        <div class="features-item">
                            <i class="bi bi-dribbble" style="color: #b20969;"></i>
                            <h3><a href="" class="stretched-link">CV. Mediatamaweb Indonesia</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
                        <div class="features-item">
                            <i class="bi bi-activity" style="color: #ff5828;"></i>
                            <h3><a href="" class="stretched-link">Universitas Muhammadaiyah Sumatera Barat</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
                        <div class="features-item">
                            <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
                            <h3><a href="" class="stretched-link">Otoritas Bandar Udara Minangkabau</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Courses Section -->
        <section id="courses" class="courses section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Paket Kursus</h2>
                <p>Paling diminati</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a href="course-details.html">
                                        <p class="category">Administrasi Bisnis</p>
                                    </a>
                                    <p class="price">Rp. 4.800.000</p>
                                </div>
                                <h3>Paket Kelas 6 Bulan</h3>
                                <ul class="check-list">
                                    <li>Kursus selama 5 bulan, magang 1 bulan</li>
                                    <li>Senin s.d Jumat</li>
                                    <li>Jadwal : 08.15 s.d 12.00</li>
                                    <li>Bersertifikat</li>
                                </ul>
                                <h3><b>
                                        <p class="description">Materi yang akan dipelajari :</p>
                                    </b></h3>
                                <ul class="check-list">
                                    <li>Computer Administrasi</li>
                                    <li>Speed Typing</li>
                                    <li>Desain Grafis</li>
                                    <li>Digital Marketing</li>
                                    <li>Akuntansi Dasar dan Perpajakan</li>
                                    <li>Bahasa Inggris</li>
                                    <li>Kesekretariatan</li>
                                    <li>Motivasi dan Pengembangan Diri</li>
                                    <li>Uji Kompetensi CLCP</li>
                                </ul>
                            </div>
                        </div>
                    </div> <!--End Course Item -->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a href="course-details.html">
                                        <p class="category">APDIG</p>
                                    </a>
                                    <p class="price">Rp. 3.500.000</p>
                                </div>
                                <h3>Paket Kelas 3 Bulan</h3>
                                <ul class="check-list">
                                    <li>Kursus selama 3 bulan</li>
                                    <li>Senin s.d Jumat</li>
                                    <li>Jadwal : 08.15 s.d 12.00</li>
                                    <li>Bersertifikat</li>
                                </ul>
                                <h3><b>
                                        <p class="description">Materi yang akan dipelajari :</p>
                                    </b></h3>
                                <ul class="check-list">
                                    <li>Computer Administrasi</li>
                                    <li>Speed Typing</li>
                                    <li>Desain Grafis</li>
                                    <li>Digital Marketing</li>
                                    <li>Motivasi dan Pengembangan Diri</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Course Item-->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a href="course-details.php">
                                        <p class="category">Administrasi Perkantoran</p>
                                    </a>
                                    <p class="price">Rp. 1.400.000</p>
                                </div>
                                <h3>Reguler/Private</h3>
                            </div>
                            <ul class="check-list">
                                <li>16x Pertemuan (1x pertemuan 2 jam)</li>
                                <li>Senin s.d Jumat</li>
                                <li>Jadwal Fleksibel : 08.15, 10.00 dan 14.00</li>
                                <li>Bersertifikat</li>
                            </ul>
                            <div align="justify">
                                <p class="description">Mahir dalam bidang Perkantoran pembuatan surat, menguasai rumus excel, kreasi persentase menarik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Course Item-->
            </div>
            </div>
        </section><!-- /Courses Section -->

    </main>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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