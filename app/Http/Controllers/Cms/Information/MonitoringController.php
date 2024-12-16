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
                        ->editColumn('tgl_monitoring', fn($row) => Carbon::parse($row->tgl_monitoring)->translatedFormat('d/F/Y'))
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

    public function provinsi() {
        $prov = Provinsi::all();
        if ($prov) {
            return response()->json([
                        'success' => true,
                        'dt_prov' => $prov
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'tgltxt' => 'required|date',
                    'provtxt' => 'required|integer|exists:mt_provinsi,id_provinsi',
                    'kabtxt' => 'required|integer|exists:mt_kabupaten,id_kabupaten'
        ]);
        if ($validator->fails()) {
            return redirect('monitoring/add')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $data_monitoring = [
                'no_monitoring' => $this->generate_noMonitoring($request),
                'tgl_monitoring' => Carbon::parse($request->tgltxt)->format('Y-m-d'),
                'provinsi' => $request->provtxt,
                'kabupaten' => $request->kabtxt,
                'created_by' => auth()->user()->id
            ];
            DB::beginTransaction(); // Start transaction
            try {
                $exec = TrMonitoring::create($data_monitoring);
                $lastInsertedId = $exec->id;
                $this->insert_petugas($request, $lastInsertedId);
                if ($request->nmlemtxt[0]) {
                    $this->insert_lembagaseni($request, $lastInsertedId);
                }
                if ($request->nmsenbudtxt[0]) {
                    $this->insert_seniman($request, $lastInsertedId);
                }
                if ($request->prgnmtxt[0]) {
                    $this->insert_progseni($request, $lastInsertedId);
                }
                DB::commit(); // Commit transaction
                return redirect($this->page)->with('message', "Berhasil menyimpan data monitoring!");
            } catch (Exception $exc) {
                DB::rollBack(); // Rollback transaction
                Log::error('Failed to create or update user: ' . $exc->getMessage(), [
                    'user_id' => auth()->user()->id,
                    'request_data' => $request->all(),
                ]);
                return redirect($this->page)->with('message', "Gagal menyimpan data monitoring!");
            }
        }
    }

    private function insert_progseni($request, $idMonitoring) {// insert data table dta_program_seni
        for ($index = 0; $index < count($request->prgnmtxt); $index++) {
            $data_programseni[$index] = [
                'nama' => $request->prgnmtxt[$index],
                'frekuensi' => $request->prgfretxt[$index],
                'tujuan' => $request->prgtujtxt[$index],
                'unsur' => $request->prgtunstxt[$index],
                'waktu' => $request->prgwkttxt[$index],
                'penyelenggara' => $request->prgpnytxt[$index],
                'created_by' => auth()->user()->id
            ];
        }
        foreach ($data_programseni as $dt_programseni) {
            $exec = DtaProgramSeni::create([
                        'nama' => $dt_programseni['nama'],
                        'frekuensi' => $dt_programseni['frekuensi'],
                        'tujuan' => $dt_programseni['tujuan'],
                        'unsur' => $dt_programseni['unsur'],
                        'waktu' => $dt_programseni['waktu'],
                        'penyelenggara' => $dt_programseni['penyelenggara'],
                        'created_by' => auth()->user()->id
            ]);
            $lastInsertedId = $exec->id;
            TrMonitoringHasil::create([// insert data table tr_monitoring_hasil
                'id_monitoring' => $idMonitoring,
                'id_content' => $lastInsertedId,
                'jenis' => 3,
                'created_by' => auth()->user()->id
            ]);
        }
        return true;
    }

    private function insert_seniman($request, $idMonitoring) {// insert data table dta_seniman
        for ($index = 0; $index < count($request->nmsenbudtxt); $index++) {
            $data_seniman[$index] = [
                'nama' => $request->nmsenbudtxt[$index],
                'provinsi' => $request->provsenbudtxt[$index],
                'kabupaten' => $request->kabsenbudtxt[$index],
                'alamat' => $request->addrsenbudtxt[$index],
                'bidang' => $request->bidsenbudtxt[$index],
                'karya' => $request->karsenbudtxt[$index],
                'lembaga' => $request->orgsenbudtxt[$index],
                'created_by' => auth()->user()->id
            ];
        }
        foreach ($data_seniman as $dt_seniman) {
            $exec = DtaSeniman::create([
                        'nama' => $dt_seniman['nama'],
                        'provinsi' => $dt_seniman['provinsi'],
                        'kabupaten' => $dt_seniman['kabupaten'],
                        'alamat' => $dt_seniman['alamat'],
                        'bidang' => $dt_seniman['bidang'],
                        'karya' => $dt_seniman['karya'],
                        'lembaga' => $dt_seniman['lembaga'],
                        'created_by' => auth()->user()->id
            ]);
            $lastInsertedId = $exec->id;
            TrMonitoringHasil::create([// insert data table tr_monitoring_hasil
                'id_monitoring' => $idMonitoring,
                'id_content' => $lastInsertedId,
                'jenis' => 2,
                'created_by' => auth()->user()->id
            ]);
        }
        return true;
    }

    private function insert_lembagaseni($request, $idMonitoring) {// insert data table dta_lembaga_seni
        for ($index = 0; $index < count($request->nmlemtxt); $index++) {
            $data_senbud[$index] = [
                'nama' => $request->nmlemtxt[$index],
                'provinsi' => $request->provlemtxt[$index],
                'kabupaten' => $request->kablemtxt[$index],
                'alamat' => $request->addrlemtxt[$index],
                'fokus' => $request->foclemtxt[$index],
                'tingkat' => $request->tinlemtxt[$index],
                'program' => $request->prolemtxt[$index],
                'created_by' => auth()->user()->id
            ];
        }
        foreach ($data_senbud as $dt_senbud) {
            $exec = DtaLembagaSeni::create([
                        'nama' => $dt_senbud['nama'],
                        'provinsi' => $dt_senbud['provinsi'],
                        'kabupaten' => $dt_senbud['kabupaten'], //kurang kecamatan dan kelurahan
                        'alamat' => $dt_senbud['alamat'],
                        'fokus' => $dt_senbud['fokus'],
                        'tingkat' => $dt_senbud['tingkat'],
                        'program' => $dt_senbud['program'],
                        'created_by' => auth()->user()->id
            ]);
            $lastInsertedId = $exec->id;
            TrMonitoringHasil::create([// insert data table tr_monitoring_hasil
                'id_monitoring' => $idMonitoring,
                'id_content' => $lastInsertedId,
                'jenis' => 2,
                'created_by' => auth()->user()->id
            ]);
        }
        return true;
    }

    private function insert_petugas($request, $idMonitoring) {
        for ($index = 0; $index < count($request->petugastxt); $index++) {
            $data_petugas[$index] = [
                'id_monitoring' => $idMonitoring,
                'id_pegawai' => $request->petugastxt[$index]
            ];
        }
        foreach ($data_petugas as $dt_petugas) {
            TrMonitoringPetugas::create([
                'id_monitoring' => $idMonitoring,
                'id_pegawai' => $dt_petugas['id_pegawai'],
                'created_by' => auth()->user()->id
            ]);
        }
        return true;
    }

    private function generate_noMonitoring($request) {
        //format nomor monitoring 31 7513 01 01 24 0001 = 2 digit kode provinsi, 4 digit kode kabupaten, 2 digit tanggal input, 2 digit bulan input, 2 digit tahun input, 4 digit nomor urut
        $tgl_monitoring = explode('/', $request->tgltxt);
        $tgl = $tgl_monitoring[0];
        $bulan = $tgl_monitoring[1];
        $tahun = substr($tgl_monitoring[2], 2);
        $last_num = TrMonitoring::where([
                    'provinsi' => $request->provtxt,
                    'kabupaten' => $request->kabtxt
                ])->orderBy('no_monitoring', 'desc')->first();
        if ($last_num) {
            $currnum = (int) substr($last_num, 10) + 1;
        } else {
            $currnum = $request->provtxt . $request->kabtxt . $tgl . $bulan . $tahun . str_pad(1, 4, 0, STR_PAD_LEFT);
        }
        return $currnum;
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
