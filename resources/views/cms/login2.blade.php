<!DOCTYPE html>
<html lang="en" data-bs-theme="light" style="overflow: hidden;">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Sign in Repositori Seni Budaya Islam</title>
        <meta charset="utf-8" />
        <meta name="description" content="The most advanced Tailwind CSS &amp; Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords" content="tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Metronic - The World's #1 Selling Tailwind CSS &amp; Bootstrap Admin Template by KeenThemes" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Metronic by Keenthemes" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo1/authentication/layouts/corporate/sign-in.html" />
        <link rel="shortcut icon" href="https://preview.keenthemes.com/metronic8/demo1/assets/media/logos/favicon.ico" />
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
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <div class="w-lg-500px p-10">
                            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="auth" action="#">
                                @csrf
                                <div class="text-center mb-11">
                                    <a href="{{ url('/') }}" class="mb-0 mb-lg-12">
                                        <img alt="Logo" src="{{ asset('images/logo_kemenag.png') }}" class="h-60px h-lg-75px" />
                                    </a>
                                    <h1 class="text-gray-900 fw-bolder mb-3">
                                        Sign In
                                    </h1>
                                </div>

                                <div class="separator separator-content my-14">
                                    <span class="w-125px text-gray-500 fw-semibold fs-7"></span>
                                </div>
                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                    <input type="text" placeholder="Email" name="username" autocomplete="off" class="form-control bg-transparent" />
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="fv-row mb-3 fv-plugins-icon-container">
                                    <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <a href="https://preview.keenthemes.com/metronic8/demo1/authentication/layouts/corporate/reset-password.html" class="link-primary">
                                        Forgot Password ?
                                    </a>
                                </div>
                                {!! htmlFormSnippet() !!}
                                <div class="d-grid mb-5 mt-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <span class="indicator-label"> Sign In</span>
                                        <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                                    </button>
                                </div>
                                <div class="text-gray-500 text-center fw-semibold fs-6">
                                    Not a Member yet?
                                    <a href="https://preview.keenthemes.com/metronic8/demo1/authentication/layouts/corporate/sign-up.html" class="link-primary">
                                        Sign up
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image:url({{ asset('metronic/auth-bg2.png') }})">
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                        
                    </div>
                </div>
            </div>
        </div>
        <script>var hostUrl = "{{ url('/') }}";</script>
        <script src="{{ asset('metronic/plugins.bundle.js') }}"></script>
        <script src="{{ asset('metronic/scripts.bundle.js') }}"></script>
        <script src="{{ asset('metronic/general.js') }}"></script>
        <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xlink="http://www.w3.org/1999/xlink" svgjs="http://svgjs.dev" style="overflow:hidden;top:-100%;left:-100%;position:absolute;opacity:0">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
        </svg>
    </body>
</html>