<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Content;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class PhotosController extends AuthController
{
    private $target = 'cms.information.photos';

    public function json()
    {
        if (Session::get('group') == 2 || Session::get('group') == 1) {
            $foto = Foto::select('dta_foto.id', 'dta_foto.nama_foto', 'dta_foto.keterangan_foto', 'dta_foto.image_foto', 'dta_foto.status_foto', 'dta_foto.status_approval', 'dta_foto.created_by', 'dta_foto.created_at')
                    ->join('app_user', 'dta_foto.created_by', '=', 'app_user.id')
                    ->orderBy('dta_foto.id', 'desc');
        } else {
            $foto = Foto::select('dta_foto.id', 'dta_foto.nama_foto', 'dta_foto.keterangan_foto', 'dta_foto.image_foto', 'dta_foto.status_foto', 'dta_foto.status_approval', 'dta_foto.created_by', 'dta_foto.created_at')
                    ->join('app_user', 'dta_foto.created_by', '=', 'app_user.id')
                    ->where('dta_foto.created_by', Session::get('uid'))
                    ->orderBy('dta_foto.id', 'desc');
        }

        return Datatables::of($foto)
        ->addColumn('detail', function ($row) {
            return "<strong>".$row->nama_foto."</strong><br>".$row->keterangan_foto;
        })
        ->addColumn('display', function ($row) {
            return $row->status_foto == "t" ?
            "<span class=\"badge badge-success w-100\">Aktif</span>" :
            "<span class=\"badge badge-light-dark  w-100\">Tidak Aktif</span>";
        })
        ->addColumn('button', function ($row) {
            $button = "";
            if($this->edit || $this->delete) {
                $button.= "<div class=\"btn-group dropright\">
					<button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
						<i class=\"fas fa-ellipsis-v\"></i> 
					</button>
					<div class=\"dropdown-menu dropright\">";
                if($this->edit) {
                    $button.= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#form\" data-backdrop=\"static\"><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
                }
                if($this->delete) {
                    $button.= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                }
                $button.= "</div>
				</div>";
            }
            return $button;
        })
        ->addColumn('image', function ($row) {
            $image_foto = public_path('images/foto/'.$row->image_foto);
            return (!empty($row->image_foto) && File::exists($image_foto)) ? "
				<a href=\"".asset('images/foto')."/".$row->image_foto."\" data-toggle=\"lightbox\" data-title=\"".$row->nama_foto."\" data-footer=\"<div class='w-100'>".$row->keterangan_foto."</div>\">
					<img src=\"".asset('images/foto')."/".$row->image_foto."\" style=\"width:75px;\">
				</a>" : "";
        }, 1)
        ->filter(function ($query) {
            if (request()->has('kategori')) {
                $query->where('id_content', request('kategori'));
            }
            if (request()->has('keyword')) {
                $query->where('nama_foto', 'like', "%" . request('keyword') . "%")
                ->orWhere('keterangan_foto', 'like', "%" . request('keyword') . "%");
            }
        })
        ->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->rawColumns(['display', 'button', 'detail', 'image'])
        ->toJson();
    }

    public function index()
    {
        $kategori = Content::where('status_content', 't')->where('id_kategori', 5)->orderBy('induk_content', 'desc')->orderBy('urutan_content')->get();
        $data = array_merge(ClassMenu::view($this->target), array('kategori' => $kategori), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','center','center'),
        'data' => array('button', 'detail', 'image', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','center','center'),
            'data' => array('detail', 'image', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $foto = Foto::where('id', $request->id)->first();
        if(!isset($foto)) {
            $foto = new Foto();
            $foto->id = 0;
            $foto->status_foto = 't';
            $foto->mode_foto = 'Add Foto';
        } else {
            $foto->mode_foto = 'Edit Foto';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $foto),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['image_foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
            [
				'image_foto.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
				'image_foto.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Foto::select('image_foto')->where('id', $request->id)->first();
        $image_foto = isset($data) ? $data->image_foto : '';
        if ($request->hasfile('image_foto')) {
            $foto_temp = public_path('images/foto/'.$image_foto);
            if(File::exists($foto_temp)) {
                File::delete($foto_temp);
            }

            $image = $request->file('image_foto');
            $image_foto = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/foto/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_foto);
        }

        $foto = $new ? new Foto() : Foto::find($request->id);
        $foto->id_content = $request->id_content;
        $foto->nama_foto = $request->nama_foto;
        $foto->keterangan_foto = $request->keterangan_foto;
        $foto->image_foto = $image_foto;
        $foto->status_foto = $request->status_foto == "on" ? "t" : "f";
        if($new) {
            $foto->created_by = Session::get('uid');
        }
        $foto->updated_by = Session::get('uid');

        if($new) {
            $foto->save();
        } else {
            $foto->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $foto = Foto::find($request->dt);
        $image_foto = public_path('images/foto/'.$foto->image_foto);
        if(File::exists($image_foto)) {
            File::delete($image_foto);
        }
        $foto->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
