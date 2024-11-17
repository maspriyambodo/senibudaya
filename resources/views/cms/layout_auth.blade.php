<!DOCTYPE html>
<html lang="en" data-bs-theme="light" style="overflow: hidden;">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>{{ $page . ' | ' . $param->title }}</title>
        <meta charset="utf-8" />
        <meta name="description" content="{{ $param->title }}" />
        <meta name="keywords" content="{{ $param->title }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $page . ' | ' . $param->title }}" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:site_name" content="{{ $param->title }}" />
        <link rel="canonical" href="{{ url('/') }}" />
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('metronic/css.css') }}" />
        <link href="{{ asset('metronic/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <script>
            if (window.top != window.self) {
        window.top.location.replace(window.self.location.href)
    }
        </script>
        {!! ReCaptcha::htmlScriptTagJsApi() !!}
    </head>
    <body id="kt_body" class="app-blank">
        <script>
        var defaultThemeMode = "light";var themeMode;if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode")
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme")
            } else {
                themeMode = defaultThemeMode
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode)
    }
        </script>
        <script>var hostUrl = window.location.pathname;</script>
        <script src="{{ asset('metronic/plugins.bundle.js') }}"></script>
        <script src="{{ asset('metronic/scripts.bundle.js') }}"></script>
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <div class="w-lg-500px p-10">
                            @yield('content')
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image:url({{ asset('images/login_image.jpg') }})">
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100"></div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hostUrl" value="{{ url('/auth/') }}" readonly=""/>
        <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xlink="http://www.w3.org/1999/xlink" svgjs="http://svgjs.dev" style="overflow:hidden;top:-100%;left:-100%;position:absolute;opacity:0">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
        </svg>
    </body>
</html>