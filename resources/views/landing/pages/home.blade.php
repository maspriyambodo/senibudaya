@extends('landing.layouts.master')
@section('content')
    <section>
        <div class="axil-banner banner-style-1 bg-color-grey">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="inner">
                            <h1 class="title">EKSPLOR<br>SENI BUDAYA ISLAM<br>DI INDONESIA</h1>
                            <p class="description">Indonesia merupakan negara yang sangat kaya akan ragam seni Budaya Islam.
                                Mulai dari seni suara, seni tari, tradisi, ritual, instrumen, gambar, lukisan, pahatan,
                                tulisan
                                dan lain sebagainya.</p>

                            <form action="#" class="axil-search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari">
                                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                </div>
                            </form>

                            <div class="author-info mt-4">
                                <h6>Kementerian Agama RI</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt_md--40 mt_sm--40">
                        <div class="banner-thumbnail text-center">
                            <img src="{{ asset('landing/images/home/image-1.png') }}" alt="Banner Image" class="w-100">
                        </div>
                        <div class="mt-4 text-center">
                            <a href="#" class="axil-button button-rounded btn-primary">Lestarikan Seni Budaya
                                Islam</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="axil-about-us-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-us-content">
                            <h1 class="title">ABOUT US</h1>
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
                            <a href="{{ route('landing.about-us') }}" class="axil-button button-rounded btn-primary">Selengkapnya</a>
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
    </section>

    <section>
        <div class="axil-more-stories-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row align-items-center mb--30">
                    <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                        <div class="section-title">
                            <h2 class="title">Our Collections</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="post-details.html">
                                    <img src="{{ asset('landing/images/our-collections/headphones.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="post-details.html" tabindex="0"><span>Audio</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="post-details.html">
                                    <img src="{{ asset('landing/images/our-collections/tutorial.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="post-details.html" tabindex="0"><span>Video</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="post-details.html">
                                    <img src="{{ asset('landing/images/our-collections/burst.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="post-details.html" tabindex="0"><span>Gambar</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="post-thumbnail">
                                <a href="post-details.html">
                                    <img src="{{ asset('landing/images/our-collections/papers.png') }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <a class="axil-button button-rounded" href="post-details.html" tabindex="0"><span>Tulisan</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
