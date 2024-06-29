
        <!-- Start Footer Area  -->
        <div class="axil-footer-area axil-footer-style-1 footer-variation-three bg-color-kemenag">
            <!-- Start Footer Top Area  -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img class="light-logo" src="{{ asset('images/logo.png') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <!-- Start Post List  -->
                            <div class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                                <ul class="social-icon color-tertiary md-size justify-content-start">
                                    <li><a href="{{ $param->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $param->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $param->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $param->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Post List  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top Area  -->

            <!-- Start Copyright Area  -->
            <div class="copyright-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="copyright-left">
                                <ul class="mainmenu justify-content-start">
									<li>
                                        <a class="hover-flip-item-wrapper" href="{{ url('/') }}">
											<span data-text="Beranda">Beranda</span>
                                        </a>
                                    </li>
									@foreach($footer->menu as $f)
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="{{ url($f->target_content) }}" @if($f->redirect_content) target="_blank" @endif>
											<span data-text="{{ $f->nama_content }}">{{ $f->nama_content }}</span>
                                        </a>
                                    </li>
									@endforeach
                                </ul>
								</div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="copyright-right text-start text-lg-end mt_md--20 mt_sm--20">
                                <p class="b3">{{ $param->footer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area  -->
        </div>
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

		<div class="modal fade" id="modal-dokumen" role="dialog">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 id="title-dokumen" class="modal-title">Dokumen</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</div>
					<iframe id="file-dokumen" src="" width="100%" height="500px" frameborder="0"></iframe>
				</div>
			</div>
		</div>

    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('js/vendor/tweenmax.min.js') }}"></script>
    <script src="{{ asset('js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.style.switcher.js') }}"></script>
	<script src="{{ asset('js/vendor/lightgallery.js') }}"></script>
	<script src="{{ asset('js/vendor/niceselect.js') }}"></script>
	
    <!-- Main JS -->
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