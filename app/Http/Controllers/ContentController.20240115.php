<?php

namespace App\Http\Controllers;

use App\Classes\ClassContent;
use App\Models\Parameter;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Jenis;
use App\Models\Direktorat;
use App\Models\Banner;
use App\Models\Dokumen;
use App\Models\Berita;
use App\Models\Opini;
use App\Models\Tokoh;
use App\Models\Foto;
use App\Models\Video;
use App\Models\Links;
use App\Models\Bimbingan;
use App\Models\Kontak;
use App\Models\Pengaduan;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ContentController extends Controller {

    public function __construct() {
        $this->banner = Banner::where('status_banner', 't')->orderBy('created_at', 'desc')->get();

        $this->direktorat = array();
        foreach (Direktorat::where('status', 't')->get() as $d) {
            $this->direktorat[$d->id] = $d->nama;
        }
    }

    public function index() {
        $content = ClassContent::view('home');
        $parameter = $content['param'];

        $menu = $icon = array();
        foreach ($content['content'] as $c) {
            $menu[$c->induk_content][] = $c;
            if (!empty($c->icon_content)) {
                $icon[$c->id] = $c;
            }

            if (isset($c->detail_content)) {
                foreach ($c->detail_content as $d) {
                    $menu[$d->induk_content][] = $d;
                    if (!empty($d->icon_content)) {
                        $icon[$d->id] = $d;
                    }
                }
            }
        }

        $berita = $top = $slide = $head = $main = $middle = $swipe = $bottom = array();
        foreach (Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(20) as $b) {
            $berita[] = $b;
        }
        foreach ($berita as $i => $b) {
            if ($i < 3) {
                $slide[] = $b;
            } elseif ($i < 7) {
                $head[] = $b;
            } elseif ($i < 12) {
                $main[] = $b;
            } elseif ($i < 14) {
                $middle[] = $b;
            } elseif ($i < 16) {
                $swipe[] = $b;
            } else {
                $bottom[] = $b;
            }
        }
        $temp = array_merge($slide, $head);
        if (count($temp) > 4) {
            foreach (array_rand($temp, 5) as $t) {
                $top[] = $temp[$t];
            }
        }

        $opini = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        $tokoh = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        $konsultasi = Konsultasi::where('status_konsultasi', 't')->orderBy('created_at', 'desc')->paginate(2);

        $video = array();
        foreach (Video::where('status_video', 't')->orderBy('created_at', 'desc')->paginate(5) as $v) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $v->url_video, $match);
            $id_video = $match[1];
            $v->image_video = 'https://img.youtube.com/vi/' . $id_video . '/maxresdefault.jpg';
            $video[] = $v;
        }

        $foto = Foto::where('status_foto', 't')->orderBy('created_at', 'desc')->paginate(10);

        $propinsi = Http::post(env('APP_API') . 'apiv1/ajax/getApiProv')->getBody()->getContents();
        $propinsi = str_replace('provKode', 'id', $propinsi);
        $propinsi = str_replace('provNama', 'name', $propinsi);
        $propinsi = json_decode($propinsi, false);

        $id_propinsi = 0;
        if (isset($propinsi)) {
            foreach ($propinsi as $p) {
                if (strtolower(trim($p->name)) == 'dki jakarta')
                    $id_propinsi = $p->id;
            }
        }

        $kabupaten = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiKabko', [
                    'x' => $id_propinsi,
                ])->getBody()->getContents();
        $kabupaten = str_replace('kabkoKode', 'id', $kabupaten);
        $kabupaten = str_replace('kabkoNama', 'name', $kabupaten);
        $kabupaten = json_decode($kabupaten, false);

        $id_kabupaten = 0;
        if (isset($kabupaten)) {
            foreach ($kabupaten as $k) {
                if (empty($id_kabupaten))
                    $id_kabupaten = $k->id;
            }
        }

        for ($m = 1; $m <= 12; $m++)
            $bulan[$m] = getBulan($m);

        $tahun = array();
        for ($y = date('Y') - 5; $y <= date('Y') + 5; $y++)
            $tahun[] = $y;

        $hijriah = Http::post(env('APP_API') . 'apiv1/ajax/getTahunimsak')->getBody()->getContents();
        $hijriah = explode("</option><option value='", $hijriah);
        $dta = array();
        foreach ($hijriah as $val) {
            list($t, $y) = explode("' >", $val);
            $dta[preg_replace("/[^0-9]/", "", $t)] = strip_tags($y);
        }
        $hijriah = json_decode(json_encode($dta), false);

        $shalat = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiSholatbln', [
                    'prov' => $id_propinsi,
                    'kabko' => $id_kabupaten,
                    'thn' => date('Y'),
                    'bln' => date('m'),
                ])->getBody()->getContents();
        $shalat = str_replace('prov', 'propinsi', $shalat);
        $shalat = str_replace('kabko', 'kabupaten', $shalat);
        $shalat = json_decode($shalat, false);

        $jadwal = array();
        if (isset($shalat->data)) {
            foreach ($shalat->data as $d => $j) {
                if (date('Y-m-d') == $d)
                    $jadwal = $j;
            }
        }
        
        $data = array_merge(
                $content,
                array('menu' => $menu),
                array('icon' => $icon),
                array('direktorat' => $this->direktorat),
                array('banner' => $this->banner),
                array('top' => $top),
                array('slide' => $slide),
                array('head' => $head),
                array('main' => $main),
                array('middle' => $middle),
                array('swipe' => $swipe),
                array('bottom' => $bottom),
                array('opini' => $opini),
                array('tokoh' => $tokoh),
                array('video' => $video),
                array('foto' => $foto),
                array('konsultasi' => $konsultasi),
                array('propinsi' => $propinsi),
                array('kabupaten' => $kabupaten),
                array('bulan' => $bulan),
                array('tahun' => $tahun),
                array('hijriah' => $hijriah),
                array('jadwal' => $jadwal),
        );
        return view('content', $data);
    }

    public function pojok_muda(Request $request) {
        $segment = request()->segments()[0];
        $tags = $segment;
        if (in_array($segment, array('direktorat', 'jurnalis', 'editor', 'fotografer')))
            $segment = 'pojok muda';

        $search = isset($request->search) ? $request->search : '';
        $content = ClassContent::view($segment);

        if (empty($content['title'])) {
            return redirect('/');
        }

        $parameter = $content['param'];
        $kategori = Kategori::where('id', $content['kategori'])->pluck('nama_kategori')[0];

        $penulis = User::select('app_user.id', 'app_user.nama_user')
                ->join('app_group', 'app_group.id', '=', 'app_user.id_group')
                ->whereRaw("lower(trim(app_group.nama_group)) = 'penulis'")
                ->get();
        $fotografer = User::select('app_user.id', 'app_user.nama_user')
                ->join('app_group', 'app_group.id', '=', 'app_user.id_group')
                ->whereRaw("lower(trim(app_group.nama_group)) = 'fotografer'")
                ->get();

        $direktorat = array();
        foreach (Direktorat::where('status', 't')->get() as $d) {
            $direktorat[$d->id] = $d->nama;
        }

        $menu = $icon = $temp = array();
        $temp[0] = $hide[0] = "";
        $parent = 0;
        foreach ($content['content'] as $c) {
            $menu[$c->induk_content][] = $c;
            $hide[$c->id] = $c->hide_content == 't' ? true : false;
            if (!empty($c->icon_content)) {
                $icon[$c->id] = $c;
            }

            if (isset($c->detail_content)) {
                foreach ($c->detail_content as $d) {
                    $menu[$d->induk_content][] = $d;
                    $hide[$d->id] = $d->hide_content == 't' ? true : false;
                    if (!empty($d->icon_content)) {
                        $icon[$d->id] = $d;
                    }

                    $temp[$d->induk_content][] = $d;
                    if ($content['id'] == $d->id) {
                        $parent = $d->induk_content;
                    }
                }
            }
        }

        if (in_array(strtolower($kategori), array('konsultasi'))) {
            $content = array_merge($content, array('hide' => $hide[$content['id']]));
        } else {
            $content = array_merge($content, array('hide' => $hide[$parent]));
        }
        $child = $temp[$parent];

        $left = $right = array();
        $top = Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(5);
        if (in_array(strtolower($kategori), array('berita'))) {
            $left = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
            $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        } elseif (in_array(strtolower($kategori), array('opini'))) {
            $left = $top;
            $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $left = $top;
            $right = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        }

        $dokumen = array();
        if (strtolower($kategori) == 'dokumen') {
            $dokumen = Dokumen::where('status_dokumen', 't')->where('id_content', $content['id'])->orderBy('created_at', 'desc')->paginate(12);
        }

        $berita = array();
        $sumber_berita = $editor_berita = $fotografer_berita = $kategori_direktorat = 0;
        if (strtolower($kategori) == 'berita') {
            if ($request->id) {
                if ($tags == 'jurnalis')
                    $sumber_berita = User::whereRaw("replace(lower(trim(nama_user)),' ','-') = '" . $request->id . "'")->pluck('id')->first();

                if ($tags == 'editor')
                    $editor_berita = User::whereRaw("replace(lower(trim(nama_user)),' ','-') = '" . $request->id . "'")->pluck('id')->first();

                if ($tags == 'fotografer')
                    $fotografer_berita = User::whereRaw("replace(lower(trim(nama_user)),' ','-') = '" . $request->id . "'")->pluck('id')->first();

                if ($tags == 'direktorat')
                    $kategori_direktorat = Direktorat::whereRaw("replace(lower(trim(nama)),' ','-') = '" . $request->id . "'")->pluck('id')->first();
            }

            if ($sumber_berita)
                $berita = Berita::where('sumber_berita', $sumber_berita)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else if ($editor_berita)
                $berita = Berita::where('editor_berita', $editor_berita)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else if ($fotografer_berita)
                $berita = Berita::where('fg_berita', $fotografer_berita)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else if ($kategori_direktorat)
                $berita = Berita::where('kategori_direktorat', $kategori_direktorat)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else
                $berita = Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $opini = array();
        if (strtolower($kategori) == 'opini') {
            $opini = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $tokoh = array();
        if (strtolower($kategori) == 'tokoh') {
            $tokoh = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $link = array();
        if (strtolower($kategori) == 'link') {
            $link = Links::where('status_link', 't')->where('id_content', $content['id'])->orderBy('created_at')->paginate(15);
        }

        $konsultasi = Konsultasi::where('status_konsultasi', 't')->orderBy('created_at', 'desc')->paginate(2);
        $default = $request->cookie('default');
        if (empty($default)) {
            $default = 0;
        }

        $jenis = array();
        if (strtolower($kategori) == 'konsultasi') {
            foreach (Jenis::where('status_jenis', 't')->orderBy('urutan_jenis')->get() as $j) {
                if (empty($default)) {
                    $default = $j->id;
                }
                $jenis[$j->id] = $j->nama_jenis;
            }

            $konsultasi = Konsultasi::where('status_konsultasi', 't')->where('id_jenis', $default)->orderBy('created_at', 'desc')->paginate(10);
        }

        $bimbingan = array();
        if (strtolower($kategori) == 'bimbingan') {
            $bimbingan = Bimbingan::where('status_bimbingan', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $foto = array();
        if (strtolower($kategori) == 'foto') {
            $foto = Foto::where('status_foto', 't')->where('id_content', $content['id'])->orderBy('created_at', 'desc')->paginate(12);
        }

        $video = $thumb = array();
        if (strtolower($kategori) == 'video') {
            $video = Video::where('status_video', 't')->where('id_content', $content['id'])->orderBy('created_at', 'desc')->paginate(9);

            foreach ($video as $v) {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $v->url_video, $match);
                $id_video = $match[1];
                $thumb[] = 'https://img.youtube.com/vi/' . $id_video . '/maxresdefault.jpg';
            }
        }

        $propinsi = $kabupaten = $tahun = $bulan = $jadwal = array();
        if (strtolower($kategori) == 'jadwal') {
            if (isset($request->kabupaten)) {
                if (isset($request->bulan)) {
                    $jadwal = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiSholatbln', [
                                'prov' => $request->propinsi,
                                'kabko' => $request->kabupaten,
                                'thn' => $request->tahun,
                                'bln' => $request->bulan,
                            ])->getBody()->getContents();
                } else {
                    $jadwal = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiimsakiyah', [
                                'prov' => $request->propinsi,
                                'kabko' => $request->kabupaten,
                                'thn' => $request->tahun,
                            ])->getBody()->getContents();
                }
                $jadwal = str_replace('prov', 'propinsi', $jadwal);
                $jadwal = str_replace('kabko', 'kabupaten', $jadwal);
                $jadwal = json_decode($jadwal, false);
            }

            $propinsi = Http::post(env('APP_API') . 'apiv1/ajax/getApiProv')->getBody()->getContents();
            $propinsi = str_replace('provKode', 'id', $propinsi);
            $propinsi = str_replace('provNama', 'name', $propinsi);
            $propinsi = json_decode($propinsi, false);

            if (isset($propinsi) && !isset($request->propinsi)) {
                foreach ($propinsi as $p) {
                    if (strtolower(trim($p->name)) == 'dki jakarta') {
                        $request->propinsi = $p->id;
                    }
                }
            }

            $kabupaten = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiKabko', [
                        'x' => $request->propinsi,
                    ])->getBody()->getContents();
            $kabupaten = str_replace('kabkoKode', 'id', $kabupaten);
            $kabupaten = str_replace('kabkoNama', 'name', $kabupaten);
            $kabupaten = json_decode($kabupaten, false);

            for ($m = 1; $m <= 12; $m++) {
                $bulan[$m] = getBulan($m);
            }

            $tahun = array();
            for ($y = date('Y') - 5; $y <= date('Y') + 5; $y++) {
                $tahun[] = $y;
            }

            if (preg_match('/imsakiyah/i', $content['current'])) {
                $tahun = Http::post(env('APP_API') . 'apiv1/ajax/getTahunimsak')->getBody()->getContents();
                $tahun = explode("</option><option value='", $tahun);
                $dta = array();
                foreach ($tahun as $val) {
                    list($t, $y) = explode("' >", $val);
                    $dta[preg_replace("/[^0-9]/", "", $t)] = strip_tags($y);
                }
                $tahun = json_decode(json_encode($dta), false);
            } else {
                if (!isset($request->tahun)) {
                    $request->tahun = date('Y');
                }

                if (!isset($request->bulan)) {
                    $request->bulan = date('m');
                }
            }
        }

        $data = array_merge(
                $content,
                ['banner' => $this->banner],
                array('menu' => $menu),
                array('child' => $child),
                array('default' => $default),
                array('jenis' => $jenis),
                array('kategori' => $kategori),
                array('tags' => $tags),
                array('penulis' => $penulis),
                array('fotografer' => $fotografer),
                array('direktorat' => $direktorat),
                array('sumber_berita' => $sumber_berita),
                array('editor_berita' => $editor_berita),
                array('fotografer_berita' => $fotografer_berita),
                array('kategori_direktorat' => $kategori_direktorat),
                array('icon' => $icon),
                array('top' => $top),
                array('left' => $left),
                array('right' => $right),
                array('dokumen' => $dokumen),
                array('berita' => $berita),
                array('opini' => $opini),
                array('tokoh' => $tokoh),
                array('link' => $link),
                array('konsultasi' => $konsultasi),
                array('bimbingan' => $bimbingan),
                array('foto' => $foto),
                array('video' => $video),
                array('thumb' => $thumb),
                array('propinsi' => $propinsi),
                array('kabupaten' => $kabupaten),
                array('bulan' => $bulan),
                array('tahun' => $tahun),
                array('jadwal' => $jadwal),
                array('request' => $request),
        );

        return view('v_pojokmuda', $data);
    }

    public function show(Request $request) {
        $segment = request()->segments()[0];
        $tags = $segment;
        if (in_array($segment, array('direktorat', 'jurnalis', 'editor', 'fotografer')))
            $segment = 'berita';

        $search = isset($request->search) ? $request->search : '';
        $content = ClassContent::view($segment);

        if (empty($content['title'])) {
            return redirect('/');
        }

        $parameter = $content['param'];
        $kategori = Kategori::where('id', $content['kategori'])->pluck('nama_kategori')[0];

        $penulis = User::select('app_user.id', 'app_user.nama_user')
                ->join('app_group', 'app_group.id', '=', 'app_user.id_group')
                ->whereRaw("lower(trim(app_group.nama_group)) = 'penulis'")
                ->get();
        $fotografer = User::select('app_user.id', 'app_user.nama_user')
                ->join('app_group', 'app_group.id', '=', 'app_user.id_group')
                ->whereRaw("lower(trim(app_group.nama_group)) = 'fotografer'")
                ->get();

        $direktorat = array();
        foreach (Direktorat::where('status', 't')->get() as $d) {
            $direktorat[$d->id] = $d->nama;
        }

        $menu = $icon = $temp = array();
        $temp[0] = $hide[0] = "";
        $parent = 0;
        foreach ($content['content'] as $c) {
            $menu[$c->induk_content][] = $c;
            $hide[$c->id] = $c->hide_content == 't' ? true : false;
            if (!empty($c->icon_content)) {
                $icon[$c->id] = $c;
            }

            if (isset($c->detail_content)) {
                foreach ($c->detail_content as $d) {
                    $menu[$d->induk_content][] = $d;
                    $hide[$d->id] = $d->hide_content == 't' ? true : false;
                    if (!empty($d->icon_content)) {
                        $icon[$d->id] = $d;
                    }

                    $temp[$d->induk_content][] = $d;
                    if ($content['id'] == $d->id) {
                        $parent = $d->induk_content;
                    }
                }
            }
        }

        if (in_array(strtolower($kategori), array('konsultasi'))) {
            $content = array_merge($content, array('hide' => $hide[$content['id']]));
        } else {
            $content = array_merge($content, array('hide' => $hide[$parent]));
        }
        $child = $temp[$parent];

        $left = $right = array();
        $top = Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(5);
        if (in_array(strtolower($kategori), array('berita'))) {
            $left = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
            $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        } elseif (in_array(strtolower($kategori), array('opini'))) {
            $left = $top;
            $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $left = $top;
            $right = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        }

        $dokumen = array();
        if (strtolower($kategori) == 'dokumen') {
            $dokumen = Dokumen::where('status_dokumen', 't')->where('id_content', $content['id'])->orderBy('created_at', 'desc')->paginate(12);
        }

        $berita = array();
        $sumber_berita = $editor_berita = $fotografer_berita = $kategori_direktorat = 0;
        if (strtolower($kategori) == 'berita') {
            if ($request->id) {
                if ($tags == 'jurnalis')
                    $sumber_berita = User::whereRaw("replace(lower(trim(nama_user)),' ','-') = '" . $request->id . "'")->pluck('id')->first();

                if ($tags == 'editor')
                    $editor_berita = User::whereRaw("replace(lower(trim(nama_user)),' ','-') = '" . $request->id . "'")->pluck('id')->first();

                if ($tags == 'fotografer')
                    $fotografer_berita = User::whereRaw("replace(lower(trim(nama_user)),' ','-') = '" . $request->id . "'")->pluck('id')->first();

                if ($tags == 'direktorat')
                    $kategori_direktorat = Direktorat::whereRaw("replace(lower(trim(nama)),' ','-') = '" . $request->id . "'")->pluck('id')->first();
            }

            if ($sumber_berita)
                $berita = Berita::where('sumber_berita', $sumber_berita)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else if ($editor_berita)
                $berita = Berita::where('editor_berita', $editor_berita)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else if ($fotografer_berita)
                $berita = Berita::where('fg_berita', $fotografer_berita)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else if ($kategori_direktorat)
                $berita = Berita::where('kategori_direktorat', $kategori_direktorat)->where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
            else
                $berita = Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $opini = array();
        if (strtolower($kategori) == 'opini') {
            $opini = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $tokoh = array();
        if (strtolower($kategori) == 'tokoh') {
            $tokoh = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $link = array();
        if (strtolower($kategori) == 'link') {
            $link = Links::where('status_link', 't')->where('id_content', $content['id'])->orderBy('created_at')->paginate(15);
        }

        $konsultasi = Konsultasi::where('status_konsultasi', 't')->orderBy('created_at', 'desc')->paginate(2);
        $default = $request->cookie('default');
        if (empty($default)) {
            $default = 0;
        }

        $jenis = array();
        if (strtolower($kategori) == 'konsultasi') {
            foreach (Jenis::where('status_jenis', 't')->orderBy('urutan_jenis')->get() as $j) {
                if (empty($default)) {
                    $default = $j->id;
                }
                $jenis[$j->id] = $j->nama_jenis;
            }

            $konsultasi = Konsultasi::where('status_konsultasi', 't')->where('id_jenis', $default)->orderBy('created_at', 'desc')->paginate(10);
        }

        $bimbingan = array();
        if (strtolower($kategori) == 'bimbingan') {
            $bimbingan = Bimbingan::where('status_bimbingan', 't')->orderBy('created_at', 'desc')->paginate(6);
        }

        $foto = array();
        if (strtolower($kategori) == 'foto') {
            $foto = Foto::where('status_foto', 't')->where('id_content', $content['id'])->orderBy('created_at', 'desc')->paginate(12);
        }

        $video = $thumb = array();
        if (strtolower($kategori) == 'video') {
            $video = Video::where('status_video', 't')->where('id_content', $content['id'])->orderBy('created_at', 'desc')->paginate(9);

            foreach ($video as $v) {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $v->url_video, $match);
                $id_video = $match[1];
                $thumb[] = 'https://img.youtube.com/vi/' . $id_video . '/maxresdefault.jpg';
            }
        }

        $propinsi = $kabupaten = $tahun = $bulan = $jadwal = array();
        if (strtolower($kategori) == 'jadwal') {
            if (isset($request->kabupaten)) {
                if (isset($request->bulan)) {
                    $jadwal = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiSholatbln', [
                                'prov' => $request->propinsi,
                                'kabko' => $request->kabupaten,
                                'thn' => $request->tahun,
                                'bln' => $request->bulan,
                            ])->getBody()->getContents();
                } else {
                    $jadwal = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiimsakiyah', [
                                'prov' => $request->propinsi,
                                'kabko' => $request->kabupaten,
                                'thn' => $request->tahun,
                            ])->getBody()->getContents();
                }
                $jadwal = str_replace('prov', 'propinsi', $jadwal);
                $jadwal = str_replace('kabko', 'kabupaten', $jadwal);
                $jadwal = json_decode($jadwal, false);
            }

            $propinsi = Http::post(env('APP_API') . 'apiv1/ajax/getApiProv')->getBody()->getContents();
            $propinsi = str_replace('provKode', 'id', $propinsi);
            $propinsi = str_replace('provNama', 'name', $propinsi);
            $propinsi = json_decode($propinsi, false);

            if (isset($propinsi) && !isset($request->propinsi)) {
                foreach ($propinsi as $p) {
                    if (strtolower(trim($p->name)) == 'dki jakarta') {
                        $request->propinsi = $p->id;
                    }
                }
            }

            $kabupaten = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiKabko', [
                        'x' => $request->propinsi,
                    ])->getBody()->getContents();
            $kabupaten = str_replace('kabkoKode', 'id', $kabupaten);
            $kabupaten = str_replace('kabkoNama', 'name', $kabupaten);
            $kabupaten = json_decode($kabupaten, false);

            for ($m = 1; $m <= 12; $m++) {
                $bulan[$m] = getBulan($m);
            }

            $tahun = array();
            for ($y = date('Y') - 5; $y <= date('Y') + 5; $y++) {
                $tahun[] = $y;
            }

            if (preg_match('/imsakiyah/i', $content['current'])) {
                $tahun = Http::post(env('APP_API') . 'apiv1/ajax/getTahunimsak')->getBody()->getContents();
                $tahun = explode("</option><option value='", $tahun);
                $dta = array();
                foreach ($tahun as $val) {
                    list($t, $y) = explode("' >", $val);
                    $dta[preg_replace("/[^0-9]/", "", $t)] = strip_tags($y);
                }
                $tahun = json_decode(json_encode($dta), false);
            } else {
                if (!isset($request->tahun)) {
                    $request->tahun = date('Y');
                }

                if (!isset($request->bulan)) {
                    $request->bulan = date('m');
                }
            }
        }

        $data = array_merge(
                $content,
                ['banner' => $this->banner],
                array('menu' => $menu),
                array('child' => $child),
                array('default' => $default),
                array('jenis' => $jenis),
                array('kategori' => $kategori),
                array('tags' => $tags),
                array('penulis' => $penulis),
                array('fotografer' => $fotografer),
                array('direktorat' => $direktorat),
                array('sumber_berita' => $sumber_berita),
                array('editor_berita' => $editor_berita),
                array('fotografer_berita' => $fotografer_berita),
                array('kategori_direktorat' => $kategori_direktorat),
                array('icon' => $icon),
                array('top' => $top),
                array('left' => $left),
                array('right' => $right),
                array('dokumen' => $dokumen),
                array('berita' => $berita),
                array('opini' => $opini),
                array('tokoh' => $tokoh),
                array('link' => $link),
                array('konsultasi' => $konsultasi),
                array('bimbingan' => $bimbingan),
                array('foto' => $foto),
                array('video' => $video),
                array('thumb' => $thumb),
                array('propinsi' => $propinsi),
                array('kabupaten' => $kabupaten),
                array('bulan' => $bulan),
                array('tahun' => $tahun),
                array('jadwal' => $jadwal),
                array('request' => $request),
        );

        return view('content-show', $data);
    }

    public function detail(Request $request) {
        $segment = request()->segments()[0];
        $search = isset($request->search) ? $request->search : '';
        $content = ClassContent::view($segment);
        if (empty($content['title'])) {
            return redirect('/');
        }

        $kategori = Kategori::where('id', $content['kategori'])->pluck('nama_kategori')[0];

        $menu = $icon = $temp = array();
        $temp[0] = "";
        $parent = 0;
        foreach ($content['content'] as $c) {
            $menu[$c->induk_content][] = $c;
            if (!empty($c->icon_content)) {
                $icon[$c->id] = $c;
            }

            if (isset($c->detail_content)) {
                foreach ($c->detail_content as $d) {
                    $menu[$d->induk_content][] = $d;
                    if (!empty($d->icon_content)) {
                        $icon[$d->id] = $d;
                    }

                    $temp[$d->induk_content][] = $d;
                    if ($content['id'] == $d->id) {
                        $parent = $d->induk_content;
                    }
                }
            }
        }
        $child = $temp[$parent];

        $top = Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(5);

        $default = 0;
        $detail = $next = $prev = $left = $right = $jenis = array();
        if (in_array(strtolower($kategori), array('berita'))) {
            $detail = Berita::find($request->id);
            if (!isset($detail)) {
                $detail = Berita::select('dta_berita.*', 't_sumber.nama_user AS nama_sumber', 't_editor.nama_user AS nama_editor', 't_fg.nama_user AS nama_fg', 'dta_direktorat.nama AS nama_direktorat')
                                ->where('slug_berita', $request->id)
                                ->leftJoin('app_user AS t_sumber', 'dta_berita.sumber_berita', '=', 't_sumber.id')
                                ->leftJoin('app_user AS t_editor', 'dta_berita.editor_berita', '=', 't_editor.id')
                                ->leftJoin('app_user AS t_fg', 'dta_berita.fg_berita', '=', 't_fg.id')
                                ->leftJoin('dta_direktorat', 'dta_berita.kategori_direktorat', '=', 'dta_direktorat.id')
                                ->orderBy('id', 'desc')->get()->first();
            }
            if (!isset($detail)) {
                return redirect('/');
            }
            $next = Berita::where('status_berita', 't')->where('id', '>', $detail->id)->orderBy('id', 'asc')->first();
            $prev = Berita::where('status_berita', 't')->where('id', '<', $detail->id)->orderBy('id', 'desc')->first();
            $left = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
            $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        } elseif (in_array(strtolower($kategori), array('opini'))) {
            $detail = Opini::find($request->id);
            if (!isset($detail)) {
                $detail = Opini::where('slug_opini', $request->id)->orderBy('id', 'desc')->first();
            }
            if (!isset($detail)) {
                return redirect('/');
            }

            $next = Opini::where('status_opini', 't')->where('id', '>', $detail->id)->orderBy('id', 'asc')->first();
            $prev = Opini::where('status_opini', 't')->where('id', '<', $detail->id)->orderBy('id', 'desc')->first();
            $left = $top;
            $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);
        } elseif (in_array(strtolower($kategori), array('tokoh'))) {
            $detail = Tokoh::find($request->id);
            if (!isset($detail)) {
                $detail = Tokoh::where('slug_tokoh', $request->id)->orderBy('id', 'desc')->first();
            }
            if (!isset($detail)) {
                return redirect('/');
            }

            $next = Tokoh::where('status_tokoh', 't')->where('id', '>', $detail->id)->orderBy('id', 'asc')->first();
            $prev = Tokoh::where('status_tokoh', 't')->where('id', '<', $detail->id)->orderBy('id', 'desc')->first();
            $left = $top;
            $right = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        } elseif (in_array(strtolower($kategori), array('konsultasi'))) {
            foreach (Jenis::where('status_jenis', 't')->orderBy('urutan_jenis')->get() as $j) {
                $jenis[$j->id] = $j->nama_jenis;
            }

            $detail = Konsultasi::find($request->id);
            if (!isset($detail)) {
                $detail = Konsultasi::whereRaw("regexp_replace(lower(concat(judul_konsultasi,nama_konsultasi,kota_konsultasi)), '[^0-9a-zA-Z]', '')='" . str_replace('-', '', $request->id) . "'")->orderBy('id', 'desc')->first();
            }
            if (!isset($detail)) {
                return redirect('/');
            }

            $default = $detail->id_jenis;
            Cookie::queue('default', $default, 15);

            $next = Konsultasi::where('status_konsultasi', 't')->where('id', '>', $detail->id)->where('id_jenis', $default)->orderBy('id', 'asc')->first();
            $prev = Konsultasi::where('status_konsultasi', 't')->where('id', '<', $detail->id)->where('id_jenis', $default)->orderBy('id', 'desc')->first();
            $left = $top;
            $right = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        } elseif (in_array(strtolower($kategori), array('bimbingan'))) {
            $detail = Bimbingan::find($request->id);
            if (!isset($detail)) {
                $detail = Bimbingan::where('slug_bimbingan', $request->id)->orderBy('id', 'desc')->first();
            }
            if (!isset($detail)) {
                return redirect('/');
            }

            $next = Bimbingan::where('status_bimbingan', 't')->where('id', '>', $detail->id)->orderBy('id', 'asc')->first();
            $prev = Bimbingan::where('status_bimbingan', 't')->where('id', '<', $detail->id)->orderBy('id', 'desc')->first();
            $left = $top;
            $right = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        } else {
            return redirect('/');
        }

        $data = array_merge(
                $content,
                ['banner' => $this->banner],
                array('menu' => $menu),
                array('child' => $child),
                array('default' => $default),
                array('jenis' => $jenis),
                array('kategori' => $kategori),
                array('icon' => $icon),
                array('top' => $top),
                array('left' => $left),
                array('right' => $right),
                array('detail' => $detail),
                array('next' => $next),
                array('prev' => $prev),
        );
        
        return view('content-detail', $data);
    }

    public function search(Request $request) {
        $content = ClassContent::view('search');

        $menu = $icon = $temp = array();
        $temp[0] = "";
        $parent = 0;
        foreach ($content['content'] as $c) {
            $menu[$c->induk_content][] = $c;
            if (!empty($c->icon_content)) {
                $icon[$c->id] = $c;
            }

            if (isset($c->detail_content)) {
                foreach ($c->detail_content as $d) {
                    $menu[$d->induk_content][] = $d;
                    if (!empty($d->icon_content)) {
                        $icon[$d->id] = $d;
                    }

                    $temp[$d->induk_content][] = $d;
                    if ($content['id'] == $d->id) {
                        $parent = $d->induk_content;
                    }
                }
            }
        }
        $top = Berita::where('status_berita', 't')->orderBy('created_at', 'desc')->paginate(5);
        $left = Opini::where('status_opini', 't')->orderBy('created_at', 'desc')->paginate(5);
        $right = Tokoh::where('status_tokoh', 't')->orderBy('created_at', 'desc')->paginate(5);

        $berita = Berita::where('status_berita', 't')->whereRaw("
				lower(nama_berita) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(keterangan_berita) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(detail_berita) like '%" . strtolower(trim($request->keyword)) . "%'
			")->orderBy('created_at', 'desc')->paginate(5);

        $opini = Opini::where('status_opini', 't')->whereRaw("
				lower(nama_opini) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(keterangan_opini) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(detail_opini) like '%" . strtolower(trim($request->keyword)) . "%'
			")->orderBy('created_at', 'desc')->paginate(5);

        $tokoh = Tokoh::where('status_tokoh', 't')->whereRaw("
				lower(nama_tokoh) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(keterangan_tokoh) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(detail_tokoh) like '%" . strtolower(trim($request->keyword)) . "%'
			")->orderBy('created_at', 'desc')->paginate(5);

        $bimbingan = Bimbingan::where('status_bimbingan', 't')->whereRaw("
				lower(nama_bimbingan) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(keterangan_bimbingan) like '%" . strtolower(trim($request->keyword)) . "%' or
				lower(detail_bimbingan) like '%" . strtolower(trim($request->keyword)) . "%'
			")->orderBy('created_at', 'desc')->paginate(5);
        
        $data = array_merge(
                $content,
                ['banner' => $this->banner],
                array('menu' => $menu),
                array('icon' => $icon),
                array('keyword' => $request->keyword),
                array('top' => $top),
                array('left' => $left),
                array('right' => $right),
                array('berita' => $berita),
                array('opini' => $opini),
                array('tokoh' => $tokoh),
                array('bimbingan' => $bimbingan),
        );

        return view('content-search', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $segment = request()->segments()[0];
        $search = isset($request->search) ? $request->search : '';
        $content = ClassContent::view($segment);
        if (empty($content['title'])) {
            return redirect('/');
        }

        $message = 'Terima kasih.';
        $kategori = Kategori::where('id', $content['kategori'])->pluck('nama_kategori')[0];

        //kontak
        if (strtolower($kategori) == 'kontak') {
            $data = new Kontak();
            $data->nama_kontak = $request->nama_kontak;
            $data->email_kontak = $request->email_kontak;
            $data->detail_kontak = $request->detail_kontak;
            $data->created_by = 0;
            $data->updated_by = 0;

            $data->save();
            $message = 'Terima kasih, pesan anda berhasil terkirim.';
        }

        //pengaduan
        if (strtolower($kategori) == 'pengaduan') {
            $data = new Pengaduan();
            $data->nama_pengaduan = $request->nama_pengaduan;
            $data->nik_pengaduan = $request->nik_pengaduan;
            $data->telepon_pengaduan = $request->telepon_pengaduan;
            $data->email_pengaduan = $request->email_pengaduan;
            $data->alamat_pengaduan = $request->alamat_pengaduan;
            $data->detail_pengaduan = $request->detail_pengaduan;
            $data->created_by = 0;
            $data->updated_by = 0;

            $data->save();
            $message = 'Terima kasih, pesan anda berhasil terkirim.';
        }

        //pertanyaan
        if (strtolower($kategori) == 'pertanyaan') {
            $data = new Konsultasi();
            $data->id_jenis = 0;
            $data->nama_konsultasi = $request->nama_konsultasi;
            $data->email_konsultasi = $request->email_konsultasi;
            $data->kota_konsultasi = $request->kota_konsultasi;
            $data->kelamin_konsultasi = $request->kelamin_konsultasi;
            $data->usia_konsultasi = $request->usia_konsultasi;
            $data->judul_konsultasi = $request->judul_konsultasi;
            $data->detail_konsultasi = $request->detail_konsultasi;
            $data->status_konsultasi = 'p';
            $data->created_by = 0;
            $data->updated_by = 0;

            $data->save();
            $message = 'Terima kasih, pertanyaan anda berhasil terkirim.';
        }

        return redirect($segment)->with('message', $message);
    }

    public function update(Request $request) {
        $segment = request()->segments()[0];
        $default = request()->segments()[2];

        Cookie::queue('default', $default, 15);

        return redirect($segment);
    }

    public function kabupaten(Request $request) {
        $parameter = Parameter::data();
        if ($request->id) {
            $kabupaten = Http::asForm()->post(env('APP_API') . 'apiv1/ajax/getApiKabko', [
                        'x' => $request->id,
                    ])->getBody()->getContents();
            $kabupaten = str_replace('kabkoKode', 'id', $kabupaten);
            $kabupaten = str_replace('kabkoNama', 'name', $kabupaten);
            $kabupaten = json_decode($kabupaten, false);
            return json_encode($kabupaten);
        }
    }
}
