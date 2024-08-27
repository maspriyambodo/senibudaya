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
            'body' => 'required',
        ]);

        $formPengajuan = OurCollection::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'pencipta' => $request->pencipta,
            'id_category' => $request->id_category,
            'kd_prov' => $request->kd_prov,
            'kd_kabkota' => $request->kd_kabkota,
            'status' => 1,
            'status_approval' => 0,
            'created_by' => Session::get('uid'),
            'body' => $request->body,
        ]);

        $baseDir = public_path('form-pengajuan/' . $formPengajuan->id);
        if (!file_exists($baseDir)) {
            mkdir($baseDir, 0755, true);
            mkdir($baseDir . '/banner_path', 0755, true);
            mkdir($baseDir . '/media', 0755, true);
        }

        $bannerFile = $request->file('banner_path');
        $bannerFileName = 'banner.' . $bannerFile->getClientOriginalExtension();
        $bannerFile->move($baseDir . '/banner_path', $bannerFileName);
        $formPengajuan->banner_path = 'form-pengajuan/' . $formPengajuan->id . '/banner_path/' . $bannerFileName;

        $body = $formPengajuan->body;
        $tempDir = public_path('form-pengajuan/temp');
        $mediaDir = $baseDir . '/media';

        $body = $this->moveMediaFilesAndUpdateBody($body, $tempDir, $mediaDir, $formPengajuan->id);

        $formPengajuan->body = $body;
        $formPengajuan->save();

        return redirect()->route('form-pengajuan.create')->with('success', 'Form pengajuan berhasil disimpan.');
    }

    public function uploadMedia(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            $baseDir = public_path('form-pengajuan/temp');
            if (!file_exists($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            $file->move($baseDir, $filename);

            $filePath = asset('form-pengajuan/temp/' . $filename);

            return response()->json([
                'link' => $filePath,
            ]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    }

    private function moveMediaFilesAndUpdateBody($body, $tempDir, $mediaDir, $formId)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($body, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $elements = $dom->getElementsByTagName('*');
        foreach ($elements as $element) {
            if (in_array($element->tagName, ['img', 'video', 'audio', 'source', 'a'])) {
                $attribute = ($element->tagName === 'a') ? 'href' : 'src';
                $src = $element->getAttribute($attribute);

                if (strpos($src, 'form-pengajuan/temp/') !== false) {
                    $fileName = basename($src);
                    $oldPath = $tempDir . '/' . $fileName;
                    $newPath = $mediaDir . '/' . $fileName;

                    if (file_exists($oldPath)) {
                        rename($oldPath, $newPath);
                        $newSrc = asset('form-pengajuan/' . $formId . '/media/' . $fileName);
                        $element->setAttribute($attribute, $newSrc);
                    }
                }
            }
        }

        return $dom->saveHTML();
    }

    public function getKabKota($id_provinsi)
    {
        return KabupatenKota::where('id_provinsi', $id_provinsi)->where('stat', 1)->get()->toJson();
    }

    public function cleanupTempFiles()
    {
        $tempDir = public_path('form-pengajuan/temp');
        $files = glob($tempDir . '/*');
        $now = time();

        foreach ($files as $file) {
            if (is_file($file)) {
                if ($now - filemtime($file) >= 24 * 3600) {
                    unlink($file);
                }
            }
        }
    }
}
