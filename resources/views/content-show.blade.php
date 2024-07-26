@include('header')
<div class="post-single-wrapper axil-section-gap bg-color-white">
<div class="container">
<div class="row">
@if(empty($image))
<div class="col-lg-8">
@else
<div class="col-lg-6">
@endif
<div class="axil-post-details mb--30">
@if(strtolower($kategori) == 'berita')
<div class="row">
<div class="col-lg-5">
<h1 class="poppins-medium">{{ $title }}</h1>
</div>
<div class="col-lg-7 text-end">
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
<option value="0" @if(!$kategori_direktorat) selected @endif>Semua Kategori</option>
@foreach($direktorat as $id => $nama)
@if($id == $kategori_direktorat)
<option value="{{ $id }}" selected> {{ $nama }}</option>
@else
<option value="{{ $id }}"> {{ $nama }}</option>
@endif
@endforeach
</select>
@endif
</div>
</div>
@else
<p class="has-medium-font-size">{{ strtolower($kategori) == 'konsultasi' ? $jenis[$default] : $title }}</p>
@endif
@if(strtolower($kategori) != 'kontak')
{!! $detail !!}
@endif
</div>
@if(in_array(strtolower($kategori), array('kontak', 'pengaduan', 'pertanyaan')))
{{ alertContent() }}
@endif
@if(strtolower($kategori) == 'dokumen')
@if(count($dokumen))
<div class="row mb--30">
<div class="col-lg-12">
<div class="list-categories d-flex flex-wrap mb--50">
@foreach($dokumen as $i => $d)
<div class="single-doc">
<a href="#" data-bs-toggle="modal" data-bs-target="#modal-dokumen" onclick="doc('{{ $d->nama_dokumen }}','{{ asset('files').'/'.$d->file_dokumen }}')">
<div class="inner">
<div class="thumbnail">
<img src="{{ asset('images/icon/doc.png')}}">
</div>
<div class="content">
<small>{{ $d->nama_dokumen }}</small>
</div>
</div>
</a>
</div>
@endforeach
</div>
</div>
</div>
{{ $dokumen->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'link')
@if(count($link))
<div class="row mb--30">
<div class="col-lg-12">
<div class="list-categories d-flex flex-wrap mb--50">
@foreach($link as $i => $l)
<div class="single-link">
<a href="{{ $l->url_link }}" target="_blank">
<div class="inner">
<div class="thumbnail">
<img src="{{ asset('images/link').'/'.$l->image_link }}">
</div>
<div class="content">
<small>{{ $l->nama_link }}</small>
</div>
</div>
</a>
</div>
@endforeach
</div>
</div>
</div>
{{ $link->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'berita')
@if(count($berita))
@foreach($berita as $i => $b)
<div class="content-block post-list-view mt--30">
<div class="post-thumbnail">
<div class="post-thumbnail-list">
<a href="{{ url($current).'/'.$b->slug_berita }}">
<img src="{{ asset('images/berita').'/'.$b->image_berita }}">
</a>
</div>
</div>
<div class="post-content">
@isset($direktorat[$b->kategori_direktorat])
<div class="post-cat">
<div class="post-cat-list">
<a class="hover-flip-item-wrapper" href="{{ url('direktorat').'/'.slug($direktorat[$b->kategori_direktorat]) }}">
<span data-text="{{ $direktorat[$b->kategori_direktorat] }}">{{ $direktorat[$b->kategori_direktorat] }}</span>
</a>
</div>
</div>
@endisset
<h6 class="title mb--10">
<a href="{{ url($current).'/'.$b->slug_berita }}">{{ $b->nama_berita }}</a>
</h6>
<ul class="post-meta-list">
<li>{{ date('d M Y H:i', strtotime($b->created_at)) }}</li>
</ul>
</div>
</div>
@endforeach
<br clear="all">
{{ $berita->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'opini')
@if(count($opini))
@foreach($opini as $i => $o)
<div class="content-block post-list-view mt--30">
<div class="post-thumbnail">
<div class="post-thumbnail-list">
<a href="{{ url($current).'/'.$o->slug_opini }}">
    @if($o->id_lama)
    <img src="{{ asset('images/berita').'/'.$o->image_opini }}">
    @else
    <img src="{{ asset('images/opini').'/'.$o->image_opini }}">
    @endif
</a>
</div>
</div>
<div class="post-content">
<h6 class="title mb--10">
<a href="{{ url($current).'/'.$o->slug_opini }}">{{ $o->nama_opini }}</a>
</h6>
<small>{{ trunc(clean($o->keterangan_opini),15) }} ...</small>
<ul class="post-meta-list">
<li>{{ date('d M Y H:i', strtotime($o->created_at)) }}</li>
</ul>
</div>
</div>
@endforeach
<br clear="all">
{{ $opini->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'tokoh')
@if(count($tokoh))
@foreach($tokoh as $i => $t)
<div class="content-block post-list-view mt--30">
<div class="post-thumbnail">
<div class="post-thumbnail-list">
<a href="{{ url($current).'/'.$t->slug_tokoh }}">
<img src="{{ asset('images/tokoh').'/'.$t->image_tokoh }}">
</a>
</div>
</div>
<div class="post-content">
<h6 class="title mb--10">
<a href="{{ url($current).'/'.$t->slug_tokoh }}">{{ $t->nama_tokoh }}</a>
</h6>
<small>{{ trunc(clean($t->keterangan_tokoh),15) }} ...</small>
<ul class="post-meta-list">
<li>{{ date('d M Y H:i', strtotime($t->created_at)) }}</li>
</ul>
</div>
</div>
@endforeach
<br clear="all">
{{ $tokoh->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'bimbingan')
@if(count($bimbingan))
@foreach($bimbingan as $i => $b)
<div class="content-block post-list-view mt--30">
<div class="post-thumbnail">
<div class="post-thumbnail-list">
<a href="{{ url($current).'/'.$b->slug_bimbingan }}">
<img src="{{ asset('images/bimbingan').'/'.$b->image_bimbingan }}">
</a>
</div>
</div>
<div class="post-content">
<h6 class="title mb--10">
<a href="{{ url($current).'/'.$b->slug_bimbingan }}">{{ $b->nama_bimbingan }}</a>
</h6>
<small>{{ trunc(clean($b->keterangan_bimbingan),15) }} ...</small>
<ul class="post-meta-list">
<li>{{ date('d M Y H:i', strtotime($b->created_at)) }}</li>
</ul>
</div>
</div>
@endforeach
<br clear="all">
{{ $bimbingan->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'foto')
@if(count($foto))
<div class="row mb--30">
<div class="col-lg-12">
<div class="list-categories d-flex flex-wrap lightgallery mb--50">
@foreach($foto as $i => $f)
<div class="single-link">
<a href="{{ asset('images/foto').'/'.$f->image_foto }}" class="popup-image" title="{{ '<div style="text-align:left;"><b>'.$f->nama_foto.'</b><br>'.$f->keterangan_foto.'</div>' }}">
<div class="inner">
<div class="thumbnail">
<img src="{{ asset('images/foto').'/'.$f->image_foto }}">
</div>
<div class="content">
<small>{{ $f->nama_foto }}</small>
</div>
</div>
</a>
</div>
@endforeach
</div>
</div>
</div>
{{ $foto->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'video')
@if(count($video))
<div class="row mb--30">
<div class="col-lg-12">
<div class="list-categories d-flex flex-wrap lightgallery mb--50">
@foreach($video as $i => $v)
<div class="single-video">
<a href="{{ $v->url_video }}" class="popup-image">
<div class="inner">
<div class="thumbnail">
<img src="{{ $thumb[$i] }}" alt="{{ $v->nama_video }}">
<a class="video-popup size-medium position-top-center popup-image" href="{{ $v->url_video }}"><span class="play-icon"></span></a>
</div>
<div class="content">
<h6 class="title">{{ $v->nama_video }}<h6 class="title">
</div>
</div>
</a>
</div>
@endforeach
</div>
</div>
</div>
{{ $video->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'konsultasi')
@if(count($konsultasi))
@foreach($konsultasi as $i => $k)
<div class="content-block post-list-view mt--30">
<div class="post-content">
<h6 class="title mb--10">
<a href="{{ url($current).'/'.getLink($k->judul_konsultasi.' '.$k->nama_konsultasi.' '.$k->kota_konsultasi) }}">{{ $k->judul_konsultasi }}</a>
</h6>
<small>{{ substr($k->detail_konsultasi,0,200).(strlen($k->detail_konsultasi) > 200 ? '...' : '') }}</small>
<ul class="post-meta-list">
<li>{{ $k->nama_konsultasi }}</li>
<li>{{ $k->kota_konsultasi }}</li>
</ul>
</div>
</div>
@endforeach
<br clear="all">
{{ $konsultasi->links("pagination::bootstrap-4") }}
@else
<small>belum ada data</small>
@endif
@endif
@if(strtolower($kategori) == 'kontak')
<small>
Repositori Seni Budaya Islam Berbasis Digital adalah repositori berbagai tradisi keagamaan Islam yang ada di seluruh Indonesia. Repositori berbasis digital ini diharapkan dapat menghasilkan; 
<ul>
    <li>Penyelamatan kandungan informasi dalam seni budaya Islam</li>
    <li>Membuka dan memperluas akses masyarakat terhadap seni budaya Islam</li>
    <li>Menjadi bahan referensi bagi pengembangan ilmu pengetahuan dan teknologi dari nilai-nilai yang terkandung dalam seni budaya Islam seperti nilai moral, pendidikan, agama, dan lain-lain.</li>
</ul>
</small>

@endif
@if(strtolower($kategori) == 'pengaduan')
<small>
Silahkan menyampaikan Saran, Kritik & Keluhan anda kepada kami.<br>
Mohon untuk mencantumkan data dengan benar dengan mengisi form yang telah disediakan dibawah ini.
</small>
<form class="custom-form mt--10 mb--40" id="form" action="{{ $current }}/store" method="post" />
@csrf
<input type="text" name="nama_pengaduan" id="nama_pengaduan" placeholder="Nama Lengkap" required="" />
<input type="number" name="nik_pengaduan" id="nik_pengaduan" placeholder="NIK" required="" />
<input type="email" name="email_pengaduan" id="email_pengaduan" placeholder="Alamat email" required="" />
<input type="number" name="telepon_pengaduan" id="telepon_pengaduan" placeholder="Nomor Telepon" required="" />
<textarea name="alamat_pengaduan" id="alamat_pengaduan" cols="40" rows="3" placeholder="Alamat" required=""></textarea>
<textarea name="detail_pengaduan" id="detail_pengaduan" cols="40" rows="3" placeholder="Isi Pengaduan" required=""></textarea>
<small>
Dengan ini, saya selaku pelapor membenarkan informasi yang saya kirimkan valid tanpa tekanan dari pihak manapun dan saya bertanggungjawab atas informasi yang saya kirimkan ini
</small>
<div class="row mb--10">
<div class="col-md-6">
{!! htmlFormSnippet() !!}
</div>
<div class="col-md-6">
<span class="text-validate"><span>
</div>
</div>
<button id="kirim" name="kirim" type="submit" id="submit" class="axil-button button-rounded">Kirim Pesan</button>
</form>
@endif
@if(strtolower($kategori) == 'pertanyaan')
<small>
Silahkan mengirimkan pertanyaan anda kepada kami.<br>
Mohon untuk mencantumkan data dengan benar dengan mengisi form yang telah disediakan dibawah ini.
</small>
<form class="custom-form mt--10 mb--40" id="form" action="{{ $current }}/store" method="post" />
@csrf
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
<div class="row mb--10">
<div class="col-md-6">
{!! htmlFormSnippet() !!}
</div>
<div class="col-md-6">
<span class="text-validate"><span>
</div>
</div>
<button id="kirim" name="kirim" type="submit" id="submit" class="axil-button button-rounded">Kirim Pesan</button>
</form>
@endif
</div>
@if(empty($image))
<div class="col-lg-4">
@else
<div class="col-lg-6">
@endif
@if(!empty($image))
<div class="axil-banner">
<div class="thumbnail">
<a href="#">
<img class="w-100" src="{{ asset('images/content').'/'.$image }}">
</a>
</div>
</div>
@else
<div class="sidebar-inner">
@if(!$hide && strtolower($kategori) != 'kontak')
<div class="axil-single-widget widget widget_postlist mb--30">
<h5 class="widget-title">{{ strtolower($kategori) == 'berita' ? 'Opini' : 'Berita Terkini' }}</h5>
<div class="post-medium-block">
@foreach($left as $l)
<div class="content-block post-medium mb--20">
<div class="post-thumbnail">
<div class="post-thumbnail-image">
<a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">
<img src="{{ asset('images/'.(strtolower($kategori) == 'berita' ? 'opini' : 'berita')).'/'.$l->{'image_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}">
</a>
</div>
</div>
<div class="post-content">
<h6 class="title"><a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">{{ $l->{'nama_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}</a></h6>
<div class="post-meta">
<ul class="post-meta-list">
<li>{{ date('d M Y H:i', strtotime($l->created_at)); }}</li>
</ul>
</div>
</div>
</div>
@endforeach
</div>
</div>
@endif
@if(strtolower($kategori) == 'kontak')
{!! $detail !!}
@endif
@if(strtolower($kategori) == 'konsultasi')
<div class="axil-single-widget widget widget_archive mb--30">
<h5 class="widget-title">{{ $parent }}</h5>
<ul>
@foreach($jenis as $i => $nama_jenis)
<li><a href="{{ url($current.'/default/'.$i) }}">{{ $nama_jenis}}</a></li>
@endforeach
</ul>
</div>
@else
@if(!empty($parent))
<div class="axil-single-widget widget widget_archive mb--30">
<h5 class="widget-title">{{ $parent }}</h5>
<ul>
@foreach($child as $c)
<li><a href="{{ url($c->target_content) }}" @if($c->id == $id ) class="active" @endif @if($c->redirect_content) target="_blank" @endif >{{ $c->nama_content}}</a></li>
@endforeach
</ul>
</div>
@endif
@endif
@if($hide)
<div class="axil-single-widget widget widget_postlist mb--30">
<h5 class="widget-title">{{ strtolower($kategori) == 'berita' ? 'Opini' : 'Berita Terkini' }}</h5>
<div class="post-medium-block">
@foreach($left as $l)
<div class="content-block post-medium mb--20">
<div class="post-thumbnail">
<div class="post-thumbnail-image">
<a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">
<img src="{{ asset('images/'.(strtolower($kategori) == 'berita' ? 'opini' : 'berita')).'/'.$l->{'image_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}">
</a>
</div>
</div>
<div class="post-content">
<h6 class="title"><a href="{{ url(strtolower($kategori) == 'berita' ? 'opini/'.$l->slug_opini : 'berita/'.$l->slug_berita) }}">{{ $l->{'nama_'.strtolower(strtolower($kategori) == 'berita' ? 'opini' : 'berita')} }}</a></h6>
<div class="post-meta">
<ul class="post-meta-list">
<li>{{ date('d M Y H:i', strtotime($l->created_at)); }}</li>
</ul>
</div>
</div>
</div>
@endforeach
</div>
</div>
@endif
</div>
@endif
</div>
</div>
</div>
</div>
@include('footer')