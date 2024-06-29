<?php

namespace App\Http\Controllers\Cms\Consultation;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Konsultasi;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DataTables;

class AnswerController extends AuthController
{
    private $target = 'cms.consultation.answer';

    public function json()
    {
        $konsultasi = Konsultasi::query();

        return Datatables::of($konsultasi)
        ->editColumn('created_at', function ($data) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y H:i');
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
                    $button.= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"".url('/'.$this->page.'/form/'.$row->id)."\" ><i class=\"fas fa-pencil-alt\"></i> Jawab Pertanyaan</a>";
                }
                if($this->delete) {
                    $button.= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Pertanyaan</a>";
                }
                $button.= "</div>
				</div>";
            }
            return $button;
        })
        ->filter(function ($query) {
            $query->where('status_konsultasi', 'p');

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
        ->rawColumns(['button'])
        ->toJson();
    }

    public function index()
    {
        $filter = array("Nama Lengkap", "Judul");
        $data = array_merge(ClassMenu::view($this->target), array('filter' => $filter));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','left','center'),
        'data' => array('button', 'nama_konsultasi', 'judul_konsultasi', 'created_at'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','left','center'),
            'data' => array('nama_konsultasi', 'judul_konsultasi', 'created_at'),
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
        $konsultasi->status_konsultasi = "t";
        $konsultasi->updated_by = Session::get('uid');
        $konsultasi->update();

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
