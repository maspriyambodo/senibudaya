@include('header')

<div class="post-single-wrapper axil-section-gap bg-color-white">
    <div class="container">
        <div class="axil-post-details mb--30"><h1 class="exo-2-medium">OUR COLLECTION</h1></div>
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <h1><i class="fas fa-headphones"></i></h1>
                    <span class="badge rounded-pill text-bg-primary">Primary</span>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<div class="axil-footer-area axil-footer-style-1 footer-variation-three bg-color-kemenag">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo"><a href="//senibudaya.test"><img class="light-logo" src="//senibudaya.test/images/logo.png"></a></div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                        <ul class="social-icon color-tertiary md-size justify-content-start">
                            <li><a href="//www.facebook.com/Ditjen.Bimas.Islam" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="//www.instagram.com/bimasislam/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="//twitter.com/BimasIslam" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="//www.youtube.com/channel/UCMDwUz44x_O10PRlm_vsYog" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="copyright-left">
                        <ul class="mainmenu justify-content-start">
                            <li><a class="hover-flip-item-wrapper" href="//senibudaya.test"><span data-text="Beranda">Beranda</span></a></li>
                            <li><a class="hover-flip-item-wrapper" href="//senibudaya.test/foto"><span data-text="Galeri">Galeri</span></a></li>
                            <li><a class="hover-flip-item-wrapper" href="//senibudaya.test/tentang-kami"><span data-text="Tentang Kami">Tentang Kami</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="copyright-right text-start text-lg-end mt_md--20 mt_sm--20">
                        <p class="b3">© Direktorat Jenderal Bimbingan Masyarakat Islam 2023</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('js/vendor/tweenmax.min.js') }}"></script>
    <script src="{{ asset('js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.style.switcher.js') }}"></script>
    <script src="{{ asset('js/vendor/lightgallery.js') }}"></script>
    <script src="{{ asset('js/vendor/niceselect.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	
	<script>
	$(document).ready(function() {
		$('#alert').hide();
		@if(session()->has('message'))
		$('#alert').removeClass('d-none');
		$('#info').text("{{ preg_replace('/[0-9_]+/', '', session()->get('message')) }}");
		$('#alert').fadeTo(3000, 750).slideUp(750, function(){
			$('#alert').slideUp(750);
			$('#alert').addClass('d-none');
		});
		@endif
	});
	</script>
</body>
</html>