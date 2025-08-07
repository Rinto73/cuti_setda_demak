<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SETDA - Pengajuan Cuti</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Questrial:wght@400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Devin
  * Template URL: https://bootstrapmade.com/devin-bootstrap-template/
  * Updated: Jul 23 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
    <div class="overlay">

        <header id="header" class="header d-flex align-items-left fixed-top">
            <img src="{{ asset('images/logo_demak.png') }}" class="logo" alt="" style="margin-left: 100px; width: 40px; height: auto;">
            <div class="container-fluid container-xm position-relative d-flex align-items-left justify-content-between">
                <h6>SETDA Kab. Demak<br>
                    Sistem Informasi Pengajuan Cuti
                </h6>
                <div>
                    <a href="/admin" class="btn btn-primary">Login</a>
                </div>

            </div>
        </header>
        <main class="main">

            <!-- Hero Section -->
            <section id="hero" class="hero section">

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hero-content">
                                <h1>SETDA <span>Kab. Demak</span></h1>
                                <h4>Sistem Informasi Pengajuan Cuti</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam.</p>
                                <div class="hero-actions justify-content-center justify-content-lg-start">
                                    <a href="/admin" class="btn-primary scrollto">Pengajuan Cuti</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-image">
                                <img src="{{ asset('images/illustration-28.webp') }}" class="img-fluid floating" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </section><!-- /Hero Section -->

            <!-- About Section -->
            <section id="about" class="about section">

                <div class="container">

                    <div class="row align-items-center">

                        <!-- Image Column -->
                        <div class="col-lg-6">
                            <div class="about-image">
                                <img src="{{ asset('images/illustration-14.webp') }}" alt="About" class="img-fluid">
                            </div>
                        </div>

                        <!-- Content Column -->
                        <div class="col-lg-6">
                            <div class="content">
                                <h2>Informasi Pengajuan Cuti Pegawai</h2>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                @php
                                use App\Models\Pegawai;
                                use App\Models\Cuti;

                                $jumlahPegawai = Pegawai::count();
                                $totalPengajuan = Cuti::count();
                                $disetujui = Cuti::where('status', 'disetujui')->count();
                                $ditolak = Cuti::where('status', 'ditolak')->count();
                                @endphp

                                <!-- Stats Row -->
                                <div class="stats-row">
                                    <div class="stat-item">
                                        <h3><span data-purecounter-start="0" data-purecounter-end="{{ $jumlahPegawai }}" data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                        <p>Jumlah Pegawai</p>
                                    </div>
                                    <div class="stat-item">
                                        <h3><span data-purecounter-start="0" data-purecounter-end="{{ $totalPengajuan }}" data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                        <p>Total Pengajuan Cuti</p>
                                    </div>
                                    <div class="stat-item">
                                        <h3><span data-purecounter-start="0" data-purecounter-end="{{ $disetujui }}" data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                        <p>Pengajuan Disetujui</p>
                                    </div>
                                    <div class="stat-item">
                                        <h3><span data-purecounter-start="0" data-purecounter-end="{{ $disetujui }}" data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                        <p>Pengajuan Ditolak</p>
                                    </div>
                                </div><!-- End Stats Row -->

                                <!-- CTA Button -->
                                <div class="cta-wrapper">
                                    <a href="/admin" class="btn-cta">
                                        <span>Discover Our Story</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </section><!-- /About Section -->

            <!-- Services Section -->
            <section id="services" class="services section">

                <!-- Section Title -->
                <div class="container section-title">
                    <h2>Layanan</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4">

                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="bi bi-palette"></i>
                                </div>
                                <h3>Cuti Tahunan</h3>
                                <p>Diberikan kepada ASN untuk istirahat tahunan, maksimal 12 hari kerja per tahun.</p>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="bi bi-code-slash"></i>
                                </div>
                                <h3>Cuti Besar</h3>
                                <p>Diberikan setiap 5 tahun sekali, maksimal 3 bulan. Hanya untuk PNS.</p>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="bi bi-megaphone"></i>
                                </div>
                                <h3>Cuti Sakit</h3>
                                <p>Memerlukan surat dokter sebagai dokumen pendukung.</p>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <h3>Cuti Melahirkan</h3>
                                <p>Diberikan kepada ASN perempuan yang melahirkan, maksimal 3 bulan.</p>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <h3>Cuti Karena Alasan Penting</h3>
                                <p>Misalnya keluarga meninggal, anggota keluarga sakit berat, Menikah, dll.</p>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <h3>Cuti di Luar Tanggungan Negara</h3>
                                <p>TDiberikan hanya dalam kondisi khusus dan disetujui pejabat tinggi.</p>
                            </div>
                        </div><!-- End Service Card -->

                    </div>
                </div>
            </section><!-- /Services Section -->
        </main>

        <footer id="footer" class="footer position-relative light-background">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>© <span>Copyright</span> <strong class="px-1 sitename">Bagian Umum Sekretariat Daerah Kabupaten Demak</strong> <span>All Rights Reserved</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>