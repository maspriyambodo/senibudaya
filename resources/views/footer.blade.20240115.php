<style>
    .subcribe-form {
        color: #B6B6B6;
        text-align: left;
        line-height: 25px;
    }
</style>
<footer class="fl-wrap main-footer">
<div class="container">
<div class="footer-widget-wrap fl-wrap">
<div class="row">
<div class="col-md-4">
<div class="footer-widget">
<div class="footer-widget-content">
<a href="{{ url('/') }}" class="footer-logo"><img src="{{ asset('images/logo.png') }}" class="lazy" alt=""/></a>
<p>
{!! nl2br($param->address) !!}
</p>
<div class="footer-social fl-wrap">
<ul>
<li><a href="https://www.facebook.com/Ditjen.Bimas.Islam" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://twitter.com/BimasIslam" target="_blank"><i class="fab fa-twitter"></i></a></li>
<li><a href="https://www.instagram.com/bimasislam/" target="_blank"><i class="fab fa-instagram"></i></a></li>
<li><a href="https://www.youtube.com/channel/UCMDwUz44x_O10PRlm_vsYog" target="_blank"><i class="fab fa-youtube"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-md-2">
<div class="footer-widget">
<div class="footer-widget-title">Info Publik</div>
<div class="footer-widget-content">
<div class="footer-list footer-box fl-wrap">
<ul>
@foreach($footer->info as $f)
<li>
<a href="{{ url($f->target_content) }}" @if($f->redirect_content)target="_blank"@endif
>{{ $f->nama_content }}</a>
</li>
@endforeach
</ul>
</div>
</div>
</div>
</div>
<div class="col-md-2">
<div class="footer-widget">
<div class="footer-widget-title">Menu</div>
<div class="footer-widget-content">
<div class="footer-list footer-box fl-wrap">
<ul>
<li> <a href="{{ url('/') }}">Beranda</a></li>
@foreach($footer->menu as $f)
<li>
<a href="{{ url($f->target_content) }}" @if($f->redirect_content)target="_blank"@endif
>{{ $f->nama_content }}</a>
</li>
@endforeach
</ul>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="footer-widget">
<div class="footer-widget-title">Hubungi Kami</div>
<div class="footer-widget-content">
<div class="subcribe-form fl-wrap">
<div><i class="fas fa-phone"></i> {{ $param->phone }}</div>
<div><i class="fab fa-whatsapp"></i> {{ $param->hunting }}</div>
<div><i class="fas fa-envelope"></i> {{ $param->email }}</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footer-bottom fl-wrap">
<div class="container">
<div class="copyright">{{ $param->footer }}</div>
<div class="to-top"> <i class="fas fa-caret-up"></i></div>
</div>
</div>
</footer>
<div class="aside-panel">
<ul>
@foreach($icon as $i)
<li>
<a href="{{ url($i->target_content) }}" @if($i->redirect_content) target="_blank" @endif >
<img src="{{ asset('images/content').'/'.$i->icon_content }}" class="lazy" alt=""/>
<span>{{ $i->nama_content }}</span>
</a>
</li>
@endforeach
</ul>
</div>
</div>
</div>
<div class="modal fade" id="modal-dokumen" role="dialog">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<div class="modal-header">
<h5 id="title-dokumen" class="modal-title">Dokumen</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</a>
</div>
<iframe id="file-dokumen" src="" width="100%" height="500px" frameborder="0"></iframe>
</div>
</div>
</div>
<div class="modal fade" id="modal-banner" role="dialog">
    <div class="modal-dialog modal-lg"  style="overflow: hidden;">
        <div class="modal-content">
            <div class="modal-header" style="border:none">
                <h5 id="title-banner" class="modal-title">Informasi Terkini</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
			@if(isset($banner))
            <div class="modal-body">
                <!-- single-post-media   -->
                <div class="single-post-media fl-wrap">
                    <div class="banner-slider-wrap fl-wrap">
                        <div class="banner-slider fl-wrap">
                            <div class="swiper-container">
                                <div class="swiper-wrapper lightgallery">
                                    @foreach($banner as $b)
                                    <!-- swiper-slide   -->
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/banner').'/'.$b->image_banner }}" alt="" />
                                    </div>
                                    <!-- swiper-slide end   -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if(count($banner) > 1)
                        <div class="bs-slider-controls2">
                            <div class="bs-slider-pagination pag-style"></div>
                        </div>
                        <div class="bs-slider-cont bs-slider-cont-prev"><i class="fas fa-caret-left"></i></div>
                        <div class="bs-slider-cont bs-slider-cont-next"><i class="fas fa-caret-right"></i></div>
                        @endif
                    </div>
                </div>
                <!-- single-post-media end   -->
            </div>
			 @endif
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    setInterval(function () {
        console.clear();
    }, 18000);
    $('#form').submit(function(){
        if(grecaptcha.getResponse().length < 1){
            $('.text-validate').html("<i class='fas fas fa-exclamation'></i> Checked reCAPTCHA.");
            return false;
        }
    });
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