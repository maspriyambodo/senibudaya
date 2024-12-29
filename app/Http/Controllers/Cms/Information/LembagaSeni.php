<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Helpers\User as UserHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\DtaLembagaSeni;
use App\Models\TrMonitoring;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use DataTables;

class LembagaSeni extends AuthController {

    private $target = 'lembaga.index_lembaga';

    public function index() {
        $data = array_merge(
                ClassMenu::view($this->target),
                [
                    'filter' => []
                ]
        );
        $column = array(
            'id' => 'data',
            'align' => array('center', 'left'),
            'data' => array('button', 'nama', 'provinsi', 'kabupaten', 'alamat', 'fokus', 'tingkat', 'program', 'created_at'),
            'nosort' => array(0),
        );
        $data2 = array_merge($data, array('column' => $column));
        return view($this->target, $data2);
    }

    public function json(Request $request) {
        $exec = DtaLembagaSeni::with('provinsi', 'kabupaten');

        $this->applyFilters($exec, $request);

        $berita = $exec->orderBy('kabupaten')->get();
        return Datatables::of($berita)
                        ->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->translatedFormat('d/F/Y'))
                        ->addColumn('button', fn($row) => $this->getActionButtons($row))
                        ->rawColumns(['button'])
                        ->make(true);
    }

    private function applyFilters($query, Request $request) {
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('no_monitoring', $request->keyword)
                        ->orWhere('tgl_monitoring', 'like', "%" . str_replace(['/', ' '], ['-', '-'], $request->keyword) . "%"); //format pencarian tanggal Y-m-d
            });
            $query->orWhereHas('provinsi', function ($q) use ($request) {
                $q->where('nama', 'like', "%" . $request->keyword . "%");
            });
            $query->orWhereHas('kabupaten', function ($q) use ($request) {
                $q->where('nama', 'like', "%" . $request->keyword . "%");
            });
        }
    }

    private function getActionButtons($row) {
        if (!$this->edit && !$this->delete) {
            return '';
        }
        $buttons = "<div class=\"btn-group dropright\">
        <button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
            <i class=\"fas fa-ellipsis-v\"></i>
        </button>
        <div class=\"dropdown-menu dropright\">";

        if ($this->edit) {
            $buttons .= '<a id="view' . $row->id . '" class="dropdown-item has-icon" href="javascript:void(0);" onclick="vLembaga(' . $row->id . ');"><i class="fas fa-eye"></i> Lihat Data</a>';
            $buttons .= '<a id="edit' . $row->id . '" class="dropdown-item has-icon" href="javascript:void(0);" onclick="eLembaga(' . $row->id . ');"><i class="fas fa-pencil-alt"></i> Ubah Data</a>';
        }

        if ($this->delete) {
            $buttons .= '<a id="del' . $row->id . '" class="dropdown-item has-icon" href="javascript:void(0);"><i class="fas fa-trash"></i> Hapus Data</a>';
        }

        $buttons .= "</div></div>";

        return $buttons;
    }

    public function detil(Request $request) {
        $exec = TrMonitoring::with('hasil', 'hasil.lembagaSeni', 'hasil.lembagaSeni.provinsi', 'hasil.lembagaSeni.kabupaten')
                ->whereHas('hasil.lembagaSeni', function ($q) use ($request) {
                    $q->where('id', $request->id);
                })
                ->first();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_lembaga' => $exec
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function Provinsi() {
        $exec = Provinsi::all();
        return response()->json([
                    'success' => true,
                    'dt_prov' => $exec
        ]);
    }

    public function Kabupaten(Request $request) {
        $exec = KabupatenKota::where('id_provinsi', $request->id_provinsi)->get();
        return response()->json([
                    'success' => true,
                    'dt_kab' => $exec
        ]);
    }
}
