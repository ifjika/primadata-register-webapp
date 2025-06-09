@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Course Details - Prima Data Kursus</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&family=Raleway&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="course-details-page">
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <!-- <img src="{{ asset('assets/img/logo.png') }}" alt=""> -->
        <!-- <h1 class="sitename">PAKET KURSUS</h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="{{ route('courses') }}">Daftar Sekarang</a>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-15">
              <h1>Detail Paket Kursus</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <!-- Kiri: Gambar + deskripsi -->
          <div class="col-lg-8">
            <img src="{{ asset('storage/' . str_replace('\\', '/', $paket->gambar)) }}" class="img-fluid" alt="Gambar Paket">
            <h3>{{ $paket->nama_paket }} - {{ $paket->jurusan }}</h3>
            <p>{{ $paket->deskripsi }}</p>

            @if (!empty($paket->informasi_program))
            <h5 class="mt-4">Informasi Program:</h5>
            <ul class="check-list">
              @foreach (explode("\n", trim($paket->informasi_program)) as $info)
              <li>{{ trim($info) }}</li>
              @endforeach
            </ul>
            @endif

            @if (!empty($paket->materi))
            <h5 class="mt-4">Materi yang akan dipelajari:</h5>
            <ul class="check-list">
              @foreach (preg_split('/\r\n|\r|\n/', trim($paket->materi)) as $materi)
              <li>{{ trim($materi) }}</li>
              @endforeach
            </ul>
            @endif
          </div>

          <!-- Kanan: info tambahan -->
          <div class="col-lg-4">
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Durasi</h5>
              <p>{{ $paket->nama_paket }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Biaya</h5>
              <p>Rp. {{ number_format($paket->biaya, 0, ',', '.') }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Fasilitas</h5>
              <p>Include semua pada deskripsi</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Jadwal</h5>
              <p>{{ $paket->jadwal ?? '08.00 - 12.00' }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <center>
      <a class="btn-getstarted" href="{{ route('courses') }}">Daftar Sekarang</a>
    </center>
    <br>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
    </a>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
@endsection