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
<link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('cms/css/plugins/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('cms/css/plugins/lightbox.min.css') }}" />
<link rel="stylesheet" href="{{ asset('cms/css/plugins/ekko-lightbox.css') }}" />
<link rel="stylesheet" href="{{ asset('cms/css/style.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.12.4/sweetalert2.min.css" integrity="sha512-WxRv0maH8aN6vNOcgNFlimjOhKp+CUqqNougXbz0E+D24gP5i+7W/gcc5tenxVmr28rH85XHF5eXehpV2TQhRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{ asset('cms/js/vendor-all.min.js') }}"></script>
<script async src="{{ asset('cms/js/plugins/bootstrap.min.js') }}"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.12.4/sweetalert2.all.min.js" integrity="sha512-aRyxRCMzAorfKGjEjnSeGTVKrI/2irvvR5DI38LV/JXOkL9VLnZ+rfFkD9i1UTWTB8e8W5vpf7SjDsfMOdNosg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
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
<img src="{{ asset('images/repositori_logo.png') }}" height="65" alt="" class="logo lazy" />
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
    <span class="mr-2">{{ Session::get('nama_user') }}</span>
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