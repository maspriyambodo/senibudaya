<?php

namespace App\Http\Controllers\Cms\Consultation;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Konsultasi;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use DataTables;

class ConsultationController extends AuthController
{
    private $target = 'cms.consultation.consultation';

    public function json()
    {
        $konsultasi = Konsultasi::query();

        return Datatables::of($konsultasi)
        ->addColumn('display', function ($row) {
            return $row->status_konsultasi == "t" ?
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
            $query->where('status_konsultasi', '!=', 'p');
            if (request()->has('kategori')) {
                $query->where('id_jenis', request('kategori'));
            }

            if (request()->has('filter')) {
                $filter = explode(',', rtrim(request('filter'), ','));
            }
            if (request()->has('keyword')) {
                if(strlen($filter[0]) < 1) {
                    $query->where(function ($data) {
                        $data->where('nama_konsultasi', 'like', "%" . request('keyword') . "%")
                        ->orWhere('judul_konsultasi', 'like', "%" . request('keyword') . "%");
                    });
                }

                if(in_array("0", $filter)) {
                    $query->where('nama_konsultasi', 'like', "%" . request('keyword') . "%");
                }
                if(in_array("1", $filter)) {
                    $query->where('judul_konsultasi', 'like', "%" . request('keyword') . "%");
                }
            }
        })
        ->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->rawColumns(['button', 'display'])
        ->toJson();
    }

    public function index()
    {
        $jenis = Jenis::where('status_jenis', 't')->orderBy('urutan_jenis')->get();
        $filter = array("Nama Lengkap", "Judul");
        $data = array_merge(ClassMenu::view($this->target), array('jenis' => $jenis), array('filter' => $filter));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','left','center'),
        'data' => array('button', 'nama_konsultasi', 'judul_konsultasi', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','left','center'),
            'data' => array('nama_konsultasi', 'judul_konsultasi', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $jenis = Jenis::where('status_jenis', 't')->orderBy('urutan_jenis')->get();
        $konsultasi = Konsultasi::where('id', $request->id)->first();
        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $konsultasi),
            array('jenis' => $jenis),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        ClassMenu::store($this, false);

        $konsultasi = Konsultasi::find($request->id);
        $konsultasi->id_jenis = $request->id_jenis;
        $konsultasi->jawab_konsultasi = $request->jawab_konsultasi;
        $konsultasi->status_konsultasi = $request->status_konsultasi == "on" ? "t" : "f";
        $konsultasi->updated_by = Session::get('uid');
        $konsultasi->update();

        Cookie::queue('kategori', $request->id_jenis, 15);

        $message = "Update data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $konsultasi = Konsultasi::find($request->dt);
        $konsultasi->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
