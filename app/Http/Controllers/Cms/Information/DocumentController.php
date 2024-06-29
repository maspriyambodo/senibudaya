<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Content;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class DocumentController extends AuthController
{
    private $target = 'cms.information.document';

    public function json()
    {
        $dokumen = Dokumen::query();

        return Datatables::of($dokumen)
        ->addColumn('display', function ($row) {
            return $row->status_dokumen == "t" ?
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
        ->addColumn('files', function ($row) {
            $file_dokumen = public_path('files/'.$row->file_dokumen);
            return (!empty($row->file_dokumen) && File::exists($file_dokumen)) ? "<a href=\"#\" data-toggle=\"modal\" data-target=\"#pdf\" data-backdrop=\"static\" onclick=\"$.fn.doc('".asset('files')."/".$row->file_dokumen."');\">
					<img src=\"".asset('images/icon/pdf.png')."\" style=\"width:35px;\">
				</a>" : "";
        }, 1)
        ->filter(function ($query) {
            if (request()->has('kategori')) {
                $query->where('id_content', request('kategori'));
            }

            if (request()->has('keyword')) {
                $query->where('nama_dokumen', 'like', "%" . request('keyword') . "%");
            }
        })
        ->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->rawColumns(['display', 'button', 'files'])
        ->toJson();
    }

    public function index()
    {
        $kategori = Content::where('status_content', 't')->where('id_kategori', 1)->orderBy('induk_content')->orderBy('urutan_content')->get();
        $data = array_merge(ClassMenu::view($this->target), array('kategori' => $kategori), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','center','center'),
        'data' => array('button', 'nama_dokumen', 'files', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','center','center'),
            'data' => array('nama_dokumen', 'files', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $dokumen = Dokumen::where('id', $request->id)->first();
        if(!isset($dokumen)) {
            $dokumen = new Dokumen();
            $dokumen->id = 0;
            $dokumen->status_dokumen = 't';
            $dokumen->mode_dokumen = 'Add Document';
        } else {
            $dokumen->mode_dokumen = 'Edit Document';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $dokumen),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['file_dokumen' => 'mimes:pdf|max:12288'],
            [
				'file_dokumen.mimes' => 'Proses gagal, File harus berupa PDF.',
				'file_dokumen.max' => 'Proses gagal, Ukuran FILE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Dokumen::select('file_dokumen')->where('id', $request->id)->first();
        $file_dokumen = isset($data) ? $data->file_dokumen : '';
        if ($request->hasfile('file_dokumen')) {
            $dokumen_temp = public_path('files/'.$file_dokumen);
            if(File::exists($dokumen_temp)) {
                File::delete($dokumen_temp);
            }

            $file_dokumen = 'doc_'.round(microtime(true) * 1000).'.'.$request->file('file_dokumen')->getClientOriginalExtension();

            $image = $request->file('file_dokumen');
            $image->move(public_path('files'), $file_dokumen);
        }

        $dokumen = $new ? new Dokumen() : Dokumen::find($request->id);
        $dokumen->id_content = $request->id_content;
        $dokumen->nama_dokumen = $request->nama_dokumen;
        $dokumen->keterangan_dokumen = $request->keterangan_dokumen;
        $dokumen->file_dokumen = $file_dokumen;
        $dokumen->status_dokumen = $request->status_dokumen == "on" ? "t" : "f";
        if($new) {
            $dokumen->created_by = Session::get('uid');
        }
        $dokumen->updated_by = Session::get('uid');

        if($new) {
            $dokumen->save();
        } else {
            $dokumen->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $dokumen = Dokumen::find($request->dt);
        $file_dokumen = public_path('files/'.$dokumen->file_dokumen);
        if(File::exists($file_dokumen)) {
            File::delete($file_dokumen);
        }
        $dokumen->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
