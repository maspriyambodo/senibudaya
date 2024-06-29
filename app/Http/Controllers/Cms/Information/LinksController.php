<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Content;
use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class LinksController extends AuthController
{
    private $target = 'cms.information.links';

    public function json()
    {
        $links = Links::query();

        return Datatables::of($links)
        ->addColumn('display', function ($row) {
            return $row->status_link == "t" ?
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
        ->filter(function ($query) {
            if (request()->has('kategori')) {
                $query->where('id_content', request('kategori'));
            }
            if (request()->has('keyword')) {
                $query->where('nama_link', 'like', "%" . request('keyword') . "%")
                ->orWhere('keterangan_link', 'like', "%" . request('keyword') . "%");
            }
        })
        ->rawColumns(['display', 'button'])
        ->toJson();
    }

    public function index()
    {
        $kategori = Content::where('status_content', 't')->where('id_kategori', 8)->orderBy('induk_content', 'desc')->orderBy('urutan_content')->get();
        $data = array_merge(ClassMenu::view($this->target), array('kategori' => $kategori), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','left','center'),
        'data' => array('button', 'nama_link', 'url_link', 'display'),
        'nosort' => array(0,1),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','left','center'),
            'data' => array('nama_link', 'url_link', 'display'),
            'nosort' => array(0),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $links = Links::where('id', $request->id)->first();
        if(!isset($links)) {
            $links = new Links();
            $links->id = 0;
            $links->status_link = 't';
            $links->mode_link = 'Add Links';
        } else {
            $links->mode_link = 'Edit Links';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $links),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['image_link' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
            [
				'image_link.image' => 'Proses gagal, File LOGO harus berupa gambar.',
				'image_link.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Links::select('image_link')->where('id', $request->id)->first();
        $image_link = isset($data) ? $data->image_link : '';
        if ($request->hasfile('image_link')) {
            $links_temp = public_path('images/links/'.$image_link);
            if(File::exists($links_temp)) {
                File::delete($links_temp);
            }

            $image = $request->file('image_link');
            $image_link = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/link/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_link);
        }

        $links = $new ? new Links() : Links::find($request->id);
        $links->id_content = $request->id_content;
        $links->nama_link = $request->nama_link;
        $links->keterangan_link = $request->keterangan_link;
        $links->url_link = $request->url_link;
        $links->image_link = $image_link;
        $links->status_link = $request->status_link == "on" ? "t" : "f";
        if($new) {
            $links->created_by = Session::get('uid');
        }
        $links->updated_by = Session::get('uid');

        if($new) {
            $links->save();
        } else {
            $links->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $links = Links::find($request->dt);
        $image_link = public_path('images/link/'.$links->image_link);
        if(File::exists($image_link)) {
            File::delete($image_link);
        }
        $links->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
