<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Tokoh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class FigureController extends AuthController
{
    private $target = 'cms.information.figure';

    public function json()
    {
        $tokoh = Tokoh::query();

        return Datatables::of($tokoh)
        ->editColumn('created_at', function ($row) {
            return date('d/m/Y', strtotime($row->created_at));
        })
        ->addColumn('display', function ($row) {
            return $row->status_tokoh == "t" ?
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
                $query->where('nama_tokoh', 'like', "%" . request('keyword') . "%");
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
        'data' => array('button', 'nama_tokoh', 'created_at', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','center','center'),
            'data' => array('nama_tokoh', 'created_at', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $tokoh = Tokoh::where('id', $request->id)->first();
        if(!isset($tokoh)) {
            $tokoh = new Tokoh();
            $tokoh->id = 0;
            $tokoh->status_tokoh = 't';
            $tokoh->mode_tokoh = 'Add Tokoh';
        } else {
            $tokoh->mode_tokoh = 'Edit Tokoh';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $tokoh),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['image_tokoh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
            [
				'image_tokoh.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
				'image_tokoh.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Tokoh::select('image_tokoh')->where('id', $request->id)->first();
        $image_tokoh = isset($data) ? $data->image_tokoh : '';
        if ($request->hasfile('image_tokoh')) {
            $foto_temp = public_path('images/tokoh/'.$image_tokoh);
            if(File::exists($foto_temp)) {
                File::delete($foto_temp);
            }

            $image = $request->file('image_tokoh');
            $image_tokoh = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/tokoh/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_tokoh);
        }

        $tokoh = $new ? new Tokoh() : Tokoh::find($request->id);
        $tokoh->slug_tokoh = $request->slug_tokoh;
        $tokoh->nama_tokoh = $request->nama_tokoh;
        $tokoh->keterangan_tokoh = $request->keterangan_tokoh;
        $tokoh->detail_tokoh = $request->detail_tokoh;
        $tokoh->image_tokoh = $image_tokoh;
        $tokoh->status_tokoh = $request->status_tokoh == "on" ? "t" : "f";
        if($new) {
            $tokoh->created_by = Session::get('uid');
        }
        $tokoh->updated_by = Session::get('uid');

        if($new) {
            $tokoh->save();
        } else {
            $tokoh->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $tokoh = Tokoh::find($request->dt);
        $image_tokoh = public_path('images/tokoh/'.$tokoh->image_tokoh);
        if(File::exists($image_tokoh)) {
            File::delete($image_tokoh);
        }
        $tokoh->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
