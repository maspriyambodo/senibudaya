<header class="wrapper bg-light">
    <nav class="navbar navbar-expand-lg classic transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="{{ route('landing.home') }}">
                    <img width="170" src="https://kemenag.go.id/assets/imgs/theme/logo.png" alt="Logo" srcset="https://kemenag.go.id/assets/imgs/theme/logo.png 2x" />
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <img width="170" src="https://kemenag.go.id/assets/imgs/theme/logo.png" alt="Logo" srcset="https://kemenag.go.id/assets/imgs/theme/logo.png 2x" />
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link scroll" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link scroll" href="#about-us">About Us</a></li>
                        <li class="nav-item"><a class="nav-link scroll" href="#our-collections">Our Collections</a></li>
                    </ul>
                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <a href="mailto:bimasislam@kemenag.go.id">bimasislam@kemenag.go.id</a>
                            <nav class="nav social social-white mt-4">
                                <a href="https://www.facebook.com/Ditjen.Bimas.Islam" target="_blank"><i class="uil uil-facebook-f"></i></a>
                                <a href="https://www.instagram.com/bimasislam/" target="_blank"><i class="uil uil-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCMDwUz44x_O10PRlm_vsYog" target="_blank"><i class="uil uil-youtube"></i></a>
                                <a href="https://twitter.com/BimasIslam" target="_blank"><i class="uil uil-twitter"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    @auth
                        <li class="nav-item dropdown d-none d-md-block">
                            <a class="nav-link dropdown-toggle" href="#" style="text-transform:uppercase" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <li class="nav-item">
                                        <button type="submit" class="dropdown-item">
                                            {{ __('Log Out') }}
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item d-none d-md-block">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary rounded-pill">Sign In</a>
                        </li>
                    @endauth
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
