@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox-plus-jquery.min.js" integrity="sha512-U9dKDqsXAE11UA9kZ0XKFyZ2gQCj+3AwZdBMni7yXSvWqLFEj8C1s7wRmWl9iyij8d5zb4wm56j4z/JVEwS77g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div id="wrapper">
<div class="content">

<section>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="main-container fl-wrap fix-container-init">
<div class="breadcrumbs-header_url mb-4">
@if(!empty($parent))
<a href="javascript:void(0);">{{ $parent }} <i class="fas fa-chevron-right ml-2"></i> </a>
@endif
<a href="{{ url($current) }}">{{ $title }}</a>
@isset($detail->nama_direktorat)
<span><i class="fas fa-chevron-right mr-2"></i> {{ $detail->nama_direktorat }}</span>
@endisset
</div>
@if(strtolower($kategori) == 'konsultasi')
<div class="single-post-header fl-wrap" style="padding:0!important">
<h1>{{ $detail->{'judul_'.strtolower($kategori)} }}</h1>
<div class="clearfix"></div>
<span class="post-date"><i class="far fa-user"></i> {{ $detail->{'nama_'.strtolower($kategori)} }}</span>
<ul class="post-opt">
<li><i class="far fa-map-marker"></i> {{ $detail->{'kota_'.strtolower($kategori)} }}</li>
</ul>
<div class="clearfix"></div>
<p>{!! nl2br($detail->{'detail_'.strtolower($kategori)}) !!}</p>
</div>
@else
<div class="single-post-header fl-wrap">
<h1>{{ $detail->{'nama_'.strtolower($kategori)} }}</h1>
<div class="clearfix"></div>
<div class="row text-left mt-4">
    <div class="col-md-6 col-12 my-2">
        <span class="mr-4"><i class="far fa-calendar clearfix" style="color: #1f6e65;"></i> {{ date('d M Y', strtotime($detail->created_at)); }}</span>
        <span class="mr-4"><i class="far fa-clock clearfix" style="color: #1f6e65;"></i> {{ date('H:i', strtotime($detail->created_at)); }}</span>
        @isset($detail->nama_direktorat)
        <a href="{{ url('direktorat').'/'.slug($detail->nama_direktorat) }}">
            <i class="fas fa-university" style="color: #1f6e65;"></i> {{ $detail->nama_direktorat; }}
        </a>
        @endisset
    </div>
    <div class="col-md-2 col-12 my-2"></div>
    <div class="col-md-4 col-12 my-2"></div>
</div>
</div>
<div class="single-post-media fl-wrap">
    <a href="{{ asset('images/'.strtolower($kategori)).'/'.$detail->{'image_'.strtolower($kategori)} }}" data-lightbox="example-1" data-alt="{{ $detail->{'nama_'.strtolower($kategori)} }}" data-title="{{ $detail->{'nama_'.strtolower($kategori)} }}" title="{{ $detail->{'nama_'.strtolower($kategori)} }}">
<img class="img-fluid img-thumbnail rounded mx-auto d-block" src="{{ asset('images/'.strtolower($kategori)).'/'.$detail->{'image_'.strtolower($kategori)} }}" alt="{{ $detail->{'nama_'.strtolower($kategori)} }}" />
</a>
</div>
@endif
<div class="single-post-content spc_column fl-wrap">
<div class="single-post-content_column">
<div class="share-holder ver-share fl-wrap">
<div class="share-title">Bagikan</div>
<div class="share-container isShare"></div>
</div>
</div>
<div class="clearfix"></div>
<div class="single-post-content_text text-left" id="font_chage">
@if(strtolower($kategori) == 'konsultasi')
<br>{!! $detail->{'jawab_'.strtolower($kategori)} !!}
@else
{!! $detail->{'detail_'.strtolower($kategori)} !!}
@endif
<div class="clearfix"></div>
<div class="row credit_content mt-4">
@isset($detail->nama_sumber)
<div class="col-md-4">
Jurnalis:
<a href="{{ url('jurnalis').'/'.slug($detail->nama_sumber) }}"> {{ $detail->nama_sumber }}</a>
</div>
@endisset
@isset($detail->nama_editor)
<div class="col-md-4">
Editor :
<a href="{{ url('editor').'/'.slug($detail->nama_editor) }}"> {{ $detail->nama_editor }}</a>
</div>
@endisset
@isset($detail->nama_fg)
<div class="col-md-4">
Fotografer :
<a href="{{ url('fotografer').'/'.slug($detail->nama_fg) }}"> {{ $detail->nama_fg }}</a>
</div>
@endisset
</div>
</div>
@if(isset($prev) || isset($next))
<div class="single-post-nav fl-wrap">
@if(isset($prev))
@if(strtolower($kategori) == 'konsultasi')
<a href="{{ url($current).'/'.getLink($prev->{'judul_'.strtolower($kategori)}.' '.$prev->{'nama_'.strtolower($kategori)}.' '.$prev->{'kota_'.strtolower($kategori)}) }}" class="single-post-nav_prev spn_box" style="padding:0">
<div class="spn-box-contentx">
<span class="spn-box-content_subtitle"><i class="fas fa-caret-left"></i> Sebelumnya</span>
<span class="spn-box-content_title">{{ $prev->{'judul_'.strtolower($kategori)} }}</span>
<p>{{ $prev->{'nama_'.strtolower($kategori)} }}, {{ $prev->{'kota_'.strtolower($kategori)} }}<p>
</div>
@else
<a href="{{ url($current).'/'.$prev->{'slug_'.strtolower($kategori)} }}" class="single-post-nav_prev spn_box">
<div class="spn_box_img">
<img src="{{ asset('images/'.strtolower($kategori)).'/'.$prev->{'image_'.strtolower($kategori)} }}" class="respimg lazy" alt="" />
</div>
<div class="spn-box-content">
<span class="spn-box-content_subtitle"><i class="fas fa-caret-left"></i> Sebelumnya</span>
<span class="spn-box-content_title">{{ $prev->{'nama_'.strtolower($kategori)} }}</span>
</div>
@endif
</a>
@else
<a href="#" class="single-post-nav_next spn_box">
<div class="spn_box_img">
&nbsp;
</div>
<div class="spn-box-content">
&nbsp;
</div>
</a>
@endif
@if(isset($next))
@if(strtolower($kategori) == 'konsultasi')
<a href="{{ url($current).'/'.getLink($next->{'judul_'.strtolower($kategori)}.' '.$next->{'nama_'.strtolower($kategori)}.' '.$next->{'kota_'.strtolower($kategori)}) }}" class="single-post-nav_next spn_box" style="padding:0;padding-right:10px">
<div class="spn-box-content">
<span class="spn-box-content_subtitle">Selanjutnya <i class="fas fa-caret-right"></i></span>
<span class="spn-box-content_title">{{ $next->{'judul_'.strtolower($kategori)} }}</span>
<p style="text-align:right">{{ $next->{'nama_'.strtolower($kategori)} }}, {{ $next->{'kota_'.strtolower($kategori)} }}<p>
</div>
@else
<a href="{{ url($current).'/'.$next->{'slug_'.strtolower($kategori)} }}" class="single-post-nav_next spn_box">
<div class="spn_box_img">
<img src="{{ asset('images/'.strtolower($kategori)).'/'.$next->{'image_'.strtolower($kategori)} }}" class="respimg lazy" alt="" />
</div>
<div class="spn-box-content">
<span class="spn-box-content_subtitle">Selanjutnya <i class="fas fa-caret-right"></i></span>
<span class="spn-box-content_title">{{ $next->{'nama_'.strtolower($kategori)} }}</span>
</div>
@endif
</a>
@else
<a href="#" class="single-post-nav_next spn_box">
<div class="spn_box_img">
&nbsp;
</div>
<div class="spn-box-content">
&nbsp;
</div>
</a>
@endif
</div>
@endif
</div>
</div>
</div>
<div class="col-md-4">
<div class="sidebar-content fl-wrap fix-bar">
@if(strtolower($kategori) == 'konsultasi')
<div class="box-widget fl-wrap">
<div class="widget-title">{{ $title }}</div>
<div class="box-widget-content">
<ul class="cat-wid-list">
@foreach($jenis as $i => $nama_jenis)
<li>
@if($default == $i )
<a href="{{ url($current.'/default/'.$i) }}" class="active">
@else
<a href="{{ url($current.'/default/'.$i) }}">
@endif
{{ $nama_jenis}}
</a>
</li>
@endforeach
</ul>
</div>
</div>
@else
<div class="box-widget fl-wrap">
<div class="box-widget-content">
<div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
<div class="content-tabs fl-wrap">
<ul class="tabs-menu fl-wrap no-list-style">
<li class="current"><a href="#tab-popular"> {{ strtolower($kategori) == 'berita' ? 'Opini' : 'Berita' }} </a></li>
<li><a href="#tab-resent">{{ !in_array(strtolower($kategori), array('berita', 'opini')) ? 'Opini' : 'Tokoh' }}</a></li>
</ul>
</div>
<div class="tabs-container">
<div class="tab">
<div id="tab-popular" class="tab-content first-tab">
<div class="post-widget-container fl-wrap">
@foreach($left as $l)
<div class="post-widget-item fl-wrap">
<div class="post-widget-item-media">
    <a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}"><img src="{{ asset('images/'.(strtolower($kategori) == 'berita' ? 'opini' : 'berita')).'/'.$l->{'image_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}" class="lazy" alt="" /></a>
</div>
<div class="post-widget-item-content">
<h4>
<a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">
{{ $l->{'nama_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}
</a>
</h4>
<ul class="pwic_opt">
<li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($l->created_at)); }}</span></li>
<li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($l->created_at)); }}</span></li>
</ul>
</div>
</div>
@endforeach
</div>
</div>
</div>
<div class="tab">
<div id="tab-resent" class="tab-content">
<div class="post-widget-container fl-wrap">
@foreach($right as $r)
<div class="post-widget-item fl-wrap">
<div class="post-widget-item-media">
    <a href="{{ url(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini/'.$r->slug_opini : 'tokoh/'.$r->slug_tokoh) }}"><img src="{{ asset('images/'.(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini' : 'tokoh')).'/'.$r->{'image_'.strtolower(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini' : 'tokoh')} }}" class="lazy" alt="" /></a>
</div>
<div class="post-widget-item-content">
<h4>
<a href="{{ url(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini/'.$r->slug_opini : 'tokoh/'.$r->slug_tokoh) }}">
{{ $r->{'nama_'.strtolower(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini' : 'tokoh')} }}
</a>
</h4>
<ul class="pwic_opt">
<li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($r->created_at)); }}</span></li>
<li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($r->created_at)); }}</span></li>
</ul>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endif
</div>
</div>
</div>
<div class="limit-box fl-wrap"></div>
</div>
</section>
</div>
@include('footer')