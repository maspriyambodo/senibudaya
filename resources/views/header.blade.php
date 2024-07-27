<!DOCTYPE html>
@if (request()->is('/'))
  <html lang="id, in" style="overflow: hidden;">
      @else
      <html lang="id, in">
@endif
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content-type="ie=edge" />
        <title>{{ $param->title }}{{ empty($title) ? '' : ' - '.$title }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="{{ $param->author }}" />
        <meta name="keywords" content="{{ $param->keywords }}{{ empty($title) ? '' : ', '.$title }}" />
        @if(isset($detail->keterangan_berita))
        <meta name="description" content="{{ mb_strimwidth($detail->keterangan_berita, 0, 137, '.') }}" />
        @elseif(!isset($detail->keterangan_berita))
        <meta name="description" content="{{ $param->description }}" />
        @else
        <meta property="og:description" content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? mb_strimwidth($detail->detail_konsultasi,0,137,'...') : mb_strimwidth($detail->{'keterangan_'.strtolower($kategori)},0,137,'.')) : (empty($title) ? '' : $title.' - ').$param->description }}" />
        @endif
        <meta http-equiv="Content-type" content-type="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="p:domain_verify" content="420a65ff1d90e8a916aab11bfb5b7612" />
        <meta property="og:locale" content="id_ID" />
        <meta property="og:url" content="{{ Request::url() }}" />
        <meta property="og:type" content="{{ (isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan'))) ? 'article' : 'website'}}" />
        <meta property="og:title" content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? $detail->judul_konsultasi : $detail->{'nama_'.strtolower($kategori)}) : $param->title.(empty($title) ? '' : ' - '.$title) }}" />
        <meta property="og:image" content="{{ asset('images/'.(isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','bimbingan')) ? strtolower($kategori).'/'.$detail->{'image_'.strtolower($kategori)} : 'favicon.ico')) }}" />
        @if(isset($detail->keterangan_berita))
        <meta name="description" content="{{ mb_strimwidth($detail->keterangan_berita, 0, 137, '.') }}" />
        @elseif(!isset($detail->keterangan_berita))
        <meta name="description" content="{{ $param->description }}" />
        @else
        <meta property="og:description" content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? mb_strimwidth($detail->detail_konsultasi,0,137,'...') : mb_strimwidth($detail->{'keterangan_'.strtolower($kategori)},0,137,'.')) : (empty($title) ? '' : $title.' - ').$param->description }}" />
        @endif
        <meta property="og:site_name" content="{{ $param->title }}" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:image:width" content="650" />
        <meta property="og:image:height" content="366" />
        <meta name="robots" content="all" />
        <meta name="googlebot" content="index, follow" />
        <meta name="googlebot-news" content="index, follow" />
        <meta content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? substr($detail->detail_konsultasi,0,250).'...' : $detail->{'keterangan_'.strtolower($kategori)}) : (empty($title) ? '' : $title.' - ').$param->description }}" itemprop="headline" />
        <meta name="keywords" content="berita hari ini, berita terkini, berita terbaru, info berita, keagamaan, moderat, beragama, kemenag" itemprop="keywords" />
        <meta name="thumbnailUrl" content="{{ asset('images/'.(isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','bimbingan')) ? strtolower($kategori).'/'.$detail->{'image_'.strtolower($kategori)} : 'favicon.ico')) }}" itemprop="thumbnailUrl" />
        <meta name="contenttype" content="wpkanal" />
        <meta name="kanalid" content="2" />
        <meta name="platform" content="desktop" />
        <meta content="{{ Request::url() }}" itemprop="url" />
        <meta name="google-site-verification" content="rtCXc3SCO9qnd4L3xxz6XaEUQKdrLMa_lMH5WvR1QSk" />
        <link rel="canonical" href="{{ Request::url() }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@BimasIslam" />
        <meta name="twitter:site:id" content="@BimasIslam" />
        <meta name="twitter:creator" content="@BimasIslam" />
        <meta name="twitter:description" content="berita hari ini, berita terkini, berita terbaru, info berita, keagamaan, moderat, beragama, kemenag" />
        <meta name="twitter:image" content="{{ asset('images/'.(isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','bimbingan')) ? strtolower($kategori).'/'.$detail->{'image_'.strtolower($kategori)} : 'favicon.ico')) }}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vendor/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vendor/slick.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vendor/slick-theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vendor/base.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/plugins/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <link href="{{ asset('fonts/poppins.css') }}" rel="stylesheet" type="text/css"/>
        @if (request()->is('/'))
        <style>
            .main-banner{
                margin-top: -15%;
            }
            .hero-section {
                height: 100vh;
                background: url('{{ asset("images/bg-fix.jpg") }}') no-repeat center center;
                background-size: cover;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .transparent-card {
                border: 1px solid #979797;
                box-shadow: 0 5px 3px 0 rgba(90, 90, 90,0.6);
                background: rgba(255, 255, 255, 0.7);
                border-radius: 24px;
            }
            .title-color1{
                color: #f6b600;
            }
        </style>
        @endif
        {!! ReCaptcha::htmlScriptTagJsApi() !!}
        <script>
            var app_url = "{{ url('') }}";
        </script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="mouse-cursor cursor-outer"></div>
            <div class="mouse-cursor cursor-inner"></div>
            <header class="header axil-header header-style-6 header-light header-sticky ">
                <div id="nav" class="header-bottom">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-7 col-12">
                            <div class="mainmenu-wrapper d-none d-xl-block">
                                <nav class="mainmenu-nav">
                                    <ul class="mainmenu">
                                        <li><a href="{{ url('/') }}">HOME</a></li>
                                        <li><a href="{{ url('tentang-kami/') }}">ABOUT US</a></li>
                                        <li><a href="{{ url('our-collection/') }}">OUR COLLECTION</a></li>
                                        <li><a href="{{ url('login/') }}">SIGN IN</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-12">
                            <div class="header-search d-flex flex-wrap align-items-center justify-content-center justify-content-xl-end">
                                <form class="header-search-form d-sm-block d-none" action="{{ url('/search') }}" method="post">
                                    @csrf
                                    <div class="axil-search form-group">
                                        <button type="submit" class="search-button">
                                            <i class="fal fa-search"></i>
                                        </button>
                                        <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Pencarian" minlength="3" />
                                    </div>
                                </form>
                                <div class="mobile-search-wrapper d-sm-none d-block">
                                    <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                                    <form class="header-search-form">
                                        <div class="axil-search form-group">
                                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button> <input type="text" class="form-control" placeholder="Search" />
                                        </div>
                                    </form>
                                </div>
                                <div class="hamburger-menu d-block d-xl-none">
                                    <div class="hamburger-inner">
                                        <div class="icon"><i class="fal fa-bars"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="popup-mobilemenu-area">
                <div class="inner">
                    <div class="mobile-menu-top">
                        <div class="logo">
                            <a href="{{ url('/') }}"> <img class="dark-logo" src="{{ asset('images/logo-black.png') }}" alt="Bimas Islam" /> </a>
                        </div>
                        <div class="mobile-close">
                            <div class="icon"><i class="fal fa-times"></i></div>
                        </div>
                    </div>
                    <ul class="mainmenu">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        @foreach($menu[0] as $m) @if(isset($m->detail_content))
                        <li class="menu-item-has-children">
                            <a href="#">{{ $m->nama_content }}</a>
                            <ul class="axil-submenu">
                                @foreach($m->detail_content as $d) @if(isset($menu[$d->id]) && !$d->hide_content)
                                <li class="menu-item-has-sub-children">
                                    <a href="#"> {{ $d->nama_content }}</a>
                                    <ul class="axil-sub-submenu">
                                        @foreach($menu[$d->id] as $l)
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="{{ url($l->target_content) }}" @if($l->redirect_content) target="_blank" @endif > <span data-text="{{ $l->nama_content }}">{{ $l->nama_content }}</span></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li>
                                    <a class="hover-flip-item-wrapper" href="{{ url($d->target_content) }}" @if($d->redirect_content) target="_blank" @endif > <span data-text="{{ $d->nama_content }}">{{ $d->nama_content }}</span> </a>
                                </li>
                                @endif @endforeach
                            </ul>
                        </li>
                        @else @if($m->is_hidden == 1)
                        <li><a href="{{ url($m->target_content) }}">{{ $m->nama_content }}</a></li>
                        @endif @endif @endforeach
                        <li><a href="{{ url('/login') }}">Sign in</a></li>
                    </ul>
                </div>
            </div>
        