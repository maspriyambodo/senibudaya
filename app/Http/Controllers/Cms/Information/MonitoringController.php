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
        $exec = TrMonitoring::with('provinsi', 'kabupaten', 'hasil', 'petugas', 'petugas.pegawai', 'hasil.lembagaSeni', 'hasil.seniman', 'hasil.programSeni');

        $this->applyFilters($exec, $request);

        $berita = $exec->orderBy('kabupaten')->get();
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
            $buttons .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/lihat/' . $row->id) . "\">
            <i class=\"fas fa-eye\"></i> Lihat Data</a>";
            $buttons .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/lihat/' . $row->id) . "\">
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

    public function kabupaten(Request $request) {
        $kab = KabupatenKota::where('id_provinsi', $request->id)->get();
        if ($kab) {
            return response()->json([
                        'success' => true,
                        'dt_kab' => $kab
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
                'no_monitoring' => $this->generateNoMonitoring($request),
                'tgl_monitoring' => Carbon::parse($request->tgltxt)->format('Y-m-d'),
                'provinsi' => $request->provtxt,
                'kabupaten' => $request->kabtxt,
                'created_by' => auth()->user()->id
            ];
            DB::beginTransaction(); // Start transaction
            try {
                $exec = TrMonitoring::create($data_monitoring);
                $lastInsertedId = $exec->id;

                // Insert related data
                $this->insertPetugas($request, $lastInsertedId);
                if ($request->nmlemtxt[0]) {
                    $this->insertLembagaSeni($request, $lastInsertedId);
                }
                if ($request->nmsenbudtxt[0]) {
                    $this->insertSeniman($request, $lastInsertedId);
                }
                if ($request->prgnmtxt[0]) {
                    $this->insertProgramSeni($request, $lastInsertedId);
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

    private function insertProgramSeni($request, $idMonitoring) {
        $data_programseni = [];
        foreach ($request->prgnmtxt as $index => $program) {
            $data_programseni[] = [
                'nama' => $program,
                'frekuensi' => $request->prgfretxt[$index],
                'tujuan' => $request->prgtujtxt[$index],
                'unsur' => $request->prgtunstxt[$index],
                'waktu' => $request->prgwkttxt[$index],
                'penyelenggara' => $request->prgpnytxt[$index],
                'created_by' => auth()->user()->id
            ];
        }

        // Insert data in bulk
        DtaProgramSeni::insert($data_programseni);

        // Link data with monitoring
        foreach ($data_programseni as $dt) {
            $lastInsertedId = DtaProgramSeni::where('nama', $dt['nama'])->latest()->first()->id;
            TrMonitoringHasil::create([
                'id_monitoring' => $idMonitoring,
                'id_content' => $lastInsertedId,
                'jenis' => 3,
                'created_by' => auth()->user()->id
            ]);
        }
    }

    // Insert multiple records into DtaSeniman and TrMonitoringHasil
    private function insertSeniman($request, $idMonitoring) {
        $data_seniman = [];
        foreach ($request->nmsenbudtxt as $index => $seniman) {
            $data_seniman[] = [
                'nama' => $seniman,
                'provinsi' => $request->provsenbudtxt[$index],
                'kabupaten' => $request->kabsenbudtxt[$index],
                'alamat' => $request->addrsenbudtxt[$index],
                'bidang' => $request->bidsenbudtxt[$index],
                'karya' => $request->karsenbudtxt[$index],
                'lembaga' => $request->orgsenbudtxt[$index],
                'created_by' => auth()->user()->id
            ];
        }

        // Insert data in bulk
        DtaSeniman::insert($data_seniman);

        // Link data with monitoring
        foreach ($data_seniman as $dt) {
            $lastInsertedId = DtaSeniman::where('nama', $dt['nama'])->latest()->first()->id;
            TrMonitoringHasil::create([
                'id_monitoring' => $idMonitoring,
                'id_content' => $lastInsertedId,
                'jenis' => 2,
                'created_by' => auth()->user()->id
            ]);
        }
    }

    // Insert multiple records into DtaLembagaSeni and TrMonitoringHasil
    private function insertLembagaSeni($request, $idMonitoring) {
        $data_senbud = [];
        foreach ($request->nmlemtxt as $index => $lembaga) {
            $data_senbud[] = [
                'nama' => $lembaga,
                'provinsi' => $request->provlemtxt[$index],
                'kabupaten' => $request->kablemtxt[$index],
                'alamat' => $request->addrlemtxt[$index],
                'fokus' => $request->foclemtxt[$index],
                'tingkat' => $request->tinlemtxt[$index],
                'program' => $request->prolemtxt[$index],
                'created_by' => auth()->user()->id
            ];
        }

        // Insert data in bulk
        DtaLembagaSeni::insert($data_senbud);

        // Link data with monitoring
        foreach ($data_senbud as $dt) {
            $lastInsertedId = DtaLembagaSeni::where('nama', $dt['nama'])->latest()->first()->id;
            TrMonitoringHasil::create([
                'id_monitoring' => $idMonitoring,
                'id_content' => $lastInsertedId,
                'jenis' => 1,
                'created_by' => auth()->user()->id
            ]);
        }
    }

    // Insert petugas data
    private function insertPetugas($request, $idMonitoring) {
        $data_petugas = [];
        foreach ($request->petugastxt as $petugas) {
            $data_petugas[] = [
                'id_monitoring' => $idMonitoring,
                'id_pegawai' => $petugas
            ];
        }

        // Insert data in bulk
        TrMonitoringPetugas::insert($data_petugas);
    }

    // Generate unique monitoring number
    private function generateNoMonitoring($request) {
        $tgl_monitoring = explode('/', $request->tgltxt);
        $tgl = $tgl_monitoring[0];
        $bulan = $tgl_monitoring[1];
        $tahun = substr($tgl_monitoring[2], 2);

        $last_num = TrMonitoring::where([
                    'provinsi' => $request->provtxt,
                    'kabupaten' => $request->kabtxt
                ])->orderBy('no_monitoring', 'desc')->first();

        if ($last_num) {
            $currnum = (int) substr($last_num->no_monitoring, 10) + 1;
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

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'tgltxt' => 'required|date',
            'provtxt' => 'required|integer|exists:mt_provinsi,id_provinsi',
            'kabtxt' => 'required|integer|exists:mt_kabupaten,id_kabupaten'
        ]);
        if ($validator->fails()) {
            return redirect('monitoring/ubah/' . $request->idMonitoring)
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $data_monitoring = [
                'tgl_monitoring' => Carbon::parse($request->tgltxt)->format('Y-m-d'),
                'provinsi' => $request->provtxt,
                'kabupaten' => $request->kabtxt,
                'updated_by' => auth()->user()->id
            ];
            DB::beginTransaction(); // Start transaction
            try {
                $exec = TrMonitoring::where([
                            'id' => $request->idMonitoring,
                            'no_monitoring' => $request->notxt
                        ])
                        ->update($data_monitoring);
                // Insert related data
                $this->updatePetugas($request);
                if ($request->nmlemtxt[0]) {
                    $this->updateLembagaSeni($request);
                }
                if ($request->nmsenbudtxt[0]) {
                    $this->insertSeniman($request);
                }
                if ($request->prgnmtxt[0]) {
                    $this->insertProgramSeni($request);
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

    private function updateLembagaSeni($request) {
        for ($i = 0; $i < count($request->idlembaga_seni); $i++) {
            DtaLembagaSeni::updateOrInsert([
                        'id' => $request->idlembaga_seni[$i]
                    ])
                    ->update([
                        'nama' => $request->nmlemtxt[$i],
                        'provinsi' => $request->provlemtxt[$i],
                        'kabupaten' => $request->kablemtxt[$i],
                        'alamat' => $request->addrlemtxt[$i],
                        'fokus' => $request->foclemtxt[$i],
                        'tingkat' => $request->tinlemtxt[$i],
                        'program' => $request->prolemtxt[$i],
                        'updated_by' => auth()->user()->id
            ]);
        }
    }

    private function updatePetugas($request) {
        for ($i = 0; $i < count($request->idmonpet); $i++) {
            TrMonitoringPetugas::where([
                        'id' => $request->idmonpet[$i],
                        'id_monitoring' => $request->idMonitoring
                    ])
                    ->update([
                        'id_pegawai' => $request[$i]->petugastxt,
                        'updated_by' => auth()->user()->id
            ]);
        }
    }

    public function ubah(Request $request) {
        $exec = TrMonitoring::with('provinsi', 'kabupaten', 'hasil', 'petugas', 'petugas.pegawai')
                ->where('tr_monitoring.id', $request->id)
                ->orWhereHas('petugas', function ($q) use ($request) {
                    $q->where('tr_monitoring_petugas.id_monitoring', $request->id);
                })
                ->first();
//        dd($exec);
//        return response()->json($exec);
        $lembaga_seni = TrMonitoringHasil::with(['lembagaSeni.provinsi', 'lembagaSeni.kabupaten'])
                ->where([
                    'id_monitoring' => $request->id,
                    'jenis' => 1
                ])
                ->get();
        $seniman = TrMonitoringHasil::with(['seniman.provinsi', 'seniman.kabupaten'])
                ->where([
                    'id_monitoring' => $request->id,
                    'jenis' => 2
                ])
                ->get();
        $programSeni = TrMonitoringHasil::with(['programSeni'])
                ->where([
                    'id_monitoring' => $request->id,
                    'jenis' => 3
                ])
                ->get();
//        dd($lembaga_seni);
        $provinsi = Provinsi::select('mt_provinsi.id_provinsi', 'mt_provinsi.nama AS provinsi', 'mt_provinsi.stat')
                        ->where('mt_provinsi.stat', 1)->get();
        $pegawai = Pegawai::where('stat', 1)->get();
        $data = array_merge(
                ClassMenu::view($this->target),
                [
                    'data' => $exec,
                    'lembaga_seni' => $lembaga_seni,
                    'seniman' => $seniman,
                    'programSeni' => $programSeni,
                    'provinsi' => $provinsi,
                    'pegawai' => $pegawai
                ]
        );
        return view($this->target . '-edit-form', $data);
    }

    public function lihat(Request $request) {
        $exec = TrMonitoring::with('provinsiLihat', 'kabupatenLihat', 'hasil', 'petugas', 'petugas.pegawai')
                ->where('tr_monitoring.id', $request->id)
                ->orWhereHas('petugas', function ($q) use ($request) {
                    $q->where('tr_monitoring_petugas.id_monitoring', $request->id);
                })
                ->first();
        $lembaga_seni = TrMonitoringHasil::with(['lembagaSeni.provinsiLihat', 'lembagaSeni.kabupatenLihat'])
                ->where([
                    'id_monitoring' => $request->id,
                    'jenis' => 1
                ])
                ->get();
        $seniman = TrMonitoringHasil::with(['seniman.provinsiLihat', 'seniman.kabupatenLihat'])
                ->where([
                    'id_monitoring' => $request->id,
                    'jenis' => 2
                ])
                ->get();
        $programSeni = TrMonitoringHasil::with(['programSeni'])
                ->where([
                    'id_monitoring' => $request->id,
                    'jenis' => 3
                ])
                ->get();
//        dd($seniman);
        $data = array_merge(
                ClassMenu::view($this->target),
                [
                    'data' => $exec,
                    'lembaga_seni' => $lembaga_seni,
                    'seniman' => $seniman,
                    'programSeni' => $programSeni
                ]
        );
        return view($this->target . '-view-form', $data);
    }

    public function add_lembaga(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            $exec = DtaLembagaSeni::create([
                'nama' => $request->nmtxt2,
                'alamat' => $request->addrtxt2,
                'fokus' => $request->fokLemtxt2,
                'tingkat' => $request->tgktxt2,
                'program' => $request->prgtxt2,
                'provinsi' => $request->provLemtxt2,
                'kabupaten' => $request->kabLemtxt2,
                'created_by' => auth()->user()->id
            ]);
            $lastInsertedId = $exec->id;
            TrMonitoringHasil::create([
                'id_monitoring' => $request->idMonitorHasil2,
                'id_content' => $lastInsertedId,
                'jenis' => 1,
                'created_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update tr_monitoring: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }

    public function update_lembaga(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            DtaLembagaSeni::where('id', $request->idLemtxt)
                    ->update([
                        'nama' => $request->nmtxt,
                        'alamat' => $request->addrtxt,
                        'fokus' => $request->fokLemtxt,
                        'tingkat' => $request->tgktxt,
                        'program' => $request->prgtxt,
                        'provinsi' => $request->provLemtxt,
                        'kabupaten' => $request->kabLemtxt,
                        'updated_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update dta_lembaga_seni: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }
    
    public function update_program(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            DtaProgramSeni::where('id', $request->idProtxt)
                    ->update([
                        'nama' => $request->progtxt,
                        'frekuensi' => $request->fretxt,
                        'tujuan' => $request->tujutxt,
                        'unsur' => $request->unstxt,
                        'waktu' => $request->wkutxt,
                        'penyelenggara' => $request->pnytxt,
                        'updated_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update dta_program_seni: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }
    
    public function simpan_seniman(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            $exec = DtaSeniman::create([
                'nama' => $request->senimantxt2,
                'provinsi' => $request->provSenitxt2,
                'kabupaten' => $request->kanSenitxt2,
                'alamat' => $request->addrSenitxt2,
                'bidang' => $request->bidSenitxt2,
                'karya' => $request->karSenitxt2,
                'lembaga' => $request->lemSenitxt2,
                'created_by' => auth()->user()->id
            ]);
            $lastInsertedId = $exec->id;
            TrMonitoringHasil::create([
                'id_monitoring' => $request->idMonitSenitxt,
                'id_content' => $lastInsertedId,
                'jenis' => 2,
                'created_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update Seniman: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }

    public function update_seniman(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            $exec = DtaSeniman::where('id', $request->idSenimantxt)
                    ->update([
                        'nama' => $request->senimantxt,
                        'provinsi' => $request->provSenitxt,
                        'kabupaten' => $request->kanSenitxt,
                        'alamat' => $request->addrSenitxt,
                        'bidang' => $request->bidSenitxt,
                        'karya' => $request->karSenitxt,
                        'lembaga' => $request->lemSenitxt,
                        'updated_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
//            throw new \Exception('Something went wrong!');
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $e) {
            DB::rollBack(); // Rollback transaction
            Log::error('An error occurred', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                        'success' => false,
                            ], 422);
        }
    }

    public function del_lembaga(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            DtaLembagaSeni::where('id', $request->idLemtxt2)
                    ->update([
                        'stat' => 0,
                        'updated_by' => auth()->user()->id
            ]);
            TrMonitoringHasil::where('id', $request->idMonHasil)
                    ->update([
                        'is_trash' => 0,
                        'updated_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update tr_monitoring: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }
    
    public function del_seniman(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            DtaSeniman::where('id', $request->idSeni2)
                    ->update([
                        'stat' => 0,
                        'updated_by' => auth()->user()->id
            ]);
            TrMonitoringHasil::where('id', $request->idDelMoni)
                    ->update([
                        'is_trash' => 0,
                        'updated_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update tr_monitoring: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }

    public function monitoring_hasil(Request $request) {
        $exec = TrMonitoringHasil::with('lembagaSeni')
                ->where([
                    'id' => $request->id,
                    'jenis' => 1
                ])
                ->get();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_monitoring' => $exec[0]
                            ], 200);
        } else {
            return response()->json([
                        'success' => false
                            ], 422);
        }
    }
    
    public function monitoring_hasil2(Request $request) {
        $exec = TrMonitoringHasil::with('seniman')
                ->where([
                    'id' => $request->id,
                    'jenis' => 2
                ])
                ->get();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_monitoring' => $exec[0]
                            ], 200);
        } else {
            return response()->json([
                        'success' => false
                            ], 422);
        }
    }

    public function detil_monitoring(Request $request) {
        $exec = TrMonitoring::where('id', $request->id)->get();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_monitoring' => $exec[0]
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function update1(Request $request) {
        $validator = Validator::make($request->all(), [
            'eidtxt' => 'required|integer|exists:tr_monitoring,id',
            'nmontxt' => 'required|string',
            'tglmontxt' => 'required|string',
            'provtxt' => 'required|integer|exists:mt_provinsi,id_provinsi',
            'kabtxt' => 'required|integer|exists:mt_kabupaten,id_kabupaten'
        ]);
        if ($validator->fails()) {
            return response()->json([
                        'success' => false,
                        'errmessage' => 'mohon lengkapi form!'
                            ], 422);
        } else {
            DB::beginTransaction(); // Start transaction
            try {
                TrMonitoring::where('id', $request->eidtxt)
                        ->update([
                            'tgl_monitoring' => Carbon::parse($request->tglmontxt)->format('Y-m-d'),
                            'provinsi' => $request->provtxt,
                            'kabupaten' => $request->kabtxt,
                            'updated_by' => auth()->user()->id
                ]);
                DB::commit(); // Commit transaction
                return response()->json([
                            'success' => true,
                                ], 200);
            } catch (Exception $exc) {
                DB::rollBack(); // Rollback transaction
                Log::error('Failed to update tr_monitoring: ' . $exc->getMessage(), [
                    'user_id' => auth()->user()->id,
                    'request_data' => $request->all(),
                ]);
                return response()->json([
                            'success' => true,
                                ], 422);
            }
        }
    }

    public function get_pegawai(Request $request) {
        $exec = TrMonitoringPetugas::with('pegawai')->where('id', $request->id)->first();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_pegawai' => $exec
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function update_pegawai(Request $request) {
        $validator = Validator::make($request->all(), [
            'idmonpeg' => 'required|integer|exists:tr_monitoring_petugas,id',
            'pegtxt' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                        'success' => false,
                        'errmessage' => 'mohon lengkapi form!'
                            ], 422);
        } else {
            DB::beginTransaction(); // Start transaction
            try {
                TrMonitoringPetugas::where('id', $request->idmonpeg)
                        ->update([
                            'id_pegawai' => $request->pegtxt,
                            'updated_by' => auth()->user()->id
                ]);
                DB::commit(); // Commit transaction
                return response()->json([
                            'success' => true,
                                ], 200);
            } catch (Exception $exc) {
                DB::rollBack(); // Rollback transaction
                Log::error('Failed to update tr_monitoring_petugas: ' . $exc->getMessage(), [
                    'user_id' => auth()->user()->id,
                    'request_data' => $request->all(),
                ]);
                return response()->json([
                            'success' => true,
                                ], 422);
            }
        }
    }

    public function add_pegawai(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            TrMonitoringPetugas::create([
                'id_monitoring' => $request->idmon3,
                'id_pegawai' => $request->addpegtxt,
                'created_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update tr_monitoring_petugas: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }

    public function delete_pegawai(Request $request) {
        DB::beginTransaction(); // Start transaction
        try {
            TrMonitoringPetugas::where('id', $request->idmonpeg2)
                    ->update([
                        'is_trash' => 0,
                        'updated_by' => auth()->user()->id
            ]);
            DB::commit(); // Commit transaction
            return response()->json([
                        'success' => true,
                            ], 200);
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to update tr_monitoring_petugas: ' . $exc->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                        'success' => true,
                            ], 422);
        }
    }
}
