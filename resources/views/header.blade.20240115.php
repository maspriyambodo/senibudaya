<!DOCTYPE HTML>
<html lang="id-ID">
<head>
<style>img.lazy{min-height:1px}</style>
<link rel="preload" href="{{ asset('js/jquery.min.js') }}" as="script"/>
<link rel="preload" href="{{ asset('js/c5904c42df6.js') }}" as="script"/>
<link rel="preload" href="https://www.google.com/recaptcha/api.js" as="script"/>
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/" />
<link rel="dns-prefetch" href="https://scentivaid.com/" />
<link rel="dns-prefetch" href="https://fonts.googleapis.com/" />
<link rel="dns-prefetch" href="https://img.youtube.com/" />
<meta charset="UTF-8">
<link rel="profile" href=https://gmpg.org/xfn/11>
<meta name="author" content="{{ $param->author }}" />
<meta name="keywords" content="{{ $param->keywords }}{{ empty($title) ? '' : ', '.$title }}" />
<?php if (isset($detail->keterangan_berita)) { ?>
    <meta name="description" content="{{ mb_strimwidth($detail->keterangan_berita, 0, 137, '.') }}" />
<?php } elseif(!isset($detail->keterangan_berita)) { ?>
    <meta name="description" content="{{ $param->description }}" />
<?php } else { ?>
    <meta property="og:description" content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? mb_strimwidth($detail->detail_konsultasi,0,137,'...') : mb_strimwidth($detail->{'keterangan_'.strtolower($kategori)},0,137,'.')) : (empty($title) ? '' : $title.' - ').$param->description }}" />
<?php } ?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<title>{{ $param->title }}{{ empty($title) ? '' : ' - '.$title }}</title>
<meta name="p:domain_verify" content="420a65ff1d90e8a916aab11bfb5b7612"/>
<meta property="og:locale" content="id_ID" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="{{ (isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan'))) ? 'article' : 'website'}}" />
<meta property="og:title" content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? $detail->judul_konsultasi : $detail->{'nama_'.strtolower($kategori)}) : $param->title.(empty($title) ? '' : ' - '.$title) }}" />
<meta property="og:image" content="{{ asset('images/'.(isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','bimbingan')) ? strtolower($kategori).'/'.$detail->{'image_'.strtolower($kategori)} : 'favicon.ico')) }}" />
<?php if (isset($detail->keterangan_berita)) { ?>
<meta name="description" content="{{ mb_strimwidth($detail->keterangan_berita, 0, 137, '.') }}" />
<?php } elseif(!isset($detail->keterangan_berita)) { ?>
    <meta name="description" content="{{ $param->description }}" />
<?php } else { ?>
    <meta property="og:description" content="{{ isset($detail) && in_array(strtolower($kategori), array('berita','opini','tokoh','konsultasi','bimbingan')) ? (strtolower($kategori) == 'konsultasi' ? mb_strimwidth($detail->detail_konsultasi,0,137,'...') : mb_strimwidth($detail->{'keterangan_'.strtolower($kategori)},0,137,'.')) : (empty($title) ? '' : $title.' - ').$param->description }}" />
<?php } ?>
<meta property="og:site_name" content="{{ $param->title }}" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="650" />
<meta property="og:image:height" content="366" />
<meta name="robots" content="all">
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
<link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" />
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
<script>var app_url="{{ url('') }}";</script>
<script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/3d31fa0eba921e71f994eeab/script.js"></script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5GRMS43D');</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-4NPH4F49SR"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag() {
    dataLayer.push(arguments);
}
gtag("consent", "default", {
    ad_storage: "denied",
    analytics_storage: "granted",
    functionality_storage: "granted",
    personalization_storage: "granted",
    security_storage: "granted",
    wait_for_update: 2000
});
gtag("set", "ads_data_redaction", true);
gtag("set", "url_passthrough", true);
gtag('js', new Date());

gtag('config', 'G-4NPH4F49SR');
</script>
{!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script async src="{{ asset('js/bootstrap.min.js') }}"></script>
<script async src="{{ asset('js/plugins.js') }}"></script>
<script async src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.min.js" integrity="sha512-QwpsxtdZRih55GaU/Ce2Baqoy2tEv9GltjAG8yuTy2k9lHqK7VHHp3wWWe+yITYKZlsT3AaCj49ZxMYPp46iJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GRMS43D" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<a href="https://scentivaid.com/" style="visibility:hidden;">scentivaid</a>
<a href="https://mycapturer.com/" style="visibility:hidden;">mycapturer</a>
<a href="https://warcode.id/" style="visibility:hidden;">warcode</a>
<div id="main">
<div class="progress-bar-wrap">
<div class="progress-bar color-bg"></div>
</div>
<header class="main-header">
<div class="top-bar fl-wrap d-none d-md-block">
<div class="container">
<div class="date-holder">
<span class="date_num"></span>
<span class="date_mounth"></span>
<span class="date_year"></span>
</div>
<div class="header_news-ticker-wrap">
<div class="hnt_title">Berita Terkini</div>
<div class="header_news-ticker fl-wrap">
<ul>
@foreach($top as $t)
<li><a href="{{ url('berita').'/'.$t->slug_berita }}">{{ $t->nama_berita }}</a></li>
@endforeach
</ul>
</div>
<div class="n_contr-wrap">
<div class="n_contr p_btn"><i class="fas fa-caret-left"></i></div>
<div class="n_contr n_btn"><i class="fas fa-caret-right"></i></div>
</div>
</div>
<ul class="topbar-social">
<li><a href="{{ $param->pusaka }}"><img src="{{ asset('images/pusaka.png') }}" alt="" /></a></li>
<li class="store"><a href="{{ $param->pusaka }}"><img src="{{ asset('images/store.png') }}" alt="" /></a></li>
</ul>
</div>
</div>
<div class="header-inner fl-wrap">
<div class="container">
<a href="{{ url('/') }}" class="logo-holder"><img src="{{ asset('images/logo.png') }}" class="lazy" alt="" /></a>
<div class="search_btn htact show_search-btn"><i class="far fa-search"></i></div>
<div class="header-search-wrap novis_sarch">
<div class="widget-inner">
<form action="{{ url('/search') }}" method="post">
@csrf
<input id="keyword" name="keyword" type="text" class="search" required="" placeholder="Pencarian..." value="" minlength="3" />
<button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
</form>
</div>
</div>
<div class="nav-button-wrap">
<div class="nav-button">
<span></span><span></span><span></span>
</div>
</div>
<div class="nav-holder main-menu">
<nav>
<ul>
<li><a href="{{ url('/') }}">Beranda</a></li>
@foreach($menu[0] as $m)
	<li>
	@if(isset($m->detail_content))
		<a href="#">{{ $m->nama_content }}<i class="fas fa-angle-down"></i></a>
		<ul>
		@foreach($m->detail_content as $d)
			<li>
			@if(isset($menu[$d->id]) && !$d->hide_content)
				<a href="#">{{ $d->nama_content }}<i class="fas fa-angle-down"></i></a>
				<ul>
				@foreach($menu[$d->id] as $l)
					<a href="{{ url($l->target_content) }}" @if($l->redirect_content) target="_blank" @endif >
					{{ $l->nama_content }}
					</a>
				@endforeach
				</ul>
			@else
				<a href="{{ url($d->target_content) }}" @if($d->redirect_content) target="_blank" @endif >
				{{ $d->nama_content }}
				</a>
			@endif
			</li>
		@endforeach
		</ul>
	@else
		@if($m->is_hidden == 1)
		<a href="{{ url($m->target_content) }}">{{ $m->nama_content }}</a>
		@endif
	@endif
	</li>
@endforeach
</ul>
</nav>
</div>
</div>
</div>
</header>