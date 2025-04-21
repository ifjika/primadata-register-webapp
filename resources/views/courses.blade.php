@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Courses - Prima Data Kursus</title>
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

<body class="courses-page">

    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <!-- <h1 class="sitename">PAKET KURSUS</h1> -->
            </a>

            <nav id="navmenu" class="navmenu">
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-15">
                            <h1>Paket Kursus LKP Prima Data<br></h1>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Courses Section -->
        <section id="courses" class="courses section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">Administrasi Perkantoran</p>
                                    <p class="price">Rp. 1.400.000</p>
                                </div>
                                <h3><a href="course-details.html">Administrasi Perkantoran</a></h3>
                                    <p class="description">Kursus selama 16x Pertemuan, durasi 1x pertemuan 2 jam. Pendaftaran setiap jam kerja. Jadwal Senin s.d Jum'at (bisa disesuaikan).
                                    Mahir dalam bidang Perkantoran pembuatan surat, menguasai rumus excel, kreasi persentase menarik</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-3.png" class="img-fluid" alt="">
                                        <a href="" class="trainer-link">Belin Heyo Fathia</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- End Course Item-->

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                                <div class="course-item">
                                    <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="category">Desain</p>
                                        <p class="price">Rp. 2.100.000</p>
                                    </div>
                                    <h3><a href="course-details.html">Desain Grafis</a></h3>
                                        <p class="description">Kursus selama 16x Pertemuan, durasi 1x pertemuan 2 jam. Pendaftaran setiap jam kerja. Jadwal Senin s.d Jum'at (bisa disesuaikan).
                                        Desain menggunakan CorelDraw fokus dibidang percetakan dan platfom sosial media.</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-2.png" class="img-fluid" alt="">
                                        <a href="" class="trainer-link">Lora Nining Purwanti</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- End Course Item-->

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                                <div class="course-item">
                                <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">AutoCAD</p>
                                    <p class="price">Rp. 2.100.000</p>
                                    </div>

                                    <h3><a href="course-details.html">AutoCAD 3 Dimensi</a></h3>
                                    <p class="description">Kursus selama 16x Pertemuan, durasi 1x pertemuan 2 jam. Pendaftaran setiap jam kerja. Jadwal Senin s.d Sabtu (bisa disesuaikan).
                                    Fokus dalam teknik pembuatan gambar desain bangunan, mesin, peta, elektro, utilitas, dan instalasi</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-6.jpg" class="img-fluid" alt="">
                                        <a href="" class="trainer-link">Aulia Rizki Alda, ST.MT</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- End Course Item-->
                
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course/course-4.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">Web Programming</p>
                                    <p class="price">Rp. 2.800.000</p>
                                </div>
                                <h3><a href="course-details.html">Web Programming</a></h3>
                                    <p class="description">Kursus selama 24x Pertemuan, durasi 1x pertemuan 2 jam. Pendaftaran setiap jam kerja. Jadwal Senin s.d Jum'at (bisa disesuaikan).
                                    Bertujuan pembuatan website, aplikasi berbasis web</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-4.jpeg" class="img-fluid" alt="">
                                        <a href="" class="trainer-link">Doni Rahma R, S.Kom</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- End Course Item-->

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course/course-5.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">Video Editing</p>
                                    <p class="price">Rp. 2.100.000</p>
                                </div>
                                <h3><a href="course-details.html">Video Editing</a></h3>
                                    <p class="description">Kursus selama 14x Pertemuan, durasi 1x pertemuan 2 jam. Pendaftaran setiap jam kerja. Jadwal Senin s.d Jum'at (bisa disesuaikan).
                                    Mahir dalam pembuatan Content, manipulasi, vlog youtube</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/team/team-9.jpg" class="img-fluid" alt="">
                                        <a href="" class="trainer-link">Robbi Maulana, S.Pd</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- End Course Item-->

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="assets/img/course/course-6.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">Digital Marketing</p>
                                    <p class="price">Rp. 1.400.000</p>
                                </div>
                                <h3><a href="course-details.html">Digital Marketing</a></h3>
                                    <p class="description">Kursus selama 16x Pertemuan, durasi 1x pertemuan 2 jam. Pendaftaran setiap jam kerja. Jadwal Senin s.d Jum'at (bisa disesuaikan).
                                    Fokus marketing melalui digital dengan teknologi masa kini.</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-3.png" class="img-fluid" alt="">
                                        <a href="" class="trainer-link">Belin Heyo Fathia</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- End Course Item-->
                            <br>
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