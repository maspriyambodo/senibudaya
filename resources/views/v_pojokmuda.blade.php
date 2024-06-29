@include('header')
<div id="wrapper">
<div class="content">
<div class="breadcrumbs-header fl-wrap">
<div class="container">
<div class="breadcrumbs-header_url">
@if(!empty($parent))<a href="#">{{ $parent }}</a>@endif
@if(
$sumber_berita ||
$editor_berita ||
$fotografer_berita ||
$kategori_direktorat
)
<a href="{{ url($current) }}">{{ $title }}</a>
<span>{{ str_replace('-',' ', $request->id) }}</span>
@else
<span>{{ $title }}</span>
@endif
</div>
</div>
<div class="pwh_bg"></div>
</div>
<section>
<div class="container">
@if(in_array(strtolower($kategori), array('foto','video','link')))
<div class="main-container fl-wrap">
<div class="section-title">
<h2>{{ $title }}</h2>
<h4>{{ $param->title }}</h4>
</div>
@if(strtolower($kategori) == 'link' && count($link))
<div class="grid-post-wrap gallery-items">
@foreach($link as $i => $l)
<div class="gallery-link">
<div class="grid-post-item bold_gpi fl-wrap">
<div class="grid-post-media">
<a href="{{ $l->url_link }}" class="gpm_link" target="_blank">
<div class="bg-wrap">
<div class="bg" data-bg="{{ asset('images/link').'/'.$l->image_link }}"></div>
</div>
</a>
</div>
<div class="grid-post-content">
<p>{{ $l->nama_link }}</p>
</div>
</div>
</div>
@if(empty(($i+1)%5))
</div>
<div class="grid-post-wrap gallery-items">
@endif
@endforeach
</div>
<div class="clearfix"></div>
{{ $link->links("pagination::bootstrap-4") }}
@endif
@if(strtolower($kategori) == 'foto' && count($foto))
<div class="lightgallery">
<div class="grid-post-wrap gallery-items">
@foreach($foto as $i => $f)
<div class="gallery-item">
<div class="grid-post-item bold_gpi fl-wrap">
<div class="grid-post-media">
<a href="{{ asset('images/foto').'/'.$f->image_foto }}" class="gpm_link popup-image" title="{{ '<div style="text-align:left;"><b>'.$f->nama_foto.'</b><br>'.$f->keterangan_foto.'</div>' }}">
<div class="bg-wrap">
<div class="bg" data-bg="{{ asset('images/foto').'/'.$f->image_foto }}"></div>
</div>
</a>
</div>
<div class="grid-post-content text-left">
<span class="post-date"><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($f->created_at)); }}</span>
<div><b>{{ $f->nama_foto }}</b></div>
<p>{{ $f->keterangan_foto }}</p>
</div>
</div>
</div>
@if(empty(($i+1)%4))
</div>
<div class="grid-post-wrap gallery-items">
@endif
@endforeach
</div>
</div>
<div class="clearfix"></div>
{{ $foto->links("pagination::bootstrap-4") }}
@endif
@if(strtolower($kategori) == 'video' && count($video))
<div class="lightgallery">
<div class="grid-post-wrap gallery-items">
@foreach($video as $i => $v)
<div class="videos-item">
<div class="grid-post-item bold_gpi fl-wrap">
<a href="{{ $v->url_video }}" class="gpm_link video-item fl-wrap">
<div class="video-item-img fl-wrap">
<img src="{{ $thumb[$i] }}" class="resppic" alt="" />
<div class="play-icon"><i class="fas fa-play"></i></div>
</div>
<div class="video-item-title">
<h4>{{ $v->nama_video }}</h4>
<span class="video-date"><i class="far fa-calendar"></i> <strong>{{ date('d M Y', strtotime($v->created_at)); }}</strong></span>
</div>
</a>
</div>
</div>
@if(empty(($i+1)%3))
</div>
<div class="grid-post-wrap gallery-items">
@endif
@endforeach
</div>
</div>
<div class="clearfix"></div>
{{ $video->links("pagination::bootstrap-4") }}
@endif
</div>
@else
<div class="row">
@if($hide)
<div class="col-md-4">
@elseif(!empty($image))
<div class="col-md-5">
@else
<div class="col-md-8">
@endif
@if($hide)
<div class="section-title sect_dec">
<h2>{{ $parent }}</h2>
<h4>{{ $param->title }}</h4>
</div>
@if(strtolower($kategori) == 'konsultasi')
<div class="box-widget-content">
<ul class="cat-wid-list">
@foreach($jenis as $i => $nama_jenis)
<li>
@if($default == $i )
<a href="{{ url($current.'/default/'.$i) }}" class="active">
@else
<a href="{{ url($current.'/default/'.$i) }}">
@endif
{{ $nama_jenis}}
</a>
</li>
@endforeach
</ul>
</div>
@else
<div class="box-widget-content">
<ul class="cat-wid-list">
@foreach($child as $c)
<li>
<a href="{{ url($c->target_content) }}" @if($c->id == $id ) class="active" @endif @if($c->redirect_content) target="_blank" @endif >
{{ $c->nama_content}}
</a>
</li>
@endforeach
</ul>
</div>
<br>&nbsp;<br>
<div class="box-widget-content">
<div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
<div class="content-tabs fl-wrap">
<ul class="tabs-menu fl-wrap no-list-style">
<li class="current"><a href="#tab-popular"> Berita </a></li>
<li><a href="#tab-resent">Opini</a></li>
</ul>
</div>
<div class="tabs-container">
<div class="tab">
<div id="tab-popular" class="tab-content first-tab">
<div class="post-widget-container fl-wrap">
@foreach($left as $l)
<div class="post-widget-item fl-wrap">
<div class="post-widget-item-media">
<a href="{{ url('berita').'/'.$l->slug_berita }}"><img src="{{ asset('images/berita').'/'.$l->image_berita }}" alt="" /></a>
</div>
<div class="post-widget-item-content">
<h4>
<a href="{{ url('berita').'/'.$l->slug_berita }}">
{{ $l->nama_berita }}
</a>
</h4>
<ul class="pwic_opt">
<li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($l->created_at)); }}</span></li>
<li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($l->created_at)); }}</span></li>
</ul>
</div>
</div>
@endforeach
</div>
</div>
</div>
<div class="tab">
<div id="tab-resent" class="tab-content">
<div class="post-widget-container fl-wrap">
@foreach($right as $r)
<div class="post-widget-item fl-wrap">
<div class="post-widget-item-media">
<a href="{{ url('opini').'/'.$r->slug_opini }}"><img src="{{ asset('images/opini').'/'.$r->image_opini }}" alt="" /></a>
</div>
<div class="post-widget-item-content">
<h4>
<a href="{{ url('opini').'/'.$r->slug_opini }}">
{{ $r->nama_opini }}
</a>
</h4>
<ul class="pwic_opt">
<li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($r->created_at)); }}</span></li>
<li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($r->created_at)); }}</span></li>
</ul>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
@endif
@else
@if(strtolower($kategori) == 'berita')
<div class="section-title">
<h2>{{ $title }}</h2>
<div class="row">
<div class="col-lg-6">
<h4>{{ $param->title }}</h4>
<br clear="all">
</div>
<div class="col-lg-6">
<form class="custom-form" />
@if($tags == 'jurnalis')
<select id="jurnalis" name="jurnalis" class="style-select tags-select">
<option value="0" @if(!$sumber_berita) selected @endif>Semua Jurnalis</option>
@foreach($penulis as $p)
@if($p->id == $sumber_berita)
<option value="{{ $p->id }}" selected> {{ $p->nama_user }}</option>
@else
<option value="{{ $p->id }}"> {{ $p->nama_user }}</option>
@endif
@endforeach
</select>
@elseif($tags == 'editor')
<select id="editor" name="editor" class="style-select tags-select">
<option value="0" @if(!$editor_berita) selected @endif>Semua Editor</option>
@foreach($penulis as $p)
@if($p->id == $editor_berita)
<option value="{{ $p->id }}" selected> {{ $p->nama_user }}</option>
@else
<option value="{{ $p->id }}"> {{ $p->nama_user }}</option>
@endif
@endforeach
</select>
@elseif($tags == 'fotografer')
<select id="fotografer" name="fotografer" class="style-select tags-select">
<option value="0" @if(!$fotografer_berita) selected @endif>Semua Fotografer</option>
@foreach($fotografer as $f)
@if($f->id == $fotografer_berita)
<option value="{{ $f->id }}" selected> {{ $f->nama_user }}</option>
@else
<option value="{{ $f->id }}"> {{ $f->nama_user }}</option>
@endif
@endforeach
</select>
@else
<select id="direktorat" name="direktorat" class="style-select tags-select">
<option value="0" @if(!$kategori_direktorat) selected @endif>Semua Direktorat</option>
@foreach($direktorat as $id => $nama)
@if($id == $kategori_direktorat)
<option value="{{ $id }}" selected> {{ $nama }}</option>
@else
<option value="{{ $id }}"> {{ $nama }}</option>
@endif
@endforeach
</select>
@endif
</form>
</div>
</div>
</div>
@else
<div class="section-title sect_dec">
<h2>{{ $title }}</h2>
<h4>{{ $param->title }}</h4>
</div>
@endif
<div class="about-wrap">
@if(in_array(strtolower($kategori), array('kontak', 'pengaduan', 'pertanyaan', 'jadwal')))
{{ alertContent() }}
@if(strtolower($kategori) == 'jadwal')
<p>Masukkan data sesuai lokasi anda, berdasarkan bulan dan tahun pada form dibawah ini.</p>
<form class="custom-form" id="form" action="{{ url($current).'/search' }}#search" method="post" />
@csrf
<fieldset>
<select id="propinsi" name="propinsi" class="style-select mb-3">
@foreach($propinsi as $p)
@if(strtolower(trim($p->name)) != 'pusat')
@if($p->id == $request->propinsi)
<option value="{{ $p->id }}" selected> {{ $p->name }}</option>
@else
<option value="{{ $p->id }}"> {{ $p->name }}</option>
@endif
@endif
@endforeach
</select>
<select id="kabupaten" name="kabupaten" class="style-select mb-3">
@foreach($kabupaten as $k)
@if($k->id == $request->kabupaten)
<option value="{{ $k->id }}" selected> {{ $k->name }}</option>
@else
<option value="{{ $k->id }}"> {{ $k->name }}</option>
@endif
@endforeach
</select>
@if(preg_match('/imsakiyah/i', $current))
<select id="tahun" name="tahun" class="style-select mb-3">
@foreach($tahun as $t => $y)
@if($t == $request->tahun)
<option value="{{ $t }}" selected>{{ $y }}</option>
@else
<option value="{{ $t }}">{{ $y }}</option>
@endif
@endforeach
</select>
@else
<div class="row">
<div class="col-md-6">
<select id="bulan" name="bulan" class="style-select mb-3">
@foreach($bulan as $b => $name)
@if($b == $request->bulan)
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
@if($t == $request->tahun)
<option value="{{ $t }}" selected>{{ $t }}</option>
@else
<option value="{{ $t }}">{{ $t }}</option>
@endif
@endforeach
</select>
</div>
</div>
@endif
</fieldset>
{!! htmlFormSnippet() !!}
<button id="search" class="btn color-bg">Cari Data <i class="fas fa-search"></i></button>
<span class="text-validate"><span>
</form>
@if(isset($jadwal->data))
<div id="footer-twiit" class="fl-wrap mt-4">
<div class="row">
<ul>
@foreach($jadwal->data as $j)
<div class="col-md-6">
<li>
<p class="tweet">
<a href="#">
<span>
{{ $j->tanggal }}
@if(preg_match('/imsakiyah/i', $current))
Ramadhan {{ $jadwal->hijriah }} H
@endif
</span>
</a><br>
<span style="float:left;width:25%;margin-top:15px">
<font style="font-weight:bold;color:#000">IMSAK</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/imsak.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->imsak }}</font>
</span>
<span style="float:left;width:25%;margin-top:15px">
<font style="font-weight:bold;color:#000">SUBUH</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/subuh.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->subuh }}</font>
</span>
<span style="float:left;width:25%;margin-top:15px">
<font style="font-weight:bold;color:#000">TERBIT</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/terbit.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->terbit }}</font>
</span>
<span style="float:left;width:25%;margin-top:15px">
<font style="font-weight:bold;color:#000">DHUHA</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/dhuha.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->dhuha }}</font>
</span><br>
<span style="float:left;width:25%;margin-top:10px">
<font style="font-weight:bold;color:#000">DZUHUR</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/dzuhur.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->dzuhur }}</font>
</span>
<span style="float:left;width:25%;margin-top:10px">
<font style="font-weight:bold;color:#000">ASHAR</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/ashar.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->ashar }}</font>
</span>
<span style="float:left;width:25%;margin-top:10px">
<font style="font-weight:bold;color:#000">MAGHRIB</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/maghrib.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->maghrib }}</font>
</span>
<span style="float:left;width:25%;margin-top:10px">
<font style="font-weight:bold;color:#000">ISYA</font><br>
<object type="image/svg+xml" data="{{ asset('images/icon/isya.svg') }}" height="12"></object>&nbsp;
<font style="font-weight:normal">{{ $j->isya }}</font>
</span>
</p>
</li>
</div>
@endforeach
</ul>
</div>
</div>
@endif
@endif
@if(strtolower($kategori) == 'kontak')
<p>Silahkan menyampaikan Saran, Kritik & Keluhan anda kepada kami.<br>
Mohon untuk mencantumkan data dengan benar dengan mengisi form yang telah disediakan dibawah ini.</p>
<form class="custom-form" id="form" action="{{ $current }}/store" method="post" />
@csrf
<fieldset>
<input type="text" name="nama_kontak" id="nama_kontak" placeholder="Nama Lengkap" required="" />
<input type="email" name="email_kontak" id="email_kontak" placeholder="Alamat email" required="" />
<textarea name="detail_kontak" id="detail_kontak" cols="40" rows="3" placeholder="Pesan Anda" required=""></textarea>
</fieldset>
{!! htmlFormSnippet() !!}
<button class="btn color-bg">Kirim Pesan <i class="fas fa-caret-right"></i></button>
<span class="text-validate"><span>
</form>
@endif
@if(strtolower($kategori) == 'pengaduan')
<p>Silahkan menyampaikan Saran, Kritik & Keluhan anda kepada kami.<br>
Mohon untuk mencantumkan data dengan benar dengan mengisi form yang telah disediakan dibawah ini.</p>
<form class="custom-form" id="form" action="{{ $current }}/store" method="post" />
@csrf
<fieldset>
<input type="text" name="nama_pengaduan" id="nama_pengaduan" placeholder="Nama Lengkap" required="" />
<input type="number" name="nik_pengaduan" id="nik_pengaduan" placeholder="NIK" required="" />
<input type="email" name="email_pengaduan" id="email_pengaduan" placeholder="Alamat email" required="" />
<input type="number" name="telepon_pengaduan" id="telepon_pengaduan" placeholder="Nomor Telepon" required="" />
<textarea name="alamat_pengaduan" id="alamat_pengaduan" cols="40" rows="3" placeholder="Alamat" required=""></textarea>
<textarea name="detail_pengaduan" id="detail_pengaduan" cols="40" rows="3" placeholder="Isi Pengaduan" required=""></textarea>
</fieldset>
<p>Dengan ini, saya selaku pelapor membenarkan informasi yang saya kirimkan valid tanpa tekanan dari pihak manapun dan saya bertanggungjawab atas informasi yang saya kirimkan ini.</p>
{!! htmlFormSnippet() !!}
<button class="btn color-bg">Kirim Pesan <i class="fas fa-caret-right"></i></button>
<span class="text-validate"><span>
</form>
@endif
@if(strtolower($kategori) == 'pertanyaan')
<p>Silahkan mengirimkan pertanyaan anda kepada kami.<br>
Mohon untuk mencantumkan data dengan benar dengan mengisi form yang telah disediakan dibawah ini.</p>
<form class="custom-form" id="form" action="{{ $current }}/store" method="post" />
@csrf
<fieldset>
<input type="text" name="nama_konsultasi" id="nama_konsultasi" placeholder="Nama Lengkap" required="" />
<input type="email" name="email_konsultasi" id="email_konsultasi" placeholder="Alamat Email" required="" />
<input type="text" name="kota_konsultasi" id="kota_konsultasi" placeholder="Kabupaten/Kota" required="" />
<div class="row">
<div class="col-md-6">
<select id="kelamin_konsultasi" name="kelamin_konsultasi" class="style-select no-search-select" required="">
<option value="" disabled selected>Jenis Kelamin</option>
<option value="l">Laki-Laki</option>
<option value="p">Perempuan</option>
</select>
</div>
<div class="col-md-6">
<input type="number" name="usia_konsultasi" id="usia_konsultasi" placeholder="Usia" required="" />
</div>
</div>
<input type="text" name="judul_konsultasi" id="judul_konsultasi" placeholder="Judul" required="" />
<textarea name="detail_konsultasi" id="detail_konsultasi" cols="40" rows="3" placeholder="Isi Pertanyaan" required=""></textarea>
</fieldset>
{!! htmlFormSnippet() !!}
<button class="btn color-bg">Kirim Pesan <i class="fas fa-caret-right"></i></button>
<span class="text-validate"><span>
</form>
@endif
@else
{!! $detail !!}
@endif
</div>
@if(strtolower($kategori) == 'dokumen' && count($dokumen))
<div class="row">
@foreach($dokumen as $i => $d)
<div class="col-md-3">
<div class="det-box">
<a href="#" class="det-box-media" data-toggle="modal" data-target="#modal-dokumen" onclick="doc('{{ $d->nama_dokumen }}','{{ asset('files').'/'.$d->file_dokumen }}')">
<span>
<i class="fas fa-search"></i> Detail
</span>
<img src="{{ asset('images/icon/doc.png')}}" alt="" class="resppic" />
</a>
<div class="det-box-ietm dbig dbi_shop fl-wrap text-left">
<a href="#" data-toggle="modal" data-target="#modal-dokumen" onclick="doc('{{ $d->nama_dokumen }}','{{ asset('files').'/'.$d->file_dokumen }}')">
{{ $d->nama_dokumen }}
</a>
</div>
</div>
</div>
@if(empty(($i+1)%4))
</div>
<div class="row">
@endif
@endforeach
</div>
<div class="clearfix"></div>
{{ $dokumen->links("pagination::bootstrap-4") }}
@endif
@if(strtolower($kategori) == 'berita' && count($berita))
<div class="grid-post-wrap">
<div class="row">
@foreach($berita as $i => $b)
<div class="col-md-6">
<div class="grid-post-item bold_gpi fl-wrap">
<div class="grid-post-media">
<a href="{{ url($current).'/'.$b->slug_berita }}" class="gpm_link">
<div class="bg-wrap">
<div class="bg" data-bg="{{ asset('images/berita').'/'.$b->image_berita }}"></div>
</div>
</a>
</div>
<div class="grid-post-content">
<h3>
<a href="{{ url($current).'/'.$b->slug_berita }}">
{{ $b->nama_berita }}
</a>
</h3>
<span class="post-date">
<i class="far fa-calendar"></i>&nbsp;&nbsp;{{ date('d M Y', strtotime($b->created_at)); }}
&nbsp;&nbsp;&nbsp;
<i class="far fa-clock"></i>{{ date('H:i', strtotime($b->created_at)); }}
@isset($direktorat[$b->kategori_direktorat])
<br clear="all" style="margin-bottom:5px">
<a href="{{ url('direktorat').'/'.slug($direktorat[$b->kategori_direktorat]) }}" class="tags">
<i class="fas fa-university"></i> {{ $direktorat[$b->kategori_direktorat] }}
</a>
@endisset
</span>
<p>
{{ $b->keterangan_berita ?: trunc(clean($b->detail_berita),50) }}
</p>
</div>
</div>
</div>
@if(empty(($i+1)%2))
</div>
<div class="row">
@endif
@endforeach
</div>
</div>
<div class="clearfix"></div>
{{ $berita->links("pagination::bootstrap-4") }}
@endif
@if(strtolower($kategori) == 'opini' && count($opini))
<div class="grid-post-wrap">
<div class="row">
@foreach($opini as $i => $o)
<div class="col-md-6">
<div class="grid-post-item bold_gpi fl-wrap">
<div class="grid-post-media">
<a href="{{ url($current).'/'.$o->slug_opini }}" class="gpm_link">
<div class="bg-wrap">
<div class="bg" data-bg="{{ asset('images/opini').'/'.$o->image_opini }}"></div>
</div>
</a>
</div>
<div class="grid-post-content">
<h3>
<a href="{{ url($current).'/'.$o->slug_opini }}">
{{ $o->nama_opini }}
</a>
</h3>
<span class="post-date">
<i class="far fa-calendar"></i> {{ date('d M Y', strtotime($o->created_at)); }}
&nbsp;&nbsp;&nbsp;
<i class="far fa-clock"></i> {{ date('H:i', strtotime($o->created_at)); }}
</span>
<p>{{ $o->keterangan_opini }}</p>
</div>
</div>
</div>
@if(empty(($i+1)%2))
</div>
<div class="row">
@endif
@endforeach
</div>
</div>
<div class="clearfix"></div>
{{ $opini->links("pagination::bootstrap-4") }}
@endif
@if(strtolower($kategori) == 'tokoh' && count($tokoh))
<div class="grid-post-wrap">
<div class="row">
@foreach($tokoh as $i => $t)
<div class="col-md-6">
<div class="grid-post-item bold_gpi fl-wrap">
<div class="grid-post-media">
<a href="{{ url($current).'/'.$t->slug_tokoh }}" class="gpm_link">
<div class="bg-wrap">
<div class="bg" data-bg="{{ asset('images/tokoh').'/'.$t->image_tokoh }}"></div>
</div>
</a>
</div>
<div class="grid-post-content">
<h3>
<a href="{{ url($current).'/'.$t->slug_tokoh }}">
{{ $t->nama_tokoh }}
</a>
</h3>
<span class="post-date">
<i class="far fa-calendar"></i> {{ date('d M Y', strtotime($t->created_at)); }}
&nbsp;&nbsp;&nbsp;
<i class="far fa-clock"></i> {{ date('H:i', strtotime($t->created_at)); }}
</span>
<p>{{ $t->keterangan_tokoh }}</p>
</div>
</div>
</div>
@if(empty(($i+1)%2))
</div>
<div class="row">
@endif
@endforeach
</div>
</div>
<div class="clearfix"></div>
{{ $tokoh->links("pagination::bootstrap-4") }}
@endif
@if(strtolower($kategori) == 'bimbingan' && count($bimbingan))
<div class="grid-post-wrap">
<div class="row">
@foreach($bimbingan as $i => $b)
<div class="col-md-6">
<div class="grid-post-item bold_gpi fl-wrap">
<div class="grid-post-media">
<a href="{{ url($current).'/'.$b->slug_bimbingan }}" class="gpm_link">
<div class="bg-wrap">
<div class="bg" data-bg="{{ asset('images/bimbingan').'/'.$b->image_bimbingan }}"></div>
</div>
</a>
</div>
<div class="grid-post-content">
<h3>
<a href="{{ url($current).'/'.$b->slug_bimbingan }}">
{{ $b->nama_bimbingan }}
</a>
</h3>
<span class="post-date">
<i class="far fa-calendar"></i> {{ date('d M Y', strtotime($b->created_at)); }}
&nbsp;&nbsp;&nbsp;
<i class="far fa-clock"></i> {{ date('H:i', strtotime($b->created_at)); }}
</span>
<p>{{ $b->keterangan_bimbingan }}</p>
</div>
</div>
</div>
@if(empty(($i+1)%2))
</div>
<div class="row">
@endif
@endforeach
</div>
</div>
<div class="clearfix"></div>
{{ $bimbingan->links("pagination::bootstrap-4") }}
@endif
@endif
</div>
@if($hide)
<div class="col-md-8">
<div class="main-container fl-wrap fix-container-init cen-align-container text-left">
<div class="about-wrap fl-wrap">
@if(strtolower($kategori) == 'konsultasi')
<h3>{{ $jenis[$default] }}</h3><br>
@if(count($konsultasi))
<div id="footer-twiit" class="fl-wrap">
<ul>
@foreach($konsultasi as $i => $k)
<li>
<p class="tweet">
<i class="far fa-user"></i> {{ $k->nama_konsultasi }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="far fa-map-marker"></i> {{ $k->kota_konsultasi }}<br>
<a href="{{ url($current).'/'.getLink($k->judul_konsultasi.' '.$k->nama_konsultasi.' '.$k->kota_konsultasi) }}"><span class="text-primary">{{ $k->judul_konsultasi }}</span></a><br>
{{ substr($k->detail_konsultasi,0,200).(strlen($k->detail_konsultasi) > 200 ? '...' : '') }}
</p>
</li>
@endforeach
</ul>
</div>
<div class="clearfix"></div>
{{ $konsultasi->links("pagination::bootstrap-4") }}
@else
<div style="text-align:center">
<img src="{{ asset('images/empty.png')}}" style="width:150px"><br>
<span style="color:#999">belum ada data</span>
</div>
@endif
@else
<h3>{{ $title }}</h3><br>
{!! $detail !!}
@endif
</div>
@if(strtolower($kategori) == 'dokumen' && count($dokumen))
<div class="row">
@foreach($dokumen as $i => $d)
<div class="col-md-3">
<div class="det-box">
<a href="#" class="det-box-media" data-toggle="modal" data-target="#modal-dokumen" onclick="doc('{{ $d->nama_dokumen }}','{{ asset('files').'/'.$d->file_dokumen }}')">
<span>
<i class="fas fa-search"></i> Detail
</span>
<img src="{{ asset('images/icon/doc.png')}}" alt="" class="resppic" />
</a>
<div class="det-box-ietm dbig dbi_shop fl-wrap text-left">
<a href="#" data-toggle="modal" data-target="#modal-dokumen" onclick="doc('{{ $d->nama_dokumen }}','{{ asset('files').'/'.$d->file_dokumen }}')">
{{ $d->nama_dokumen }}
</a>
</div>
</div>
</div>
@if(empty(($i+1)%4))
</div>
<div class="row">
@endif
@endforeach
</div>
<div class="clearfix"></div>
{{ $dokumen->links("pagination::bootstrap-4") }}
@endif
</div>
</div>
@elseif(!empty($image))
<div class="col-md-1"></div>
<div class="col-md-6">
<div class="about-img fl-wrap">
<img src="{{ asset('images/content').'/'.$image }}" class="resppic" alt="" />
@if(!empty($keterangan))
<div class="about-img-hotifer color-bg">
<p>{{ $keterangan }}</p>
</div>
@endif
</div>
</div>
@else
<div class="col-md-4">
@if(in_array(strtolower($kategori), array('kontak', 'pengaduan')))
{!! $detail !!}
@else
<div class="sidebar-content fl-wrap fixed-bar">
<div class="box-widget fl-wrap">
<div class="box-widget-content">
<div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
<div class="content-tabs fl-wrap">
<ul class="tabs-menu fl-wrap no-list-style">
<li class="current"><a href="#tab-popular"> {{ strtolower($kategori) == 'berita' ? 'Opini' : 'Berita' }} </a></li>
<li><a href="#tab-resent">{{ !in_array(strtolower($kategori), array('berita', 'opini')) ? 'Opini' : 'Tokoh' }}</a></li>
</ul>
</div>
<div class="tabs-container">
<div class="tab">
<div id="tab-popular" class="tab-content first-tab">
<div class="post-widget-container fl-wrap">
@foreach($left as $l)
<div class="post-widget-item fl-wrap">
<div class="post-widget-item-media">
<a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}"><img src="{{ asset('images/'.(strtolower($kategori) == 'berita' ? 'opini' : 'berita')).'/'.$l->{'image_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}" alt="" /></a>
</div>
<div class="post-widget-item-content">
<h4>
<a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">
{{ $l->{'nama_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}
</a>
</h4>
<ul class="pwic_opt">
<li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($l->created_at)); }}</span></li>
<li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($l->created_at)); }}</span></li>
</ul>
</div>
</div>
@endforeach
</div>
</div>
</div>
<div class="tab">
<div id="tab-resent" class="tab-content">
<div class="post-widget-container fl-wrap">
@foreach($right as $r)
<div class="post-widget-item fl-wrap">
<div class="post-widget-item-media">
<a href="{{ url(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini/'.$r->slug_opini : 'tokoh/'.$r->slug_tokoh)}}"><img src="{{ asset('images/'.(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini' : 'tokoh')).'/'.$r->{'image_'.strtolower(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini' : 'tokoh')} }}" alt="" /></a>
</div>
<div class="post-widget-item-content">
<h4>
<a href="{{ url(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini/'.$r->slug_opini : 'tokoh/'.$l->slug_tokoh) }}">
{{ $r->{'nama_'.strtolower(!in_array(strtolower($kategori), array('berita', 'opini')) ? 'opini' : 'tokoh')} }}
</a>
</h4>
<ul class="pwic_opt">
<li><span><i class="far fa-calendar"></i> {{ date('d M Y', strtotime($r->created_at)); }}</span></li>
<li><span><i class="far fa-clock"></i> {{ date('H:i', strtotime($r->created_at)); }}</span></li>
</ul>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@if(!empty($parent))
<div class="box-widget fl-wrap">
<div class="widget-title">{{ $parent }}</div>
<div class="box-widget-content">
<ul class="cat-wid-list">
@foreach($child as $c)
<li>
<a href="{{ url($c->target_content) }}" @if($c->id == $id ) class="active" @endif @if($c->redirect_content) target="_blank" @endif >
{{ $c->nama_content}}
</a>
</li>
@endforeach
</ul>
</div>
</div>
@endif
@if(in_array(strtolower($kategori), array('berita', 'opini', 'tokoh')))
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
@endif
</div>
@endif
</div>
@endif
</div>
@endif
</div>
<div class="sec-dec"></div>
</section>
</div>
@include('footer')