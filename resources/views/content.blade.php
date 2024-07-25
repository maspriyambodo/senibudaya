@include('header')

<section class="hero-section">
    <div class="main-banner">
        <div class="content container">
            <h1>Eksplor Seni Budaya Islam Di Indonesia</h1>
            <h2>Kementerian Agama Republik Indonesia</h2>
            <p>Indonesia merupakan negara yang sangat kaya akan ragam seni Budaya Islam. Mulai dari seni ukir, seni tari, tradisi, ritual, instrumen, bangunan, lukisan, pakaian, tulisan dan lain sebagainya.</p>
        </div>
    </div>
</section>
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