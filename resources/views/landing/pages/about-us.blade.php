@extends('landing.layouts.master')

@section('content')
    <div class="axil-about-us-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us-content">
                        <h2 class="title">ABOUT US</h2>
                        <p class="description">
                            Repositori Seni Budaya Islam Berbasis Digital
                            adalah repositori berbagai tradisi keagamaan
                            Islam yang ada di seluruh Indonesia. Repositori
                            berbasis digital ini diharapkan dapat
                            menghasilkan; 1) Penyelamatan kandungan
                            informasi dalam seni budaya Islam 2) Membuka
                            dan memperluas akses masyarakat terhadap
                            seni budaya Islam 3) Menjadi bahan referensi
                            bagi pengembangan ilmu pengetahuan dan
                            teknologi dari nilai-nilai yang terkandung dalam
                            seni budaya Islam seperti nilai moral,
                            pendidikan, agama, dan lain-lain.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-image">
                        <img src="{{ asset('landing/images/about-us/image.jpg') }}" alt="About Us Image" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
