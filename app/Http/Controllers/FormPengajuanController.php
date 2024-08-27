<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\CategoriesOurCollection;
use App\Models\OurCollection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FormPengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = OurCollection::where('created_by', auth()->id())->orderBy('created_at', 'desc')->paginate(6);

        return view('landing.pages.form-pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
      $provinsis = Provinsi::where('stat', 1)->select('id_provinsi', 'nama')->get();
      $kabupatenKotas = KabupatenKota::where('stat', 1)->select('id_kabupaten', 'nama')->get();
      $categories_our_collection = CategoriesOurCollection::where('status', 1)->orderBy('urutan')->get();

      return view('landing.pages.form-pengajuan.create', compact('provinsis', 'kabupatenKotas', 'categories_our_collection'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pencipta' => 'required|string|max:255',
            'id_category' => 'required',
            'banner_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kd_prov' => 'required',
            'kd_kabkota' => 'required',
            'editor-container' => 'required',
        ]);

        $formPengajuan = OurCollection::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'pencipta' => $request->pencipta,
            'id_category' => $request->id_category,
            'kd_prov' => $request->kd_prov,
            'kd_kabkota' => $request->kd_kabkota,
            'status' => 1,
            'status_approval' => 1,
            'created_by' => Session::get('uid'),
        ]);

        $baseDir = public_path('form-pengajuan/' . $formPengajuan->id);
        if (!file_exists($baseDir)) {
            mkdir($baseDir, 0755, true);
            mkdir($baseDir . '/banner_path', 0755, true);
            mkdir($baseDir . '/body', 0755, true);
        }

        $bannerFile = $request->file('banner_path');
        $bannerFileName = 'banner.' . $bannerFile->getClientOriginalExtension();
        $bannerFile->move($baseDir . '/banner_path', $bannerFileName);
        $formPengajuan->banner_path = 'form-pengajuan/' . $formPengajuan->id . '/banner_path/' . $bannerFileName;

        $body = $request->input('editor-container');
        if (!empty($body)) {
            try {
                $processedBody = $this->processQuillContent($body, $baseDir . '/body', $formPengajuan->id);
                $formPengajuan->body = $processedBody;
            } catch (\Exception $e) {
                Log::error('Error processing Quill content: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses konten editor. Silakan coba lagi.');
            }
        } else {
            $formPengajuan->body = '';
        }

        $formPengajuan->save();

        return redirect()->route('form-pengajuan.create')->with('success', 'Form pengajuan berhasil disimpan.');
    }

    private function processQuillContent($content, $uploadDir, $formId)
    {
        if (empty($content)) {
            return '';
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $mediaElements = $dom->getElementsByTagName('img');
        $mediaElements = array_merge(iterator_to_array($mediaElements), iterator_to_array($dom->getElementsByTagName('video')));
        $mediaElements = array_merge($mediaElements, iterator_to_array($dom->getElementsByTagName('audio')));

        foreach ($mediaElements as $media) {
            $src = $media->getAttribute('src');
            if (preg_match('/^data:(image|video|audio)\/(\w+);base64,/', $src, $matches)) {
                $mediaData = base64_decode(explode(',', $src)[1]);
                $mediaType = $matches[1];
                $extension = $matches[2];
                $filename = $mediaType . '_' . time() . '_' . uniqid() . '.' . $extension;

                file_put_contents($uploadDir . '/' . $filename, $mediaData);

                $newSrc = '/form-pengajuan/' . $formId . '/body/' . $filename;
                $media->setAttribute('src', $newSrc);
            }
        }

        return $dom->saveHTML();
    }

    public function getKabKota($id_provinsi)
    {
        return KabupatenKota::where('id_provinsi', $id_provinsi)->where('stat', 1)->get()->toJson();
    }
}
