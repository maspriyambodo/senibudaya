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
                        <li class="nav-item"><a class="nav-link" href="{{ route('landing.home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('landing.home') }}#about-us" data-scroll-to="#about-us">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('landing.home') }}#our-collections" data-scroll-to="#our-collections">Our Collections</a></li>
                        @auth
                          <li class="nav-item"><a class="nav-link{{ request()->routeIs('form-pengajuan.create') ? ' active' : '' }}" href="{{ route('form-pengajuan.create') }}">Form Pengajuan</a></li>
                          <li class="nav-item d-lg-none"><a class="nav-link{{ request()->routeIs('profile.edit') ? ' active' : '' }}" href="{{ route('profile.edit') }}">Profile</a></li>
                          <li class="nav-item d-lg-none"><a class="nav-link{{ request()->routeIs('form-pengajuan.index') ? ' active' : '' }}" href="{{ route('form-pengajuan.index') }}">List Pengajuan</a></li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <li class="nav-item d-lg-none">
                                  <button type="submit" class="nav-link">
                                      {{ __('Log Out') }}
                                  </button>
                              </li>
                          </form>
                        @else
                          <li class="nav-item d-lg-none"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endauth
                        <li class="nav-item d-lg-none">
                            <form class="search-form" method="GET" action="{{ route('landing.search') }}">
                                <input type="text" class="form-control" placeholder="Search" name="q" value="{{ request('search') }}">
                            </form>
                        </li>
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
                            <a class="nav-link dropdown-toggle" href="#" style="text-transform:uppercase" data-bs-toggle="dropdown">{{ Auth::user()->nama_user }}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="dropdown-item{{ request()->routeIs('profile.edit') ? ' active' : '' }}" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li class="nav-item"><a class="dropdown-item{{ request()->routeIs('form-pengajuan.index') ? ' active' : '' }}" href="{{ route('form-pengajuan.index') }}">List Pengajuan</a></li>
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
                        <li class="nav-item d-none d-md-block">
                            <form class="search-form" method="GET" action="{{ route('landing.search') }}">
                                <input type="text" class="form-control" placeholder="Search" name="q" value="{{ request('search') }}">
                            </form>
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
<div class="offcanvas offcanvas-top bg-light" id="offcanvas-search" data-bs-scroll="true">
    <div class="container d-flex flex-row py-6">
        <form class="search-form w-100">
            <input id="search-form" type="text" class="form-control" placeholder="Type keyword and hit enter">
        </form>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
</div>