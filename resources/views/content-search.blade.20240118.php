@include('header')
<!-- wrapper -->
<div id="wrapper">
    <!-- content    -->
    <div class="content">
        <div class="breadcrumbs-header fl-wrap">
            <div class="container">
                <div class="breadcrumbs-header_url">
                    @if(!empty($parent))<a href="#">{{ $parent }}</a>@endif
                    <span>Pencairan</span>
                </div>
            </div>
            <div class="pwh_bg"></div>
        </div>
        <!--section   -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-title sect_dec">
                            <h2>Pencarian</h2>
                            <h4>{{ $param->title }}</h4>
                        </div>
                        <div class="about-wrap fl-wrap">
                            <form class="custom-form"  action="{{ url('/search') }}" method="post" />
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <input id="keyword" name="keyword" type="text" required="" value="{{ $keyword }}" placeholder="Pencarian..." value="" minlength="3" />
                                </div>
                                <div class="col-md-3">
                                    <button class="btn color-bg pl-3 m-0"><i class="fa fa-search"></i> </button>
                                </div>
                            </div>
                            </form>
                            @if(count($berita))
                            <h3 class="text-primary">Berita</h3><br>
                            <div id="footer-twiit" class="fl-wrap">
                                <ul>
                                    @foreach($berita as $b)
                                    <li>
                                        <p class="tweet">
                                            <a href="{{ url('berita').'/'.$b->slug_berita }}"><span>{{ $b->nama_berita }}</span></a><br>
                                            <i class="far fa-calendar"></i> {{ date('d M Y', strtotime($b->created_at)); }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i> {{ date('H:i', strtotime($b->created_at)); }}<br>
                                            {{ $b->keterangan_berita }}
                                        </p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>&nbsp;<br>
                            @endif

                            @if(count($opini))
                            <h3 class="text-primary">Opini</h3><br>
                            <div id="footer-twiit" class="fl-wrap">
                                <ul>
                                    @foreach($opini as $b)
                                    <li>
                                        <p class="tweet">
                                            <a href="{{ url('opini').'/'.$b->slug_opini }}"><span>{{ $b->nama_opini }}</span></a><br>
                                            <i class="far fa-calendar"></i> {{ date('d M Y', strtotime($b->created_at)); }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i> {{ date('H:i', strtotime($b->created_at)); }}<br>
                                            {{ $b->keterangan_opini }}
                                        </p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>&nbsp;<br>
                            @endif

                            @if(count($tokoh))
                            <h3 class="text-primary">Tokoh</h3><br>
                            <div id="footer-twiit" class="fl-wrap">
                                <ul>
                                    @foreach($tokoh as $b)
                                    <li>
                                        <p class="tweet">
                                            <a href="{{ url('tokoh').'/'.$b->slug_tokoh }}"><span>{{ $b->nama_tokoh }}</span></a><br>
                                            <i class="far fa-calendar"></i> {{ date('d M Y', strtotime($b->created_at)); }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i> {{ date('H:i', strtotime($b->created_at)); }}<br>
                                            {{ $b->keterangan_tokoh }}
                                        </p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>&nbsp;<br>
                            @endif

                            @if(count($bimbingan))
                            <h3 class="text-primary">Bimbingan</h3><br>
                            <div id="footer-twiit" class="fl-wrap">
                                <ul>
                                    @foreach($bimbingan as $b)
                                    <li>
                                        <p class="tweet">
                                            <a href="{{ url('bimbingan-syariah').'/'.$b->slug_bimbingan }}"><span>{{ $b->nama_bimbingan }}</span></a><br>
                                            <i class="far fa-calendar"></i> {{ date('d M Y', strtotime($b->created_at)); }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i> {{ date('H:i', strtotime($b->created_at)); }}<br>
                                            {{ $b->keterangan_bimbingan }}
                                        </p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>&nbsp;<br>
                            @endif
                            {{ $berita->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- sidebar   -->
                        <div class="sidebar-content fl-wrap fixed-bar">
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
                                                        @foreach($left as $l)
                                                        <!-- post-widget-item -->
                                                        <div class="post-widget-item fl-wrap">
                                                            <div class="post-widget-item-media">
                                                                <a href="{{ url('opini').'/'.$l->slug_opini }}"><img src="{{ asset('images/opini').'/'.$l->image_opini }}" alt="" /></a>
                                                            </div>
                                                            <div class="post-widget-item-content">
                                                                <h4>
                                                                    <a href="{{ url('opini').'/'.$l->slug_opini }}">
                                                                        {{ $l->nama_opini }}
                                                                    </a>
                                                                </h4>
                                                                <ul class="pwic_opt">
                                                                    <li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($l->created_at)); }}</span></li>
                                                                    <li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($l->created_at)); }}</span></li>
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
                                                        @foreach($right as $r)
                                                        <!-- post-widget-item -->
                                                        <div class="post-widget-item fl-wrap">
                                                            <div class="post-widget-item-media">
                                                                <a href="{{ url('tokoh').'/'.$r->slug_tokoh }}"><img src="{{ asset('images/tokoh').'/'.$r->image_tokoh }}" alt="" /></a>
                                                            </div>
                                                            <div class="post-widget-item-content">
                                                                <h4>
                                                                    <a href="{{ url('tokoh').'/'.$r->slug_tokoh }}">
                                                                        {{ $r->nama_tokoh }}
                                                                    </a>
                                                                </h4>
                                                                <ul class="pwic_opt">
                                                                    <li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($r->created_at)); }}</span></li>
                                                                    <li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($r->created_at)); }}</span></li>
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
                        </div>
                        <!-- sidebar  end -->
                    </div>
                </div>
            </div>
            <div class="sec-dec"></div>
        </section>
        <!--about end   -->
    </div>
    <!-- content  end-->
    @include('footer')