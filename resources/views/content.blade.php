@include('header')
<div class="axil-seo-post-banner seoblog-banner axil-section-gap bg-color-grey">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <div class="slider-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">
                    @foreach($slide as $s)
                    @if($s->image_berita)
                    <div class="content-block post-grid post-grid-large">
                        <div>
                            <div class="post-thumbnail-slide">
                                <a href="{{ url('berita').'/'.$s->slug_berita }}">
                                    <img class="img-fluid rounded" src="{{ asset('images/berita').'/'.$s->image_berita }}" alt="{{ $s->nama_berita }}">
                                </a>
                            </div>
                        </div>
                        <div class="post-grid-content">
                            <div class="post-content">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content"> @isset($direktorat[$s->kategori_direktorat])
                                            <div class="post-cat">
                                                <div class="post-cat-list">
                                                    <a class="hover-flip-item-wrapper" href="{{ url('direktorat').'/'.slug($direktorat[$s->kategori_direktorat]) }}">
                                                        <span data-text="{{ $direktorat[$s->kategori_direktorat] }}">{{ $direktorat[$s->kategori_direktorat] }}</span>
                                                    </a>
                                                </div>
                                            </div> @endisset
                                            <h6 class="title mb--10">
                                                <a href="{{ url('berita').'/'.$s->slug_berita }}">
                                                    <span>{{ $s->nama_berita }}</span>
                                                </a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>{{ date('d M Y H:i', strtotime($s->created_at)) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-12 mt_md--30 mt_sm--30">
                <div class="post-medium-block"> @foreach($head as $h)
                    <div class="content-block post-medium mb--20">
                        @if(file_exists(asset('images/berita').'/'.$h->image_berita))
                        <div class="post-thumbnail">
                            <div class="post-thumbnail-image">
                                <a href="{{ url('berita').'/'.$h->slug_berita }}">
                                    <img src="{{ asset('images/berita').'/'.$h->image_berita }}" alt="{{ $h->nama_berita }}">
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="post-thumbnail">
                            <div class="post-thumbnail-image">
                                <a href="{{ url('berita').'/'.$h->slug_berita }}">
                                    <img src="{{ asset('images/image_not_available.png') }}" alt="{{ $h->nama_berita }}">
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="post-content"> @isset($direktorat[$h->kategori_direktorat])
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="{{ url('direktorat').'/'.slug($direktorat[$h->kategori_direktorat]) }}">
                                        <span data-text="{{ $direktorat[$h->kategori_direktorat] }}">{{ $direktorat[$h->kategori_direktorat] }}</span>
                                    </a>
                                </div>
                            </div> @endisset
                            <h6 class="title">
                                <a href="{{ url('berita').'/'.$h->slug_berita }}">{{ $h->nama_berita }}</a>
                            </h6>
                            <div class="post-meta">
                                <ul class="post-meta-list">
                                    <li>{{ date('d M Y H:i', strtotime($h->created_at)) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div> @endforeach </div>
            </div>
        </div>
    </div>
</div>
<div class="axil-post-list-area post-listview-visible-color axil-section-gapTop bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-section axil-contact-form-area">
                            <h6 class="title mb--10">Jadwal Shalat, {{ $jadwal->tanggal }}</h6>
                            <form class="custom-form row" method="post" action="{{ url('jadwal-shalat').'/search#search' }}" /> @csrf
                            <div class="col-lg-5 col-md-5 col-12 mb--10">
                                <div class="form-group">
                                    <select id="prop" name="propinsi" class="style-select"> @foreach($propinsi as $p) @if(strtolower(trim($p->name)) != 'pusat') @if(strtolower(trim($p->name)) == 'dki jakarta') <option value="{{ $p->id }}" selected> {{ $p->name }}</option> @else <option value="{{ $p->id }}"> {{ $p->name }}</option> @endif @endif @endforeach </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-12 mb--10">
                                <div class="form-group">
                                    <select id="kabp" name="kabupaten" class="style-select"> @foreach($kabupaten as $k) <option value="{{ $k->id }}"> {{ $k->name }}</option> @endforeach </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="form-group">
                                    <input type="hidden" name="bulan" value="{{ date('m') }}" />
                                    <input type="hidden" name="tahun" value="{{ date('Y') }}" />
                                    <button name="submit" type="submit" id="submit" class="axil-button button-rounded">Cari</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mb--40">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>IMSAK</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="IMSAK">{{ $jadwal->imsak }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>SUBUH</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="SUBUH">{{ $jadwal->subuh }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>TERBIT</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="TERBIT">{{ $jadwal->terbit }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>DHUHA</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="DHUHA">{{ $jadwal->dhuha }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>DZUHUR</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="DZUHUR">{{ $jadwal->dzuhur }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>ASHAR</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="ASHAR">{{ $jadwal->ashar }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>MAGHRIB</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="MAGHRIB">{{ $jadwal->maghrib }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>ISYA</li>
                                            </ul>
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span data-text="ISYA">{{ $jadwal->isya }}</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb--20">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4 class="title">Berita Terkini</h4>
                        </div>
                    </div>
                </div>
                <div class="row"> @foreach($main as $m)
                    <div class="col-lg-6">
                        <div class="post-medium-block">
                            <div class="content-block post-medium mb--20">
                                <div class="post-thumbnail">
                                    <div class="post-thumbnail-image">
                                        <a href="{{ url('berita').'/'.$m->slug_berita }}">
                                            @if(file_exists(asset('images/berita').'/'.$m->image_berita))
                                            <img class="img-fluid" src="{{ asset('images/berita').'/'.$m->image_berita }}" alt="{{ $m->nama_berita }}">
                                            @else
                                            <img class="img-fluid" src="{{ asset('images/empty.png') }}" alt="{{ $m->nama_berita }}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="post-content">
                                    @isset($direktorat[$m->kategori_direktorat])
                                    <div class="post-cat">
                                        <div class="post-cat-list">
                                            <a class="hover-flip-item-wrapper" href="{{ url('direktorat').'/'.slug($direktorat[$m->kategori_direktorat]) }}">
                                                <span data-text="{{ $direktorat[$m->kategori_direktorat] }}">{{ $direktorat[$m->kategori_direktorat] }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endisset
                                    <h6 class="title">
                                        <a href="{{ url('berita').'/'.$m->slug_berita }}">{{ $m->nama_berita }}</a>
                                    </h6>
                                    <div class="post-meta">
                                        <ul class="post-meta-list">
                                            <li>{{ date('d M Y H:i', strtotime($m->created_at)) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> @endforeach </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                <div class="axil-single-widget widget widget_categories mb--30">
                    <div class="sidebar-inner">
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title">Opini</h5>
                            <div class="post-medium-block"> @foreach($opini as $o)
                                <div class="content-block post-medium mb--20">
                                    <div class="post-thumbnail">
                                        <div class="post-thumbnail-image">
                                            <a href="{{ url('opini').'/'.$o->slug_opini }}">
                                                @if(file_exists(asset('images/opini').'/'.$o->image_opini))
                                                <img class="img-fluid" src="{{ asset('images/opini').'/'.$o->image_opini }}" alt="{{ $o->nama_opini }}">
                                                @else
                                                <img class="img-fluid" src="{{ asset('images/image_not_available.png') }}" alt="{{ $o->nama_opini }}">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title">
                                            <a href="{{ url('opini').'/'.$o->slug_opini }}">{{ $o->nama_opini }}</a>
                                        </h6>
                                        <div class="post-meta">
                                            <ul class="post-meta-list">
                                                <li>{{ date('d M Y H:i', strtotime($o->created_at)); }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> @endforeach </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="axil-post-list-area post-listview-visible-color axil-section-gapBottom bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <div class="row mb--20">
                    
                </div>
                <div class="row mb--50">
                    
                </div>
                <div class="row mb--20">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4 class="title">Galeri Video</h4>
                        </div>
                    </div>
                </div>
                <div class="row mb--50">
                    <div class="col-lg-12">
                        <div class="list-categories videos-activation axil-slick-arrow arrow-between-side lightgallery"> @foreach($video as $i => $v)
                            <div class="single-video">
                                <a href="{{ $v->url_video }}" class="popup-image">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <img class="img-fluid" src="{{ $v->image_video }}" alt="{{ $v->nama_video }}">
                                            <a class="video-popup size-medium position-top-center popup-image" href="{{ $v->url_video }}">
                                                <span class="play-icon"></span>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title">{{ $v->nama_video }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div> @endforeach </div>
                    </div>
                </div>
                <div class="row mb--20">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4 class="title">Galeri Foto</h4>
                        </div>
                    </div>
                </div>
                <div class="row mb--50">
                    <div class="col-lg-12">
                        <div class="list-categories photo-activation axil-slick-arrow arrow-between-side lightgallery"> @foreach($foto as $f)
                            <div class="single-photo">
                                <a href="{{ asset('images/foto').'/'.$f->image_foto }}" class="popup-image" title="{{ '
														<div style=" text-align:left; ">
<b>'.$f->nama_foto.'</b>
<br>'.$f->keterangan_foto.'
</div>' }}">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <img class="img-fluid" src="{{ asset('images/foto').'/'.$f->image_foto }}" alt="{{ $f->nama_foto }}">
                                        </div>
                                    </div>
                                </a>
                            </div> @endforeach </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                <div class="axil-single-widget widget widget_categories mb--30">
                    <div class="sidebar-inner">
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title">Tokoh</h5>
                            <div class="post-medium-block"> @foreach($tokoh as $t)
                                <div class="content-block post-medium mb--20">
                                    <div class="post-thumbnail">
                                        @if(file_exists(asset('images/tokoh').'/'.$t->image_tokoh))
                                        <div class="post-thumbnail-image">
                                            <a href="{{ url('tokoh').'/'.$t->slug_tokoh }}">
                                                <img class="img-fluid" src="{{ asset('images/tokoh').'/'.$t->image_tokoh }}" alt="{{ $t->nama_tokoh }}">
                                            </a>
                                        </div>
                                        @else
                                        <div class="post-thumbnail-image">
                                            <a href="{{ url('tokoh').'/'.$t->slug_tokoh }}">
                                                <img class="img-fluid" src="{{ asset('images/image_not_available.png') }}" alt="{{ $t->nama_tokoh }}">
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title">
                                            <a href="{{ url('tokoh').'/'.$t->slug_tokoh }}">{{ $t->nama_tokoh }}</a>
                                        </h6>
                                        <div class="post-meta">
                                            <ul class="post-meta-list">
                                                <li>{{ date('d M Y H:i', strtotime($t->created_at)); }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> @endforeach </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> @include('footer')