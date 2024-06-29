<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Opini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class OpinionController extends AuthController
{
    private $target = 'cms.information.opinion';

    public function json()
    {
        $opini = Opini::query();

        return Datatables::of($opini)
        ->addColumn('display', function ($row) {
            return $row->status_opini == "t" ?
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
                $query->where('nama_opini', 'like', "%" . request('keyword') . "%");
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
        'align' => array('center','center','left','left','center'),
        'data' => array('button', 'nama_opini', 'sumber_opini', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','left','center'),
            'data' => array('nama_opini', 'sumber_opini', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $opini = Opini::where('id', $request->id)->first();
        if(!isset($opini)) {
            $opini = new Opini();
            $opini->id = 0;
            $opini->status_opini = 't';
            $opini->mode_opini = 'Add Opini';
        } else {
            $opini->mode_opini = 'Edit Opini';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $opini),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['image_opini' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
            [
				'image_opini.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
				'image_opini.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Opini::select('image_opini')->where('id', $request->id)->first();
        $image_opini = isset($data) ? $data->image_opini : '';
        if ($request->hasfile('image_opini')) {
            $foto_temp = public_path('images/opini/'.$image_opini);
            if(File::exists($foto_temp)) {
                File::delete($foto_temp);
            }

            $image = $request->file('image_opini');
            $image_opini = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/opini/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_opini);
        }

        $opini = $new ? new Opini() : Opini::find($request->id);
        $opini->slug_opini = $request->slug_opini;
        $opini->nama_opini = $request->nama_opini;
        $opini->keterangan_opini = $request->keterangan_opini;
        $opini->detail_opini = $request->detail_opini;
        $opini->sumber_opini = $request->sumber_opini;
        $opini->image_opini = $image_opini;
        $opini->status_opini = $request->status_opini == "on" ? "t" : "f";
        if($new) {
            $opini->created_by = Session::get('uid');
        }
        $opini->updated_by = Session::get('uid');

        if($new) {
            $opini->save();
        } else {
            $opini->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $opini = Opini::find($request->dt);
        $image_opini = public_path('images/opini/'.$opini->image_opini);
        if(File::exists($image_opini)) {
            File::delete($image_opini);
        }
        $opini->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
