@include('header')

<div id="wrapper">
    <!-- content    -->
    <div class="content">
        <!-- hero grid    -->
        <div class="hero-hrid fl-wrap gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-slider-wrap fl-wrap">
                            <div class="single-slider fl-wrap">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($slide as $s)
                                        <!-- swiper-slide   -->
                                        <div class="swiper-slide">
                                            <div class="grid-post-item  bold_gpi  fl-wrap">
                                                <div class="grid-post-media gpm_sing">
                                                    <div class="bg" data-bg="{{ asset('images/berita').'/'.$s->image_berita }}"></div>
                                                    <div class="grid-post-media_title">
                                                        <h4>
                                                            <a href="{{ url('berita').'/'.$s->slug_berita }}">
                                                                {{ $s->nama_berita }}
                                                            </a>
                                                        </h4>
                                                        <span class="video-date"><i class="far fa-calendar"></i>  {{ date('d M Y', strtotime($s->created_at)); }}</span>
                                                        <ul class="post-opt">
                                                            <li><i class="far fa-clock"></i> {{ date('H:i', strtotime($s->created_at)); }}</li>
                                                            @isset($direktorat[$s->kategori_direktorat])
                                                            <li>
                                                                <a href="{{ url('direktorat').'/'.slug($direktorat[$s->kategori_direktorat]) }}" class="tags-white">
                                                                    <i class="fas fa-university"></i> {{ $direktorat[$s->kategori_direktorat] }}
                                                                </a>
                                                            </li>
                                                            @endisset
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- swiper-slide end   -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="ss-slider-cont ss-slider-cont-prev"><i class="fas fa-caret-left"></i></div>
                            <div class="ss-slider-cont ss-slider-cont-next"><i class="fas fa-caret-right"></i></div>
                        </div>
                    </div>
                    @foreach($head as $h)
                    <div class="col-md-3">
                        <div class="grid-post-item  bold_gpi    fl-wrap">
                            <div class="grid-post-media  gpm_sing bold_gpi_half">
                                <div class="bg" data-bg="{{ asset('images/berita').'/'.$h->image_berita }}"></div>
                                <div class="grid-post-media_title">
                                    <h4>
                                        <a href="{{ url('berita').'/'.$h->slug_berita }}">
                                            {{ $h->nama_berita }}
                                        </a>
                                    </h4>
                                    <span class="video-date"><i class="far fa-calendar"></i>  {{ date('d M Y', strtotime($h->created_at)); }}</span>
                                    <ul class="post-opt">
                                        <li><i class="far fa-clock"></i> {{ date('H:i', strtotime($h->created_at)); }}</li>
                                    </ul>
                                    @isset($direktorat[$h->kategori_direktorat])
                                    <span class="video-tags">
                                        <a href="{{ url('direktorat').'/'.slug($direktorat[$h->kategori_direktorat]) }}" class="tags-white">
                                            <i class="fas fa-university"></i> 
                                            <div>{{ $direktorat[$h->kategori_direktorat] }}</div>
                                        </a>
                                    </span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="video_carousel-wrap fl-wrap m-0">
            <div class="container mt-5">
                <div class="section-title">
                    <h2>Jadwal Shalat, {{ $jadwal->tanggal }}</h2>
                </div>
                <form class="custom-form" method="post" action="{{ url('jadwal-shalat').'/search#search' }}" />
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <select id="prop" name="propinsi" class="style-select mb-3">
                            @foreach($propinsi as $p)
                            @if(strtolower(trim($p->name)) != 'pusat')
                            @if(strtolower(trim($p->name)) == 'dki jakarta')
                            <option value="{{ $p->id }}" selected> {{ $p->name }}</option>
                            @else
                            <option value="{{ $p->id }}"> {{ $p->name }}</option>
                            @endif
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select id="kabp" name="kabupaten" class="style-select mb-3">
                            @foreach($kabupaten as $k)
                            <option value="{{ $k->id }}"> {{ $k->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" name="bulan"  value="{{ date('m') }}" />
                        <input type="hidden" name="tahun"  value="{{ date('Y') }}" />
                        <button class="btn color-bg float-btn mt-0" id="submit"><i class="fas fa-search"></i> Cari Data</button>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <p class="tweet mt-3">
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">IMSAK</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->imsak }}</font>
                            </span>
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">SUBUH</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->subuh }}</font>
                            </span>
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">TERBIT</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->terbit }}</font>
                            </span>
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">DHUHA</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->dhuha }}</font>
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <p class="tweet mt-3">
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">DZUHUR</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->dzuhur }}</font>
                            </span>
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">ASHAR</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->ashar }}</font>
                            </span>
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">MAGHRIB</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->maghrib }}</font>
                            </span>
                            <span style="float:left; width:25%;">
                                <font style="font-weight:bold; color:#000;">ISYA</font><br>
                                <object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
                                <font style="font-weight:normal;">{{ $jadwal->isya }}</font>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="video_carousel-container" style="background:transparent; padding:0;">
                    <div class="video_carousel_title" style="margin:20px 0;">
                        <h4 style="color:#333; margin:0; font-size:18px;">Info Publik</h4>
                    </div>
                    <!-- fw-carousel  -->
                    <div class="info_carousel lightgallery" style="padding:0 20px">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($icon as $i)
                                <!-- swiper-slide-->  
                                <div class="swiper-slide" style="padding:0; margin:0;">
                                    <!-- video-item  -->
                                    <a href="{{ url($i->target_content) }}" @if($i->redirect_content) target="_blank" @endif >
                                        <div class="video-item fl-wrap">
                                            <div class="video-item-ico fl-wrap">
                                                <img src="{{ asset('images/content').'/'.$i->icon_content }}" class="respico" alt="{{ $i->nama_content }}" style="margin:0 0 25px;" />
                                            </div>
                                            <div class="video-item-text">
                                                <h4 class="text-center">{{ $i->nama_content }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <!--video-item end   -->
                                </div>
                                <!-- swiper-slide end-->  
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- fw-carousel end -->								
                    <div class="cc-prev cc_btn" style="bottom:0; margin-bottom:30px; margin-left:20px; z-index:20;"><i class="fas fa-caret-left"></i></div>
                    <div class="cc-next cc_btn"  style="bottom:0; margin-bottom:30px; margin-right:20px; z-index:20;"><i class="fas fa-caret-right"></i></div>
                </div>
            </div>
        </div>
        <!-- hero grid end   -->

        <!-- section   -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-container fl-wrap fix-container-init">
                            <div class="section-title">
                                <h2>Berita Terbaru</h2>
                                <div class="ajax-nav">
                                    <h4>{{ $param->title }}</h4>
                                </div>
                            </div>
                            <div class="list-post-wrap">
                                @foreach($main as $m)
                                <!--list-post-->	
                                <div class="list-post fl-wrap">
                                    <div class="list-post-media">
                                        <a href="{{ url('berita').'/'.$m->slug_berita }}">
                                            <div class="bg-wrap">
                                                <div class="bg" data-bg="{{ asset('images/berita').'/'.$m->image_berita }}"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="list-post-content">
                                        <h3>
                                            <a href="{{ url('berita').'/'.$m->slug_berita }}">
                                                {{ $m->nama_berita }}
                                            </a>
                                        </h3>
                                        <ul class="post-opt">
                                            <li><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($m->created_at)) }}</li>
                                            <li><i class="far fa-clock"></i> {{ date('H:i', strtotime($m->created_at)) }}</li>
                                            @isset($direktorat[$m->kategori_direktorat])
                                            <li>
                                                <a href="{{ url('direktorat').'/'.slug($direktorat[$m->kategori_direktorat]) }}" class="tags">
                                                    <i class="fas fa-university"></i> {{ $direktorat[$m->kategori_direktorat] }}
                                                </a>
                                            </li>
                                            @endisset
                                        </ul>
                                        <p>{{ $m->keterangan_berita ?: trunc(clean($m->detail_berita),50) }}</p>
                                    </div>
                                </div>
                                <!--list-post end-->
                                @endforeach
                            </div>
                            <div class="grid-post-wrap">
                                <div class="more-post-wrap  fl-wrap">
                                    <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                        <div class="row">
                                            @foreach($middle as $m)
                                            <div class="col-md-6">
                                                <!--list-post-->	
                                                <div class="list-post fl-wrap">
                                                    <div class="list-post-media">
                                                        <a href="{{ url('berita').'/'.$m->slug_berita }}">
                                                            <div class="bg-wrap">
                                                                <div class="bg" data-bg="{{ asset('images/berita').'/'.$m->image_berita }}"></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="list-post-content">
                                                        <h3>
                                                            <a href="{{ url('berita').'/'.$m->slug_berita }}">
                                                                {{ $m->nama_berita }}
                                                            </a>
                                                        </h3>
                                                        <ul class="post-opt">
                                                            <li><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($m->created_at)); }}</li>
                                                            <li><i class="far fa-clock"></i> {{ date('H:i', strtotime($m->created_at)); }}</li>
                                                            @isset($direktorat[$m->kategori_direktorat])
                                                            <br clear="all">
                                                            <li>
                                                                <a href="{{ url('direktorat').'/'.slug($direktorat[$m->kategori_direktorat]) }}" class="tags">
                                                                    <i class="fas fa-university"></i> {{ $direktorat[$m->kategori_direktorat] }}
                                                                </a>
                                                            </li>
                                                            @endisset
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--list-post end-->						  
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--grid-post-item-->
                                <div class="single-grid-slider-wrap fl-wrap">
                                    <div class="single-grid-slider">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                @foreach($swipe as $s)
                                                <!-- swiper-slide-->  
                                                <div class="swiper-slide">
                                                    <div class="grid-post-item  bold_gpi  fl-wrap">
                                                        <div class="grid-post-media gpm_sing">
                                                            <div class="bg" data-bg="{{ asset('images/berita').'/'.$s->image_berita }}"></div>
                                                            <div class="grid-post-media_title">
                                                                <h4>
                                                                    <a href="{{ url('berita').'/'.$s->slug_berita }}">
                                                                        {{ $s->nama_berita }}
                                                                    </a>
                                                                </h4>
                                                                <span class="video-date"><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($s->created_at)); }}</span>
                                                                <ul class="post-opt">
                                                                    <li><i class="far fa-clock"></i>  {{ date('H:i', strtotime($s->created_at)); }}</li>
                                                                    @isset($direktorat[$s->kategori_direktorat])
                                                                    <li>
                                                                        <a href="{{ url('direktorat').'/'.slug($direktorat[$s->kategori_direktorat]) }}" class="tags-white">
                                                                            <i class="fas fa-university"></i> {{ $direktorat[$s->kategori_direktorat] }}
                                                                        </a>
                                                                    </li>
                                                                    @endisset
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- swiper-slide end-->
                                                @endforeach										
                                            </div>
                                            <div class="sgs-pagination sgs_ver "></div>
                                        </div>
                                    </div>
                                </div>
                                <!--grid-post-item end-->								
                                <div class="more-post-wrap  fl-wrap">
                                    <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                        <div class="row">
                                            @foreach($bottom as $b)
                                            <div class="col-md-6">
                                                <!--list-post-->	
                                                <div class="list-post fl-wrap">
                                                    <div class="list-post-media">
                                                        <a href="{{ url('berita').'/'.$b->slug_berita }}">
                                                            <div class="bg-wrap">
                                                                <div class="bg" data-bg="{{ asset('images/berita').'/'.$b->image_berita }}"></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="list-post-content">
                                                        <h3>
                                                            <a href="{{ url('berita').'/'.$b->slug_berita }}">
                                                                {{ $b->nama_berita }}
                                                            </a>
                                                        </h3>
                                                        <ul class="post-opt">
                                                            <li><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($b->created_at)); }}</li>
                                                            <li><i class="far fa-clock"></i> {{ date('H:i', strtotime($b->created_at)); }}</li>
                                                            @isset($direktorat[$b->kategori_direktorat])
                                                            <br clear="all">
                                                            <li>
                                                                <a href="{{ url('direktorat').'/'.slug($direktorat[$b->kategori_direktorat]) }}" class="tags">
                                                                    <i class="fas fa-university"></i> {{ $direktorat[$b->kategori_direktorat] }}
                                                                </a>
                                                            </li>
                                                            @endisset
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--list-post end-->						  
                                            </div>
                                            @endforeach	
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('berita') }}" class="dark-btn fl-wrap"> Berita Lainnya </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- sidebar   -->
                        <div class="sidebar-content fl-wrap fix-bar">
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap">
                                <div class="box-widget-content">
                                    <!-- content-tabs-wrap -->
                                    <div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
                                        <div class="content-tabs fl-wrap">
                                            <ul class="tabs-menu fl-wrap no-list-style">
                                                <li class="current"><a href="#tab-popular"> Opini </a></li>
                                                <li><a href="#tab-resent">Tokoh</a></li>
                                            </ul>
                                        </div>
                                        <!--tabs -->                       
                                        <div class="tabs-container">
                                            <!--tab -->
                                            <div class="tab">
                                                <div id="tab-popular" class="tab-content first-tab">
                                                    <div class="post-widget-container fl-wrap">
                                                        @foreach($opini as $o)
                                                        <!-- post-widget-item -->
                                                        <div class="post-widget-item fl-wrap">
                                                            <div class="post-widget-item-media">
                                                                <a href="{{ url('opini').'/'.$o->slug_opini }}"><img src="{{ asset('images/opini').'/'.$o->image_opini }}" alt="" /></a>
                                                            </div>
                                                            <div class="post-widget-item-content">
                                                                <h4>
                                                                    <a href="{{ url('opini').'/'.$o->slug_opini }}">
                                                                        {{ $o->nama_opini }}
                                                                    </a>
                                                                </h4>
                                                                <ul class="pwic_opt">
                                                                    <li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($o->created_at)); }}</span></li>
                                                                    <li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($o->created_at)); }}</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- post-widget-item end -->
                                                        @endforeach							
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tab  end-->
                                            <!--tab -->
                                            <div class="tab">
                                                <div id="tab-resent" class="tab-content">
                                                    <div class="post-widget-container fl-wrap">
                                                        @foreach($tokoh as $t)
                                                        <!-- post-widget-item -->
                                                        <div class="post-widget-item fl-wrap">
                                                            <div class="post-widget-item-media">
                                                                <a href="{{ url('tokoh').'/'.$t->slug_tokoh }}"><img src="{{ asset('images/tokoh').'/'.$t->image_tokoh }}" alt="" /></a>
                                                            </div>
                                                            <div class="post-widget-item-content">
                                                                <h4>
                                                                    <a href="{{ url('tokoh').'/'.$t->slug_tokoh }}">
                                                                        {{ $t->nama_tokoh }}
                                                                    </a>
                                                                </h4>
                                                                <ul class="pwic_opt">
                                                                    <li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($t->created_at)); }}</span></li>
                                                                    <li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($t->created_at)); }}</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- post-widget-item end -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tab end-->							
                                        </div>
                                        <!--tabs end-->  
                                    </div>
                                    <!-- content-tabs-wrap end -->
                                </div>
                            </div>
                            <!-- box-widget  end -->						

                            <!-- box-widget -->
                            <div class="box-widget fl-wrap d-none d-md-block">
                                <div class="widget-title">Jadwal Shalat</div>
                                <div class="box-widget-content">
                                    <form class="custom-form" method="post" action="{{ url('jadwal-shalat').'/search#search' }}">
                                    @csrf
                                    <fieldset>
                                        <select id="pro" name="propinsi" class="style-select mb-3">
                                            @foreach($propinsi as $p)
                                            @if(strtolower(trim($p->name)) != 'pusat')
                                            @if(strtolower(trim($p->name)) == 'dki jakarta')
                                            <option value="{{ $p->id }}" selected> {{ $p->name }}</option>
                                            @else
                                            <option value="{{ $p->id }}"> {{ $p->name }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                        <select id="kab" name="kabupaten" class="style-select mb-3">
                                            @foreach($kabupaten as $k)
                                            <option value="{{ $k->id }}"> {{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select id="bulan" name="bulan" class="style-select mb-3">
                                                    @foreach($bulan as $b => $name)
                                                    @if($b == date('m'))
                                                    <option value="{{ $b }}" selected>{{ $name }}</option>
                                                    @else
                                                    <option value="{{ $b }}">{{ $name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="tahun" name="tahun" class="style-select mb-3">
                                                    @foreach($tahun as $t)
                                                    @if($t == date('Y'))
                                                    <option value="{{ $t }}" selected>{{ $t }}</option>
                                                    @else
                                                    <option value="{{ $t }}">{{ $t }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button class="btn color-bg float-btn" id="submit"><i class="fas fa-search"></i> Cari Data</button>
                                    </form>
                                </div>
                            </div>
                            <!-- box-widget  end -->						
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap d-none d-md-block">
                                <div class="widget-title">Jadwal Imsakiyah</div>
                                <div class="box-widget-content">
                                    <form class="custom-form" method="post" action="{{ url('jadwal-imsakiyah').'/search#search' }}">
                                    @csrf
                                    <fieldset>
                                        <select id="propinsi" name="propinsi" class="style-select mb-3">
                                            @foreach($propinsi as $p)
                                            @if(strtolower(trim($p->name)) != 'pusat')
                                            @if(strtolower(trim($p->name)) == 'dki jakarta')
                                            <option value="{{ $p->id }}" selected> {{ $p->name }}</option>
                                            @else
                                            <option value="{{ $p->id }}"> {{ $p->name }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                        <select id="kabupaten" name="kabupaten" class="style-select mb-3">
                                            @foreach($kabupaten as $k)
                                            <option value="{{ $k->id }}"> {{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        <select id="tahun" name="tahun" class="style-select mb-3">
                                            @foreach($hijriah as $t => $h)
                                            <option value="{{ $t }}">{{ $h }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <button class="btn color-bg float-btn" id="submit"><i class="fas fa-search"></i> Cari Data</button>
                                    </form>
                                </div>
                            </div>
                            <!-- box-widget  end -->						
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap">
                                <div class="widget-title">Konsultasi Syariah</div>
                                <div class="box-widget-content">
                                    <div id="footer-twiit" class="fl-wrap">
                                        <ul>
                                            @foreach($konsultasi as $k)
                                            <li>
                                                <p class="tweet">
                                                    <i class="far fa-user"></i> {{ $k->nama_konsultasi }} &nbsp;&nbsp;&nbsp;<i class="far fa-map-marker"></i> {{ $k->kota_konsultasi }}<br>
                                                    <a href="{{ url('konsultasi-syariah').'/'.getLink($k->judul_konsultasi.' '.$k->nama_konsultasi.' '.$k->kota_konsultasi) }}"><span>{{ $k->judul_konsultasi }}</span></a><br>
                                                    {{ substr($k->detail_konsultasi,0,125).(strlen($k->detail_konsultasi) > 125 ? '...' : '') }}
                                                </p>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="{{ url('konsultasi-syariah') }}" class="btn float-btn color-btn">Selengkapnya <i class="fas fa-caret-right"></i></a>
                                </div>
                                <!-- box-widget  end -->					
                            </div>
                            <!-- sidebar  end -->
                        </div>
                    </div>
                    <div class="limit-box fl-wrap"></div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!-- section   -->
        <section class="dark-bg no-bottom-padding">
            <div class="container">
                <div class="main-video-wrap fl-wrap">
                    <div class="video-main-cont">
                        <div class="video-section-title fl-wrap">
                            <h2>Galeri Video</h2>
                            <a href="{{ url('video') }}">Video Lainnya <i class="fas fa-caret-right"></i></a>
                        </div>
                        <a class="video-holder vh-main fl-wrap  image-popup" href="#">
                            <div class="bg"></div>
                            <div class="overlay"></div>
                            <div class="big_prom"> <i class="fas fa-play"></i></div>
                        </a>
                        <div class="video-holder-title fl-wrap">
                            <div class="video-holder-title_item"><a href="#"></a></div>
                            <span class="video-date"><i class="far fa-clock"></i> <strong></strong></span>
                        </div>
                        <div class="vh-preloader"></div>
                    </div>
                    <!-- video-links-wrap   -->
                    <div class="video-links-wrap">
                        @foreach($video as $i => $v)
                        <!-- video-item  -->
                        <div class="video-item @if(empty($i)) video-item_active @endif fl-wrap" data-video-link="{{ $v->url_video }}">
                            <div class="video-item-img fl-wrap">
                                <img src="{{ $v->image_video }}" class="respimg" alt="" />
                                <div class="play-icon"><i class="fas fa-play"></i></div>
                            </div>
                            <div class="video-item-title">
                                <h4>{{ $v->nama_video }}</h4>
                                <span class="video-date"><i class="far fa-calendar"></i> <strong>{{ date('d M Y', strtotime($v->created_at)); }}</strong></span>
                            </div>
                        </div>
                        <!--video-item end   -->
                        @endforeach
                    </div>
                    <!-- video-links-wrap end   -->
                </div>
            </div>
            <div class="video_carousel-wrap fl-wrap">
                <div class="container">
                    <div class="video_carousel-container">
                        <div class="video_carousel_title">
                            <h4>Galeri Foto</h4>
                            <div class="vc-pagination pag-style"></div>
                        </div>
                        <!-- fw-carousel  -->
                        <div class="video_carousel lightgallery">
                            <div class="swiper-container">
                                <div class="swiper-wrapper lightgallery">
                                    @foreach($foto as $f)
                                    <!-- swiper-slide-->  
                                    <div class="swiper-slide">
                                        <!-- video-item  -->
                                        <a href="{{ asset('images/foto').'/'.$f->image_foto }}" class="popup-image" title="{{ '<div style="text-align:left;"><b>'.$f->nama_foto.'</b><br>'.$f->keterangan_foto.'</div>' }}">	
                                            <div class="video-item fl-wrap">
                                                <div class="video-item-img fl-wrap">
                                                    <img src="{{ asset('images/foto').'/'.$f->image_foto }}" class="respimg" alt="" />
                                                </div>
                                                <div class="video-item-title">
                                                    <h4>{{ $f->nama_foto }}</h4>
                                                    <span class="video-date"><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($f->created_at)); }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!--video-item end   -->
                                    </div>
                                    <!-- swiper-slide end-->  
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- fw-carousel end -->
                        <div class="cc-prev cc_btn"><i class="fas fa-caret-left"></i></div>
                        <div class="cc-next cc_btn"><i class="fas fa-caret-right"></i></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!-- section  -->
        <div class="ad-wrap fl-wrap">
            &nbsp;
        </div>
        <!-- section end -->
    </div>
            
    @if(count($banner) > 0)
    <script>
        $(document).ready(function () {
            $('#modal-banner').modal('show');
        });
    </script>
    @endif
    @include('footer')