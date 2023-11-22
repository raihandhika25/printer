<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Toko Printer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet"> <!--=======================================================* Template
    Name: Vesperr * Updated: Sep 18 2023 with Bootstrap v5.3.2 * Template URL:
    https://bootstrapmade.com/vesperr-free-bootstrap-template/ * Author: BootstrapMade.com * License:
    https://bootstrapmade.com/license/========================================================-->
</head>

<body>
    <!--=======Header=======-->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center
    justify-content-between">
            <div class="logo">
                <h1><a href="index.html">Toko Printer</a> </h1> <!-- Uncomment below if
    you prefer to use an image logo -->
                <!-- <a href=" index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li><a class="nav-link scrollto active" href="#produk">Produk</a></li>
                    @if(!Auth::check())
                    <li><a class="getstarted scrollto" href="/login">Login</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b class="text-primary">{{ Auth::user()->email}}</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="p-2 bg-info text-bold">Level: {{ Auth::user()->role}}</li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="p-2">
                                <a href="{{route('actionlogout')}}">
                                    <button class="btn btn-outline-success" type="submit">Log Out</button>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Cetak Kenanganmu Dengan Printer Kami</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Toko Printer Terbaik dan Berkualitas</h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="/login" class="btn-get-started scrollto">Ayo Gabung</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Zulfahrizal</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="https://rpl-tamsis2jakarta.webnode.page/">RPL Tamsis 2</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="/" class="scrollto">Home</a>
                        <a href="#produk" class="scrollto">Produk</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Use</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>