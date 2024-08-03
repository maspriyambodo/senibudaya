@extends('landing.layouts.master')
@section('title', 'Home')
@section('content')
    <section class="wrapper bg-soft-primary" id="home">
        <div class="container pt-10 pt-lg-12 pt-xl-12 pt-xxl-10 pb-lg-10 pb-xl-10 pb-xxl-0">
            <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center text-center text-lg-start">
                <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="900">
                    <h1 class="display-1 mb-4 me-xl-5 mt-lg-n10">
                        <span class="text-primary">Eksplor</span>
                        <br class="" />
                        Seni Budaya Islam Di Indonesia
                    </h1>
                    <p class="lead fs-24 lh-sm mb-7 pe-xxl-15">Indonesia merupakan negara yang sangat kaya akan ragam seni Budaya Islam. Mulai dari seni suara, seni tari, tradisi, ritual, instrumen, gambar, lukisan, pahatan, tulisan dan lain sebagainya.</p>
                </div>
                <div class="col-10 col-md-7 mx-auto col-lg-6 col-xl-5 ms-xl-5">
                    <img class="img-fluid mb-n12 mb-md-n14 mb-lg-n19" src="{{ asset('landing/img/illustrations/3d11.png') }}" srcset="{{ asset('landing/img/illustrations/3d11@2x.png') }} 2x" data-cue="fadeIn" data-delay="300" alt="" />
                </div>
            </div>
        </div>
        <figure><img src="{{ asset('landing/img/photos/clouds.png') }}" alt=""></figure>
    </section>

    <section class="wrapper bg-white" id="about-us">
        <div class="container pt-15 pb-15">
            <div class="row gx-3 gy-10 align-items-center">
                <div class="col-lg-6">
                    <figure>
                        <img class="w-auto" src="/landing/img/illustrations/3d8.png" srcset="/landing/img/illustrations/3d8@2x.png 2x" alt="" />
                    </figure>
                </div>
                <div class="col-lg-5 ms-auto">
                    <h2 class="display-4 mb-3">About Us</h2>
                    <p class="lead fs-lg">Repositori Seni Budaya Islam Berbasis Digital adalah repositori berbagai tradisi keagamaan Islam yang ada di seluruh Indonesia. Repositori berbasis digital ini diharapkan dapat menghasilkan.</p>
                    <div class="row gy-6">
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <img src="/landing/img/icons/solid/lamp.svg" class="svg-inject icon-svg icon-svg-xs solid-mono text-grape me-4" alt="" />
                                </div>
                                <div>
                                    <h4 class="mb-1">Penyelamatan Kandungan Informasi</h4>
                                    <p class="mb-0">Pelamatan kandungan informasi dalam seni budaya Islam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <img src="/landing/img/icons/solid/bulb.svg" class="svg-inject icon-svg icon-svg-xs solid-mono text-grape me-4" alt="" />
                                </div>
                                <div>
                                    <h4 class="mb-1">Membuka Akses Masyarakat</h4>
                                    <p class="mb-0">Membuka dan memperluas akses masyarakat terhadap seni budaya Islam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <img src="/landing/img/icons/solid/puzzle.svg" class="svg-inject icon-svg icon-svg-xs solid-mono text-grape me-4" alt="" />
                                </div>
                                <div>
                                    <h4 class="mb-1">Referensi Pengembangan Ilmu</h4>
                                    <p class="mb-0">Menjadi bahan referensi bagi pengembangan ilmu pengetahuan dan teknologi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <img src="/landing/img/icons/solid/headphone.svg" class="svg-inject icon-svg icon-svg-xs solid-mono text-grape me-4" alt="" />
                                </div>
                                <div>
                                    <h4 class="mb-1">Nilai-Nilai Seni Budaya Islam</h4>
                                    <p class="mb-0">Nilai-nilai yang terkandung dalam seni budaya Islam seperti nilai moral, pendidikan, agama, dan lain-lain.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light" id="our-collections">
        <div class="container py-15 py-md-15">
            <div class="row">
                <div class="col-lg-12 col-xl-10 col-xxl-7 mx-auto text-center">
                    <i class="icn-flower text-leaf fs-30 opacity-25"></i>
                    <h2 class="display-5 text-center mt-2 mb-10">Our Collections</h2>
                </div>
            </div>
            <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0 text-center">
                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                    <div class="card shadow-lg">
                        <figure class="card-img-top">
                            <a href="{{ route('landing.show-collections', 'audio') }}">
                                <img src="/landing/img/icons/lineal/headphone.svg" class="svg-inject icon-svg icon-svg-lg text-primary" alt="" />
                            </a>
                        </figure>
                        <div class="card-body p-6">
                            <h3 class="fs-21 mb-0">Audio</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                    <div class="card shadow-lg">
                        <figure class="card-img-top">
                            <a href="{{ route('landing.show-collections', 'video') }}">
                                <img src="/landing/img/icons/lineal/video.svg" class="svg-inject icon-svg icon-svg-lg text-primary" alt="" />
                            </a>
                        </figure>
                        <div class="card-body p-6">
                            <h3 class="fs-21 mb-0">Video</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                    <div class="card shadow-lg">
                        <figure class="card-img-top">
                            <a href="{{ route('landing.show-collections', 'gambar') }}">
                                <img src="/landing/img/icons/lineal/pictures.svg" class="svg-inject icon-svg icon-svg-lg text-primary" alt="" />
                            </a>
                        </figure>
                        <div class="card-body p-6">
                            <h3 class="fs-21 mb-0">Gambar</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                    <div class="card shadow-lg">
                        <figure class="card-img-top">
                            <a href="{{ route('landing.show-collections', 'tulisan') }}">
                                <img src="/landing/img/icons/lineal/files.svg" class="svg-inject icon-svg icon-svg-lg text-primary" alt="" />
                            </a>
                        </figure>
                        <div class="card-body p-6">
                            <h3 class="fs-21 mb-0">Tulisan</h3>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
