<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title') &mdash; {{ config('app.name') }}</title>
        <meta name="title" content="@yield('title') &mdash; {{ config('app.name') }}" />
        <meta name="description" content="@yield('meta-description', 'Eksplor Seni Budaya Islam Di Indonesia: Indonesia merupakan negara yang sangat kaya akan ragam seni Budaya Islam. Mulai dari seni suara, seni tari, tradisi, ritual, instrumen, gambar, lukisan, pahatan, tulisan dan lain sebagainya.')" />
        <meta name="keywords" content="Kemenag, Kementerian Agama, Kementerian Agama Republik Indonesia, Repositori Seni Budaya Islam" />
        <meta name="author" content="Kementerian Agama Republik Indonesia" />

        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:title" content="@yield('title') &mdash; {{ config('app.name') }}" />
        <meta property="og:description" content="@yield('meta-description', 'Eksplor Seni Budaya Islam Di Indonesia: Indonesia merupakan negara yang sangat kaya akan ragam seni Budaya Islam. Mulai dari seni suara, seni tari, tradisi, ritual, instrumen, gambar, lukisan, pahatan, tulisan dan lain sebagainya.')" />
        <meta property="og:image" content="@yield('meta-image', 'https://kemenag.go.id/assets/imgs/theme/logo.png')" />

        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="{{ url()->current() }}" />
        <meta property="twitter:title" content="@yield('title') &mdash; {{ config('app.name') }}" />
        <meta property="twitter:description" content="@yield('meta-description', 'Eksplor Seni Budaya Islam Di Indonesia: Indonesia merupakan negara yang sangat kaya akan ragam seni Budaya Islam. Mulai dari seni suara, seni tari, tradisi, ritual, instrumen, gambar, lukisan, pahatan, tulisan dan lain sebagainya.')" />
        <meta property="twitter:image" content="@yield('meta-image', 'https://kemenag.go.id/assets/imgs/theme/logo.png')" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="https://kemenag.go.id/assets/imgs/theme/favicon.png">
        <link rel="stylesheet" href="{{ asset('landing/css/plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/colors/green.css') }}">
        <link rel="preload" href="{{ asset('landing/css/fonts/urbanist.css') }}" as="style" onload="this.rel='stylesheet'">
        <link rel="stylesheet" href="{{ asset('landing/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/plugins/sweetalert2/sweetalert2.min.css') }}">

        <style>
            @keyframes loading {
                0% {
                    background-position: 0% 0%;
                }
                100% {
                    background-position: 100% 0%;
                }
            }

            [data-f-id="pbf"] {
                display: none;
            }
        </style>
        @yield('stylesheet')
	</head>
	<body>
        <div class="content-wrapper">
            @include('landing.layouts.partials.head')
			@yield('content')
		</div>
        @include('landing.layouts.partials.footer')

        <script src="{{ asset('landing/js/plugins.js') }}"></script>
        <script src="{{ asset('landing/js/theme.js') }}"></script>
        <script src="{{ asset('landing/plugins/jquery/jquery-3.6.4.min.js') }}"></script>
        <script src="{{ asset('landing/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('landing/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

        @if (session('info'))
            <script>
                $(document).ready(function() {
                    $('#modal-signin').modal('show');
                    toastr.warning(@json(session('info')));
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ session('error') }}',
                    })
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                $(document).ready(function() {
                    toastr.success('{{ session('success') }}')
                });
            </script>
        @endif

        <script>
          document.addEventListener('DOMContentLoaded', function() {
              const scrollLinks = document.querySelectorAll('a[data-scroll-to]');

              scrollLinks.forEach(link => {
                  link.addEventListener('click', function(e) {
                      const targetId = this.getAttribute('data-scroll-to');
                      const targetElement = document.querySelector(targetId);

                      if (targetElement) {
                          e.preventDefault();
                          targetElement.scrollIntoView({ behavior: 'smooth' });
                      }
                  });
              });
          });
        </script>

        @yield('scripts')
	</body>
</html>
