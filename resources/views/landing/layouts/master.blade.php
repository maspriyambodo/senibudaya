<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Repositori Seni Budaya Islam - Kementerian Agama RI</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="{{ asset('landing/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
</head>
<body>
    <div class="main-wrapper">
        @include('landing.layouts.partials.header')
        @yield('content')
        @include('landing.layouts.partials.footer')
        @include('landing.layouts.partials.backto-top')
    </div>

    <script src="{{ asset('landing/js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/tweenmax.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/jquery.style.switcher.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
</body>
</html>
