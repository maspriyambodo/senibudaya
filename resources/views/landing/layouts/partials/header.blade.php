<header class="header axil-header  header-light header-sticky ">
    <div class="header-wrap">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                <div class="logo">
                    <a href="{{ route('landing.home') }}">
                        <img class="dark-logo" src="/landing/images/logo/logo.png" alt="Repositori Seni Budaya Islam">
                        <img class="light-logo" src="/landing/images/logo/logo.png" alt="Repositori Seni Budaya Islam">
                        <span class="logo-text ml-2">Repositori Seni Budaya Islam</span>
                    </a>
                </div>
            </div>

            <div class="col-xl-6 d-none d-xl-block">
                <div class="mainmenu-wrapper">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="{{ request()->routeIs('landing.home') ? 'active' : '' }}"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="{{ request()->routeIs('landing.about-us') ? 'active' : '' }}"><a href="{{ route('landing.about-us') }}">About Us</a></li>
                            <li class="{{ request()->routeIs(['landing.our-collections', 'landing.show-collections', 'landing.show-collection-detail']) ? 'active' : '' }}"><a href="{{ route('landing.our-collections') }}">Our Collections</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                <div class="header-search text-end d-flex align-items-center">
                    <form class="header-search-form d-sm-block d-none">
                        <div class="axil-search form-group">
                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                    <div class="mobile-search-wrapper d-sm-none d-block">
                        <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                        <form class="header-search-form">
                            <div class="axil-search form-group">
                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <ul class="metabar-block">
                        @guest
                            <li>
                                <a class="cerchio axil-button button-rounded" href="{{ route('login') }}">
                                    <span class="hover-flip-item">
                                        <span data-text="Sign In">Sign In</span>
                                    </span>
                                </a>
                            </li>
                        @endguest
                        @auth
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                    </ul>
                    <div class="hamburger-menu d-block d-xl-none">
                        <div class="hamburger-inner">
                            <div class="icon"><i class="fal fa-bars"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            <div class="logo">
                <a href="{{ route('landing.home') }}">
                    <img class="dark-logo" src="/landing/images/logo/logo.png" alt="Repositori Seni Budaya Islam">
                    <img class="light-logo" src="/landing/images/logo/logo.png" alt="Repositori Seni Budaya Islam">
                </a>
            </div>
            <div class="mobile-close">
                <div class="icon">
                    <i class="fal fa-times"></i>
                </div>
            </div>
        </div>
        <ul class="mainmenu">
            <li><a href="{{ route('landing.home') }}">Home</a></li>
            <li><a href="{{ route('landing.about-us') }}">About Us</a></li>
            <li class="{{ request()->routeIs(['landing.our-collections', 'landing.show-collections', 'landing.show-collection-detail']) ? 'active' : '' }}"><a href="{{ route('landing.our-collections') }}">Our Collections</a></li>
        </ul>
        <div class="buy-now-btn">

        </div>
    </div>
</div>
