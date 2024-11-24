<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
//use App\Models\User;
use App\Helpers\User as UserHelper;
use App\Models\OurCollection;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\CategoriesOurCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;
use Image;

class NewsController extends AuthController {

    private $target = 'cms.information.news';

    public function json(Request $request) {
        $exec = OurCollection::select(
                        'dta_our_collections.id',
                        'dta_our_collections.id_category',
                        'dta_our_collections.nama AS nama_berita',
                        'dta_our_collections.pencipta',
                        'dta_our_collections.status AS status_berita',
                        'dta_our_collections.status_approval',
                        'dta_our_collections.created_at',
                        'user_create.nama_user',
                        'user_approve.nama_user AS nama_approve',
                        'mt_provinsi.nama AS provinsi',
                        'mt_kabupaten.nama AS kabupaten'
                )
                ->join('app_user AS user_create', 'dta_our_collections.created_by', '=', 'user_create.id')
                ->join('app_user AS user_approve', 'dta_our_collections.user_approval', '=', 'user_approve.id')
                ->leftJoin('mt_provinsi', 'dta_our_collections.kd_prov', '=', 'mt_provinsi.id_provinsi')
                ->leftJoin('mt_kabupaten', 'dta_our_collections.kd_kabkota', '=', 'mt_kabupaten.id_kabupaten');

        // Apply filters
        $this->applyFilters($exec, $request);

        $berita = $exec->latest()->get();

        return Datatables::of($berita)
                        ->editColumn('created_at', fn($row) => date('d/M/Y', strtotime($row->created_at)))
                        ->addColumn('status_berita', fn($row) => $row->status_berita == 1 ? "<span class=\"badge badge-success w-100\">Publish</span>" : "<span class=\"badge badge-light-dark w-100\">Draft</span>")
                        ->addColumn('status_approval', fn($row) => $this->getApprovalBadge($row->status_approval))
                        ->addColumn('button', fn($row) => $this->getActionButtons($row))
                        ->rawColumns(['status_berita', 'button', 'status_approval'])
                        ->make(true);
    }

    private function applyFilters($query, Request $request) {
        if ($request->filled('kategori')) {
            $query->where('dta_our_collections.id_category', $request->kategori);
        }
        if ($request->filled('subkategori')) {
            $query->where('dta_our_collections.sub_category', $request->subkategori);
        }
        if ($request->filled('approval')) {
            $query->where('dta_our_collections.status_approval', $request->approval);
        }
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('dta_our_collections.nama', 'like', "%" . $request->keyword . "%")
                        ->orWhere('dta_our_collections.pencipta', 'like', "%" . $request->keyword . "%")
                        ->orWhere('user_create.nama_user', 'like', "%" . $request->keyword . "%")
                        ->orWhere('mt_provinsi.nama', 'like', "%" . $request->keyword . "%")
                        ->orWhere('mt_kabupaten.nama', 'like', "%" . $request->keyword . "%");
            });
        }
    }

    private function getApprovalBadge($status) {
        switch ($status) {
            case 0:
                return "<span class=\"badge badge-danger w-100\">ditolak</span>";
            case 1:
                return "<span class=\"badge badge-secondary w-100\">dalam review</span>";
            case 2:
                return "<span class=\"badge badge-success w-100\">disetujui</span>";
            default:
                return '';
        }
    }

    private function getActionButtons($row) {
        if (!$this->edit && !$this->delete) {
            return '';
        }
        $buttons = "<div class=\"btn-group dropright\">
        <button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
            <i class=\"fas fa-ellipsis-v\"></i>
        </button>
        <div class=\"dropdown-menu dropright\">";

        if ($this->edit) {
            $buttons .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/form/' . $row->id) . "\">
            <i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
        }

        if ($this->delete) {
            $buttons .= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\">
            <i class=\"fas fa-trash\"></i> Hapus Data</a>";
        }

        if (Session::get('group') == 2 || Session::get('group') == 1) {
            $buttons .= "<a id=\"btnapproval\" class=\"dropdown-item has-icon\" href=\"javascript:void(0)\" data-toggle=\"modal\" onclick=\"Approval('" . $row->id . "','" . $row->nama_berita . "');\" data-target=\"#approvalModal\"><i class=\"fas fa-check\"></i> Approval</a>";
        }

        $buttons .= "</div></div>";

        return $buttons;
    }

    public function news_approval(Request $request) {
        $id = UserHelper::dekrip($request->id_jurnal);
        $exec = OurCollection::where('id', $id)
                ->update([
                    'status_approval' => $request->approvtxt,
                    'user_approval' => Session::get('uid'),
                    'date_approval' => date('Y-m-d H:i:s')
        ]);
        if ($exec) {
            $response = redirect($this->page)->with('message', "Berhasil menyimpan data approval!");
        } else {
            $response = redirect($this->page)->with('message', "Gagal menyimpan data approval!");
        }
        return $response;
    }

    public function index() {
        $kategori = CategoriesOurCollection::select('id', 'id_sub_category', 'nama')->where('status', 1)->get();
        $data = array_merge(
                ClassMenu::view($this->target),
                [
                    'filter' => [],
                    'kategori' => $kategori
                ]
        );
        $column = array(
            'id' => 'data',
            'align' => array('center', 'left'),
            'data' => array('button', 'nama_berita', 'pencipta', 'provinsi', 'kabupaten', 'created_at', 'nama_user', 'status_berita', 'status_approval'),
            'nosort' => array(0),
        );
        $data2 = array_merge($data, array('column' => $column));
        return view($this->target, $data2);
    }

    public function form(Request $request) {
        $kategori = CategoriesOurCollection::select('id', 'id_sub_category', 'nama')->where('status', 1)->get();
        $provinsi = Provinsi::select('mt_provinsi.id_provinsi', 'mt_provinsi.nama AS provinsi', 'mt_provinsi.stat')
                        ->where('mt_provinsi.stat', 1)->get();
        $berita = OurCollection::where('id', $request->id)->first();
        if (!isset($berita)) {
            $berita = new OurCollection();
            $berita->id = 0;
            $berita->status = 1;
            $berita->mode_berita = 'Add Content';
        } else {
            $berita->mode_berita = 'Edit Content';
        }

        $data = array_merge(
                ClassMenu::view($this->target),
                [
                    'data' => $berita,
                    'provinsi' => $provinsi,
                    'id_berita' => $request->id,
                    'kategori_collection' => $kategori
                ]
        );
        return view($this->target . '-form', $data);
    }

    public function kabupaten(Request $request) {
        $id_provinsi = $request->id_prov;
        $kabupaten = KabupatenKota::select('mt_kabupaten.id_kabupaten', 'mt_kabupaten.nama AS kabupaten')
                ->where([
                    'mt_kabupaten.id_provinsi' => $id_provinsi,
                    'mt_kabupaten.stat' => 1
                ])
                ->get();
        if (count($kabupaten) > 0) {
            $response = [
                'stat' => true,
                'kabupaten' => $kabupaten
            ];
        } else {
            $response = [
                'stat' => false,
                'msgtxt' => 'tidak dapat menemukan data kabupaten!'
            ];
        }
        return response()->json($response);
    }

    public function check_slug(Request $request) {
        $id_berita = $request->id_berita;
        $slug = $request->slug;
        $check = OurCollection::select('slug')->where('slug', $slug)->get();
        $tot_slug = count($check);
        if ($id_berita == 0) {
            if ($tot_slug > 0) {
                $response = [
                    'stat' => false,
                    'msgtxt' => 'duplikat slug, errcode: 17532710'
                ];
            } else {
                $response = [
                    'stat' => true
                ];
            }
        } else {
            if ($tot_slug > 1) {
                $response = [
                    'stat' => false,
                    'msgtxt' => 'duplikat slug, errcode: 17542710'
                ];
            }
        }
        return response()->json($response);
    }

    public function store(Request $request) {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);
        // Validate request
        $this->validateRequest($request);
        // Handle image upload if exists
        $imagePath = $this->handleImageUpload($request);
        // Prepare the data for saving
        $berita = $new ? new OurCollection() : OurCollection::find($request->id);
        $this->populateBeritaData($berita, $request, $imagePath, $new);
        // Save or update the berita
        $new ? $berita->save() : $berita->update();
        // Set success message and redirect
        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    private function validateRequest($request) {
        $request->validate(
                [
                    'image_berita' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288',
                ],
                [
                    'image_berita.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
                    'image_berita.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
                ]
        );
    }

    private function handleImageUpload($request) {
        // Check if the file exists and is valid
        if (!$request->hasFile('image_berita') || !$request->file('image_berita')->isValid()) {
            return null; // No valid file to process
        }
        $image = $request->file('image_berita');
        $mimeType = $image->getMimeType();
        // Validate the MIME type of the uploaded file
        if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'])) {
            Log::error('Invalid image type: ' . $mimeType);
            return null; // Invalid image type
        }
        // Create the base directory if it does not exist
        $baseDir = public_path('/images/berita/' . date('Y') . '/' . date('F'));
        if (!file_exists($baseDir)) {
            mkdir($baseDir, 0755, true);
        }
        // Generate a unique image name
        $imageName = 'img_' . round(microtime(true) * 1000) . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/berita/' . date('Y') . '/' . date('F');
        try {
            $image->move($baseDir, $imageName);
            return $imagePath . '/' . $imageName; // Return the path to the saved image
        } catch (\Exception $e) {
            // Log the error if image processing fails
            Log::error('Image processing error: ' . $e->getMessage());
            return null; // Return null if there was an error
        }
    }

    private function populateBeritaData($berita, $request, $imagePath, $new) {
        $berita->id_category = $request->kategoritxt;
        $berita->nama = $request->nama_berita;
        $berita->slug = Str::slug($request->slugtxt);
        $berita->body = $this->sanitizeDetailBerita($request->detail_berita);
        $berita->sub_category = $request->kategori2txt;
        $berita->pencipta = $request->penciptatxt;
        $berita->kd_prov = $request->provtxt;
        $berita->kd_kabkota = $request->kabtxt;
        $berita->status = $request->status_berita === "on" ? 1 : 0;
        $berita->status_approval = 2;
        $berita->user_approval = Session::get('uid');
        $berita->date_approval = now();
        $berita->created_at = now();
        $berita->updated_at = now();
        $berita->updated_by = Session::get('uid');
        if ($imagePath) {
            $berita->banner_path = $imagePath;
            $berita->banner_source = $request->srcpicttxt;
        }
        if ($new) {
            $berita->created_by = Session::get('uid');
        }
    }

    private function sanitizeDetailBerita($detail) {
        return str_replace(
                ['Powered by', 'Froala Editor', 'https://www.froala.com/wysiwyg-editor?pb=1'],
                '',
                $detail
        );
    }

    public function destroy(Request $request) {
        OurCollection::where('id', $request->dt)
                ->update(['status' => 0]);
        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
