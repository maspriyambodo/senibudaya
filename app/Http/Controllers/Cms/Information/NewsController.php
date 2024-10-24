<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
//use App\Models\User;
use App\Helpers\User as UserHelper;
use App\Models\OurCollection;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;
use Image;

class NewsController extends AuthController {

    private $target = 'cms.information.news';
    
    public function json(Request $request) {
        $exec = OurCollection::select('dta_our_collections.id', 'dta_our_collections.id_category', 'dta_our_collections.nama AS nama_berita', 'dta_our_collections.pencipta', 'dta_our_collections.status AS status_berita', 'dta_our_collections.status_approval', 'dta_our_collections.created_at', 'user_create.nama_user', 'user_approve.nama_user AS nama_approve', 'mt_provinsi.nama AS provinsi', 'mt_kabupaten.nama AS kabupaten')
                    ->join('app_user AS user_create', 'dta_our_collections.created_by', '=', 'user_create.id')
                    ->join('app_user AS user_approve', 'dta_our_collections.user_approval', '=', 'user_approve.id')
                    ->leftJoin('mt_provinsi', 'dta_our_collections.kd_prov', '=', 'mt_provinsi.id_provinsi')
                    ->leftJoin('mt_kabupaten', 'dta_our_collections.kd_kabkota', '=', 'mt_kabupaten.id_kabupaten');
            if ($request->filled('kategori')) {
                $exec->where('dta_our_collections.id_category', '=', $request->kategori);
            }
            if ($request->filled('approval')) {
                $exec->where('dta_our_collections.status_approval', '=', $request->approval);
            }
            if ($request->filled('keyword')) {
                $exec->where('dta_our_collections.nama', 'like', "%" . $request->keyword . "%");
                                $berita->orWhere('dta_our_collections.pencipta', 'like', "%" . $request->keyword . "%");
                                $berita->orWhere('user_create.nama_user', 'like', "%" . $request->keyword . "%");
                                $berita->orWhere('mt_provinsi.nama', 'like', "%" . $request->keyword . "%");
                                $berita->orWhere('mt_kabupaten.nama', 'like', "%" . $request->keyword . "%");
            }
            $berita = $exec->latest()->get();
        return Datatables::of($berita)
                        ->editColumn('created_at', function ($row) {
                            return date('d/M/Y', strtotime($row->created_at));
                        })
                        ->addColumn('status_berita', function ($row) {
                            return $row->status_berita == 1 ?
                            "<span class=\"badge badge-success w-100\">Publish</span>" :
                            "<span class=\"badge badge-light-dark  w-100\">Draft</span>";
                        })
                        ->addColumn('status_approval', function ($row) {
                            $status_approval = $row->status_approval;
                            $stat_ = '';
                            if($status_approval == 0) {
                                $stat_ = "<span class=\"badge badge-danger w-100\">ditolak</span>";
                            } elseif ($status_approval == 1) {
                                $stat_ = "<span class=\"badge badge-secondary w-100\">dalam review</span>";
                            } elseif ($status_approval == 2) {
                                $stat_ = "<span class=\"badge badge-success w-100\">disetujui</span>";
                            } else {
                                $stat_ = '';
                            }
                            return $stat_;
                        })
                        ->addColumn('button', function ($row) {
                            $button = "";
                            $row_id = null;
                            while (true) {
                                $enc = UserHelper::enkrip($row->id);
                                $decrypted = UserHelper::dekrip($enc);
                                $param = explode(',', $decrypted);
                                if (!empty($param[0])) {
                                    $row_id = $enc;
                                    break;
                                }
                            }
                            if ($this->edit || $this->delete) {
                                $button .= "<div class=\"btn-group dropright\">
					<button class=\"btn btn-sm btn-icon btn-secondary\" type=\"button\" data-toggle=\"dropdown\">
						<i class=\"fas fa-bars\"></i>
					</button>
					<div class=\"dropdown-menu dropright\">";
                                if ($this->edit) {
                                    $button .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/form/' . $row_id) . "\" ><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
                                }
                                if ($this->delete) {
                                    $button .= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                                }
                                if (Session::get('group') == 2 || Session::get('group') == 1) {
                                    $button .= "<a id=\"btnapproval\" class=\"dropdown-item has-icon\" href=\"javascript:void(0)\" data-toggle=\"modal\" onclick=\"Approval('" . $row_id . "','" . $row->nama_berita . "');\" data-target=\"#approvalModal\"><i class=\"fas fa-check\"></i> Approval</a>";
                                }
                                $button .= "</div>
				</div>";
                            }
                            return $button;
                        })
                        ->rawColumns(
                                    [
                                        'status_berita',
                                        'button',
                                        'status_approval'
                                    ]
                                )
                        ->make(true);
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
        $data = array_merge(ClassMenu::view($this->target), array('filter' => array()));
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
        $provinsi = Provinsi::select('mt_provinsi.id_provinsi', 'mt_provinsi.nama AS provinsi', 'mt_provinsi.stat')
                ->where('mt_provinsi.stat', 1)->get();
        if ($request->id == 0) {
            $id_berita = 0;
        } else {
            $id_berita = UserHelper::dekrip($request->id);
        }
        $berita = OurCollection::where('id', $id_berita)->first();
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
                    'id_berita' => $request->id
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
        if(count($kabupaten) > 0){
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
        $slug = $request->slug;
        $check = OurCollection::select('slug')->where('slug', $slug)->get();
        if(count($check) > 0){
            $response = [
                'stat' => false,
                'msgtxt' => 'duplikat slug'
            ];
        } else {
            $response = [
                'stat' => true
            ];
        }
        return response()->json($response);
    }
    
    public function store(Request $request) {
        $id_berita = UserHelper::dekrip($request->id);
        $new = empty($id_berita) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
                $request,
                ['image_berita' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
                [
                    'image_berita.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
                    'image_berita.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
                ]
        );

        $data = OurCollection::select('banner_path')->where('id', $id_berita)->first();
        $image_berita = isset($data) ? $data->banner_path : '';
        if ($request->hasfile('image_berita')) {
            $baseDir = public_path('images/berita/' . date('Y') . '/' . date('F'));
            if (!file_exists($baseDir)) {
                mkdir($baseDir, 0755, true);
            }
            $image = $request->file('image_berita');
            $image_berita = 'img_' . round(microtime(true) * 1000) . '.' . $image->getClientOriginalExtension();
            $path = 'images/berita/' . date('Y') . '/' . date('F');

            $width = $height = 800;
            $img_file = Image::make($image->getRealPath());
            $img_file->height() > $img_file->width() ? $width = null : $height = null;
            $img_file->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $image_berita);
        }
        $detail_berita = str_replace(['Powered by', 'Froala Editor', 'https://www.froala.com/wysiwyg-editor?pb=1'], '', $request->detail_berita);
        $berita = $new ? new OurCollection() : OurCollection::find($id_berita);
        $berita->id_category = $request->kategoritxt;
        $berita->nama = $request->nama_berita;
        $berita->slug = Str::slug($request->slugtxt);
        $berita->body = $request->detail_berita;
        $berita->sub_category = $request->kategori2txt;
        $berita->pencipta = $request->penciptatxt;
        $berita->kd_prov = $request->provtxt;
        $berita->kd_kabkota = $request->kabtxt;
        $berita->status = $request->status_berita == "on" ? 1 : 0;
        $berita->status_approval = 2;
        $berita->user_approval = Session::get('uid');
        $berita->date_approval = date('Y-m-d H:i:s');
        $berita->created_at = date('Y-m-d H:i:s');
        $berita->updated_at = date('Y-m-d H:i:s');
        if($request->file('image_berita')){
            $berita->banner_path = $path . '/' . $image_berita;
            $berita->banner_source = $request->srcpicttxt;
        }
        if ($new) {
            $berita->created_by = Session::get('uid');
        }
        $berita->updated_by = Session::get('uid');

        if ($new) {
            $berita->save();
        } else {
            $berita->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request) {
        OurCollection::where('id', $request->dt)
                ->update(['status' => 0]);
        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
