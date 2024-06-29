<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Berita;
use App\Models\User;
use App\Models\Direktorat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class NewsController extends AuthController
{
    private $target = 'cms.information.news';

    public function json()
 {
        $berita = Berita::select('dta_berita.id', 'dta_berita.nama_berita', 'dta_direktorat.nama AS nama_direktorat', 'dta_berita.status_berita', 'dta_berita.created_at')
                ->leftjoin('dta_direktorat', 'dta_berita.kategori_direktorat', '=', 'dta_direktorat.id');

        return Datatables::of($berita)
                        ->addColumn('nama_direktorat', function($row){
                            $nama_direktorat=null;
                            if(!empty($row->nama_direktorat)){
                                $nama_direktorat = $row->nama_direktorat;
                            } else {
                                $nama_direktorat='uncategoriez';
                            }
                            return $nama_direktorat;
                        })
                        ->editColumn('created_at', function ($row) {
                            return date('d/m/Y', strtotime($row->created_at));
                        })
                        ->addColumn('display', function ($row) {
                            return $row->status_berita == "t" ?
                            "<span class=\"badge badge-success w-100\">Aktif</span>" :
                            "<span class=\"badge badge-light-dark  w-100\">Tidak Aktif</span>";
                        })
                        ->addColumn('button', function ($row) {
                            $button = "";
                            if ($this->edit || $this->delete) {
                                $button .= "<div class=\"btn-group dropright\">
					<button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
						<i class=\"fas fa-ellipsis-v\"></i> 
					</button>
					<div class=\"dropdown-menu dropright\">";
                                if ($this->edit) {
                                    $button .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/form/' . enkrip($row->id)) . "\" ><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
                                }
                                if ($this->delete) {
                                    $button .= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                                }
                                $button .= "</div>
				</div>";
                            }
                            return $button;
                        })
                        ->filter(function ($query) {
                            if (request()->has('keyword')) {
                                $query->where('nama_berita', 'like', "%" . request('keyword') . "%")
                                        ->orwhere('dta_direktorat.nama','like', "%" . request('keyword') . "%");
                            }
                        })
                        ->order(function ($query) {
                            $query->orderBy('created_at', 'desc');
                        })
                        ->rawColumns(['nama_direktorat', 'display', 'button', 'image'])
                        ->toJson();
    }

    public function index()
    {
        $data = array_merge(ClassMenu::view($this->target), array('filter' => array()));

        $column = array(
            'id' => 'data',
            'align' => array('center', 'center', 'left', 'left', 'center', 'center'),
            'data' => array('button', 'nama_berita','nama_direktorat', 'created_at', 'display'),
            'nosort' => array(0, 1, 2, 3, 4),
        );
        if (!$data['edit'] && !$data['delete']) {
            $column = array(
                'id' => 'data',
                'align' => array('center', 'left', 'left', 'center', 'center'),
                'data' => array('nama_berita','nama_direktorat', 'created_at', 'display'),
                'nosort' => array(0, 1, 2, 3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
 {
        $id_berita = dekrip($request->id);
        $berita = Berita::where('id', $id_berita)->first();
        $direktorat = Direktorat::select('id', 'nama')
                ->where('status', 't')
                ->get();
        $penulis = User::select('app_user.id','app_user.nama_user')
				->join('app_group', 'app_group.id', '=', 'app_user.id_group')
                ->whereRaw("lower(trim(app_group.nama_group)) = 'penulis'")
                ->get();
        $fotografer = User::select('app_user.id','app_user.nama_user')
				->join('app_group', 'app_group.id', '=', 'app_user.id_group')
                ->whereRaw("lower(trim(app_group.nama_group)) = 'fotografer'")
                ->get();
				
        if (!isset($berita)) {
            $berita = new Berita();
            $berita->id = 0;
            $berita->status_berita = 't';
            $berita->mode_berita = 'Add Berita';
        } else {
            $berita->mode_berita = 'Edit Berita';
        }

        $data = array_merge(
                ClassMenu::view($this->target),
                array(
                    'data' => $berita,
                    'direktorat' => $direktorat,
                    'sumber' => $penulis,
                    'editor' => $penulis,
                    'fotografer' => $fotografer
                ),
        );
        return view($this->target . '-form', $data);
    }

    public function store(Request $request)
    {
        $id_berita = dekrip($request->id);
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

        $data = Berita::select('image_berita')->where('id', $id_berita)->first();
        $image_berita = isset($data) ? $data->image_berita : '';
        if ($request->hasfile('image_berita')) {
            $foto_temp = public_path('images/berita/' . $image_berita);
            if (File::exists($foto_temp)) {
                File::delete($foto_temp);
            }

            $image = $request->file('image_berita');
            $image_berita = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/berita/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_berita);
        }
        
        $berita = $new ? new Berita() : Berita::find($id_berita);
        
        $berita->slug_berita = $request->slug_berita;
        $berita->nama_berita = $request->nama_berita;
        $berita->keterangan_berita = $request->keterangan_berita;
        $berita->detail_berita = $request->detail_berita;
        $berita->sumber_berita = $request->sumber_berita;
        $berita->editor_berita = $request->editor_berita;
        $berita->fg_berita = $request->fg_berita;
        $berita->kategori_direktorat = $request->kategori_direktorat;
        $berita->image_berita = $image_berita;
        $berita->status_berita = $request->status_berita == "on" ? "t" : "f";
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

    public function destroy(Request $request)
    {
        Berita::where('id', $request->dt)
                ->update(['status_berita' => 'f']);
        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
