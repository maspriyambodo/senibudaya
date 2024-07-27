<div class="axil-footer-area axil-footer-style-1 footer-variation-2">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="index.html">
                            <img class="dark-logo" src="/landing/images/logo/logo.png" alt="Repositori Seni Budaya Islam">
                            <img class="white-logo" src="/landing/images/logo/logo.png" alt="Repositori Seni Budaya Islam">
                            <span class="logo-text ml-2">Repositori Seni Budaya Islam</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8">
                    <div
                        class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                        <h5 class="follow-title mb--0 mr--20">Follow Us</h5>
                        <ul class="social-icon color-tertiary md-size justify-content-start">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8">
                    <div class="copyright-left">
                        <ul class="mainmenu justify-content-start">
                            <li><a href="{{ route('landing.home') }}">Home</a></li>
                            <li><a href="{{ route('landing.about-us') }}">About Us</a></li>
                            <li class="{{ request()->routeIs(['landing.our-collections', 'landing.show-collections', 'landing.show-collection-detail']) ? 'active' : '' }}"><a href="{{ route('landing.our-collections') }}">Our Collections</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="copyright-right text-start text-md-end mt_sm--20">
                        <p>&copy; {{ date('Y') }} Repositori Seni Budaya Islam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
