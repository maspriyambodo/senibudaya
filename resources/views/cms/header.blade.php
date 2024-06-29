<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $param->title }} | {{ $title }}</title>
<link rel="preload" href="{{ asset('cms/js/vendor-all.min.js') }}" as="script"/>
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/" />
<link rel="dns-prefetch" href="http://cdn.datatables.net/" />
<link rel="dns-prefetch" href="https://fonts.gstatic.com/" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
<link href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('cms/css/plugins/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('cms/css/plugins/lightbox.min.css') }}" />
<link rel="stylesheet" href="{{ asset('cms/css/plugins/ekko-lightbox.css') }}" />
<link rel="stylesheet" href="{{ asset('cms/css/style.css') }}" />
<script src="{{ asset('cms/js/vendor-all.min.js') }}"></script>
<script async src="{{ asset('cms/js/plugins/bootstrap.min.js') }}"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>
<script async>var app_url="{{ url('') }}";</script>
<script async>var app_page="{{ url($current) }}";</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="loader-bg">
<div class="loader-track">
<div class="loader-fill"></div>
</div>
</div>
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
<div class="content-main container">
<div class="m-header">
<a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)"><span></span></a>
<a href="{{ url('/') }}" class="b-brand">
<img src="{{ asset('images/logo-black.png') }}" height="65" alt="" class="logo lazy" />
</a>
<a href="javascript:void(0)" class="mob-toggler">
<i class="feather icon-more-vertical"></i>
</a>
</div>
<div class="collapse navbar-collapse">
<ul class="navbar-nav ml-auto">
<li>
<div class="dropdown drp-user">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<span>{{ Session::get('nama_user') }}</span>
<img src="{{ asset('cms/images/user/'.Session::get('foto_user')) }}" class="img-radius lazy" alt="{{ Session::get('nama_user') }}" />
</a>
<div class="dropdown-menu dropdown-menu-right profile-notification">
<ul class="pro-body">
<li><a href="{{ url('/profil') }}" class="dropdown-item"><i class="feather icon-user"></i> Profil User</a></li>
<li><a id="rpassword" href="#" class="dropdown-item" data-toggle="modal" data-target="#reset"><i class="feather icon-unlock"></i> Ubah Password</a></li>
<li><a href="#" class="dropdown-item text-danger" data-toggle="modal" data-target="#logout"><i class="feather icon-log-out"></i> Logout</a></li>
</ul>
</div>
</div>
</li>
</ul>
</div>
</div>
</header>
<div class="content-main container">
<nav class="pcoded-navbar menupos-fixed menu-light">
<div class="navbar-wrapper content-main container">
<div class="navbar-content scroll-div">
<ul class="nav pcoded-inner-navbar">
<li class="nav-item">
<a href="{{ url('/dashboard') }}" class="nav-link">
<span class="pcoded-micon">
<i class="feather icon-home"></i>
</span>
<span class="pcoded-mtext">Dashboard</span>
</a>
</li>
@foreach($menu as $m)
@if($m->count_menu > 0)
<li class="nav-item pcoded-hasmenu">
<a href="javascript:void(0)" class="nav-link">
@else
<li class="nav-item">
<a href="{{ url($m->target_menu) }}" class="nav-link">
@endif
<span class="pcoded-micon"><i class="{{ $m->icon_menu }}"></i></span>
<span class="pcoded-mtext">{{ $m->nama_menu }}</span>
</a>
@if($m->count_menu > 0)
<ul class="pcoded-submenu">
@foreach($m->detail_menu as $d)
<li><a href="{{ url($d->target_menu) }}">{{ $d->nama_menu }}</a></li>
@endforeach
</ul>
@endif
</li>
@endforeach
</ul>
</div>
</div>
</nav>