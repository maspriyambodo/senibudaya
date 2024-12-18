<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Repositori Seni Budaya Islam</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #e7efe5;
            }

            .hero-section {
                position: relative;
                padding: 2rem 1rem;
            }

            .background-image {
                height: 100vh; /* Full height berdasarkan viewport */
                width: 100vw; /* Full width berdasarkan viewport */
                background-image: url('{{asset("images/bgg14.png");}}'); /* Ganti dengan URL gambar Anda */
                background-size: cover; /* Gambar akan di-scale untuk menutupi div */
                background-position: center; /* Fokus gambar di tengah */
                background-repeat: no-repeat; /* Mencegah pengulangan gambar */
                position: absolute;
            }

            .hero-section .content {
                position: relative;
                z-index: 1;
            }

            .hero-section .explore-title {
                color: #4a806a;
                font-weight: bold;
            }

            .hero-section .main-title {
                font-size: 2.5rem;
                font-weight: bold;
                line-height: 1.2;
            }

            .hero-section .sub-text {
                color: #6c757d;
            }

            .hero-section .cta-button {
                background-color: #4a806a;
                color: white;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 5px;
            }

            .hero-section .placeholder-input {
                width: 100%;
                border-radius: 5px;
                padding: 0.5rem;
            }

            .image-section {
                position: relative;
            }

            .image-section .main-image {
                position: relative;
                z-index: 1;
                width: 90%;
                height: auto;
            }

            .info-badge {
                background-color: #e8f7ed;
                border-radius: 5px;
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
                color: #4a806a;
                position: absolute;
                top: 20%;
                right: 10%;
                z-index: 2;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid hero-section background-image">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <div class="container">
                    <!-- Brand/Logo -->
                    <a class="navbar-brand" href="#" style="font-size: 18px;">
                        <img src="{{ asset('images/logo_kemenag3.png'); }}" alt="logo"  width="40" height="40" class="d-inline-block"/>
                        <span class="clearfix" style="padding:0px 0px 0px 10px;">Repositori Seni Budaya Islam</span>
                    </a>
                    <!-- Toggle button for mobile -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Navbar Links -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('landing.show-collection-detail', 'about-us') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('landing.home') }}" data-scroll-to="#our-collections">Our Collection</a>
                            </li>
                            @auth
                            @if(auth()->user()->id_group == 5)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('form-pengajuan.create') }}" data-scroll-to="#our-collections">Form Pengajuan</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}" data-scroll-to="#our-collections">Dashboard</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" data-scroll-to="#our-collections">Login</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="clearfix" style="margin-top: 10%;"></div>
                <div class="row align-items-center">
                    <div class="col-md-6 content">
                        <h4 class="explore-title">EKSPLOR</h4>
                        <h1 class="main-title">SENI BUDAYA ISLAM DI INDONESIA</h1>
                        <p class="sub-text text-black">
                            Indonesia merupakan negara yang sangat kaya akan ragam Seni Budaya Islam. Mulai dari seni suara,
                            seni tari, tradisi, ritual, instrumen, gambar, lukisan, pahatan, tulisan dan lain sebagainya.
                        </p>
                        <form class="search-form" method="GET" action="{{ route('landing.search') }}">
                            <input type="text" class="placeholder-input form-control" placeholder="Cari..." name="q" value="{{ request('search') }}">
                        </form>
                        <h1 class="mt-3">Kementerian Agama RI</h1>
                    </div>
                    <div class="col-md-6 image-section text-center">
                        <img src="{{ asset('images/person.png'); }}" alt="Seni Budaya Islam" class="main-image"/>
                        <button class="cta-button">Lestarikan Seni Budaya Islam</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
