<?php

namespace App\Http\Controllers\Cms\Consultation;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class GuidanceController extends AuthController
{
    private $target = 'cms.consultation.guidance';

    public function json()
    {
        $bimbingan = Bimbingan::query();

        return Datatables::of($bimbingan)
        ->editColumn('created_at', function ($row) {
            return date('d/m/Y', strtotime($row->created_at));
        })
        ->addColumn('display', function ($row) {
            return $row->status_bimbingan == "t" ?
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
                    $button.= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"".url('/'.$this->page.'/form/'.$row->id)."\" ><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
                }
                if($this->delete) {
                    $button.= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                }
                $button.= "</div>
				</div>";
            }
            return $button;
        })
        ->filter(function ($query) {
            if (request()->has('keyword')) {
                $query->where('nama_bimbingan', 'like', "%" . request('keyword') . "%");
            }
        })
        ->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->rawColumns(['display', 'button', 'image'])
        ->toJson();
    }

    public function index()
    {
        $data = array_merge(ClassMenu::view($this->target), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','center','center'),
        'data' => array('button', 'nama_bimbingan', 'created_at', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','center','center'),
            'data' => array('nama_bimbingan', 'created_at', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $bimbingan = Bimbingan::where('id', $request->id)->first();
        if(!isset($bimbingan)) {
            $bimbingan = new Bimbingan();
            $bimbingan->id = 0;
            $bimbingan->status_bimbingan = 't';
            $bimbingan->mode_bimbingan = 'Add Bimbingan';
        } else {
            $bimbingan->mode_bimbingan = 'Edit Bimbingan';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $bimbingan),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['image_bimbingan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
            [
				'image_bimbingan.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
				'image_bimbingan.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Bimbingan::select('image_bimbingan')->where('id', $request->id)->first();
        $image_bimbingan = isset($data) ? $data->image_bimbingan : '';
        if ($request->hasfile('image_bimbingan')) {
            $foto_temp = public_path('images/bimbingan/'.$image_bimbingan);
            if(File::exists($foto_temp)) {
                File::delete($foto_temp);
            }

            $image = $request->file('image_bimbingan');
            $image_bimbingan = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/bimbingan/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_bimbingan);
        }

        $bimbingan = $new ? new Bimbingan() : Bimbingan::find($request->id);
        $bimbingan->slug_bimbingan = $request->slug_bimbingan;
        $bimbingan->nama_bimbingan = $request->nama_bimbingan;
        $bimbingan->keterangan_bimbingan = $request->keterangan_bimbingan;
        $bimbingan->detail_bimbingan = $request->detail_bimbingan;
        $bimbingan->sumber_bimbingan = $request->sumber_bimbingan;
        $bimbingan->image_bimbingan = $image_bimbingan;
        $bimbingan->status_bimbingan = $request->status_bimbingan == "on" ? "t" : "f";
        if($new) {
            $bimbingan->created_by = Session::get('uid');
        }
        $bimbingan->updated_by = Session::get('uid');

        if($new) {
            $bimbingan->save();
        } else {
            $bimbingan->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $bimbingan = Bimbingan::find($request->dt);
        $image_bimbingan = public_path('images/bimbingan/'.$bimbingan->image_bimbingan);
        if(File::exists($image_bimbingan)) {
            File::delete($image_bimbingan);
        }
        $bimbingan->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
