<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Helpers\User as UserHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\TrMonitoring;
use App\Models\TrMonitoringPetugas;
use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\TrMonitoringHasil;
use App\Models\DtaLembagaSeni;
use App\Models\DtaSeniman;
use App\Models\DtaProgramSeni;
use DataTables;
use Image;

class MonitoringController extends AuthController {

    private $target = 'cms.information.monitoring';

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
            'data' => array('button', 'no_monitoring', 'provinsi', 'kabupaten', 'created_at'),
            'nosort' => array(0),
        );
        $data2 = array_merge($data, array('column' => $column));
        return view($this->target, $data2);
    }

    public function json(Request $request) {
//        DB::enableQueryLog();
        $exec = TrMonitoring::with('provinsi', 'kabupaten');

        $this->applyFilters($exec, $request);

        $berita = $exec->get();
//        $query = DB::getQueryLog();
//        $query = end($query);
//        ddd($query);
        return Datatables::of($berita)
                        ->editColumn('created_at', fn($row) => \Carbon\Carbon::parse($row->created_at)->format('d/M/Y'))
                        ->addColumn('button', fn($row) => $this->getActionButtons($row))
                        ->rawColumns(['button'])
                        ->make(true);
    }

    private function applyFilters($query, Request $request) {
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('no_monitoring', $request->keyword);
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
            $buttons .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/form/' . $row->id) . "\">
            <i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
        }

        if ($this->delete) {
            $buttons .= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\">
            <i class=\"fas fa-trash\"></i> Hapus Data</a>";
        }

        $buttons .= "</div></div>";

        return $buttons;
    }

    public function pegawai() {
        $pegawai = Pegawai::where('stat', 1)->get();
        if ($pegawai) {
            return response()->json([
                        'success' => true,
                        'dt_pegawai' => $pegawai
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function add() {
        $provinsi = Provinsi::select('mt_provinsi.id_provinsi', 'mt_provinsi.nama AS provinsi', 'mt_provinsi.stat')
                        ->where('mt_provinsi.stat', 1)->get();
        $pegawai = Pegawai::where('stat', 1)->get();
        $data = array_merge(
                ClassMenu::view($this->target),
                [
                    'provinsi' => $provinsi,
                    'pegawai' => $pegawai
                ]
        );
        return view($this->target . '-add-form', $data);
    }
}
