<footer class="text-inverse" style="background-color: #1a1a1a;">
    <div class="container pt-12 pt-lg-6 pb-13 pb-md-15">
        <div class="row gy-6 gy-lg-0 mt-11 mb-12">
            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <img width="170" class="mb-4" src="https://kemenag.go.id/assets/imgs/theme/logo.png" alt="Logo" srcset="https://kemenag.go.id/assets/imgs/theme/logo.png 2x" />
                    <p class="mb-4">© {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
                    <nav class="nav social social-white">
                        <a href="https://www.facebook.com/Ditjen.Bimas.Islam" target="_blank"><i class="uil uil-facebook-f"></i></a>
                        <a href="https://www.instagram.com/bimasislam/" target="_blank"><i class="uil uil-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCMDwUz44x_O10PRlm_vsYog" target="_blank"><i class="uil uil-youtube"></i></a>
                        <a href="https://twitter.com/BimasIslam" target="_blank"><i class="uil uil-twitter"></i></a>
                    </nav>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Alamat</h4>
                    <address class="pe-xl-15 pe-xxl-17">Gedung Kementerian Agama RI Jl. M. H. Thamrin No.6 lantai 6, Jakarta Pusat 10340</address>
                    <a href="mailto:bimasislam@kemenag.go.id">bimasislam@kemenag.go.id</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Links</h4>
                    <ul class="list-unstyled  mb-0">
                        <li><a class="nav-link scroll" href="#home">Home</a></li>
                        <li><a class="nav-link scroll" href="#about-us">About Us</a></li>
                        <li><a class="nav-link scroll" href="#our-collections">Our Collections</a></li>
                        @auth
                            @if (Auth::user()->nama_user)
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
