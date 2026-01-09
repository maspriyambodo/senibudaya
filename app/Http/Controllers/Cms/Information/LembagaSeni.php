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
use Yajra\DataTables\Facades\DataTables;
use Exception;

class LembagaSeni extends AuthController {

    private $target = 'lembaga.index_lembaga';

    /**
     * Properties dynamically set by parent AuthController from ClassMenu::group()
     * @var bool
     */
    protected $edit;
    protected $delete;
    protected $add;
    protected $page;
    protected $mode;

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

    public function add() {
        $data = ClassMenu::view($this->target);
        return view('lembaga.add-form', $data);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'nomontxt' => 'required|integer|exists:tr_monitoring,no_monitoring',
            'nmtxt' => 'required|string|max:255',
            'provtxt' => 'required|integer|exists:mt_provinsi,id_provinsi',
            'kabtxt' => 'required|integer|exists:mt_kabupaten,id_kabupaten',
            'addrtxt' => 'required|string',
            'foctxt' => 'required|string',
            'tigtxt' => 'required|string',
            'prgtxt' => 'required|string'
        ], [
            'nomontxt.required' => 'Nomor monitoring harus diisi',
            'nomontxt.integer' => 'Nomor monitoring harus berupa angka',
            'nomontxt.exists' => 'Nomor monitoring tidak valid',
            'nmtxt.required' => 'Nama lembaga seni harus diisi',
            'nmtxt.max' => 'Nama lembaga seni maksimal 255 karakter',
            'provtxt.required' => 'Provinsi harus dipilih',
            'provtxt.exists' => 'Provinsi tidak valid',
            'kabtxt.required' => 'Kabupaten/Kota harus dipilih',
            'kabtxt.exists' => 'Kabupaten/Kota tidak valid',
            'addrtxt.required' => 'Alamat harus diisi',
            'foctxt.required' => 'Fokus kegiatan harus diisi',
            'tigtxt.required' => 'Tingkat harus diisi',
            'prgtxt.required' => 'Program harus diisi'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errmessage' => $validator->errors()->first()
            ], 422);
        }

        DB::beginTransaction();
        try {
            DtaLembagaSeni::create([
                'nama' => $request->nmtxt,
                'provinsi' => $request->provtxt,
                'kabupaten' => $request->kabtxt,
                'alamat' => $request->addrtxt,
                'fokus' => $request->foctxt,
                'tingkat' => $request->tigtxt,
                'program' => $request->prgtxt,
                'stat' => 1,
                'created_by' => auth()->id()
            ]);

            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to create lembaga: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->all()
            ]);
            return response()->json([
                'success' => false,
                'errmessage' => 'Error saat menyimpan data. Kode error: 30122247'
            ], 500);
        }
    }

    public function json(Request $request) {
        $exec = DtaLembagaSeni::with(['provinsi', 'kabupaten'])->where('stat', 1);

        $this->applyFilters($exec, $request);

        $data = $exec->orderBy('kabupaten')->get();
        return Datatables::of($data)
                        ->editColumn('provinsi', fn($row) => $row->provinsi->nama ?? '-')
                        ->editColumn('kabupaten', fn($row) => $row->kabupaten->nama ?? '-')
                        ->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->translatedFormat('d F Y'))
                        ->addColumn('button', fn($row) => $this->getActionButtons($row))
                        ->rawColumns(['button'])
                        ->make(true);
    }

    private function applyFilters($query, Request $request) {
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('alamat', 'like', "%{$keyword}%")
                  ->orWhere('fokus', 'like', "%{$keyword}%")
                  ->orWhere('tingkat', 'like', "%{$keyword}%")
                  ->orWhere('program', 'like', "%{$keyword}%")
                  ->orWhereHas('provinsi', function ($subQ) use ($keyword) {
                      $subQ->where('nama', 'like', "%{$keyword}%");
                  })
                  ->orWhereHas('kabupaten', function ($subQ) use ($keyword) {
                      $subQ->where('nama', 'like', "%{$keyword}%");
                  });
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
            $buttons .= '<a id="del' . $row->id . '" class="dropdown-item has-icon" href="javascript:void(0);" onclick="dLembaga(' . $row->id . ');"><i class="fas fa-trash"></i> Hapus Data</a>';
        }

        $buttons .= "</div></div>";

        return $buttons;
    }

    public function form(Request $request)
    {
        $lemSeni = DtaLembagaSeni::where('id', $request->id)->first();
        if(!isset($lemSeni)) {
            $lemSeni = new DtaLembagaSeni();
            $lemSeni->id = 0;
            $lemSeni->stat = 1;
            $lemSeni->mode_foto = 'Add Lembaga Seni';
        } else {
            $lemSeni->mode_foto = 'Edit Lembaga Seni';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $lemSeni),
        );

        return view('lembaga.add-form', $data);
    }

    public function detil(Request $request) {
        try {
            $exec = TrMonitoring::with([
                'hasil',
                'hasil.lembagaSeni.provinsi',
                'hasil.lembagaSeni.kabupaten'
            ])
            ->whereHas('hasil.lembagaSeni', function ($q) use ($request) {
                $q->where('id', $request->id);
            })
            ->first();

            return response()->json([
                'success' => !is_null($exec),
                'dt_lembaga' => $exec
            ]);
        } catch (Exception $e) {
            Log::error('Failed to fetch lembaga detail: ' . $e->getMessage(), [
                'request_id' => $request->id
            ]);
            return response()->json([
                'success' => false,
                'errmessage' => 'Error fetching data'
            ], 500);
        }
    }

    public function provinsi() {
        try {
            $provinces = Provinsi::select('id_provinsi', 'nama')->get();
            return response()->json([
                'success' => true,
                'dt_prov' => $provinces
            ]);
        } catch (Exception $e) {
            Log::error('Failed to fetch provinces: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'errmessage' => 'Error fetching provinces'
            ], 500);
        }
    }

    public function kabupaten(Request $request) {
        try {
            $regencies = KabupatenKota::select('id_kabupaten', 'nama')
                ->where('id_provinsi', $request->id_provinsi)
                ->get();
            return response()->json([
                'success' => true,
                'dt_kab' => $regencies
            ]);
        } catch (Exception $e) {
            Log::error('Failed to fetch regencies: ' . $e->getMessage(), [
                'id_provinsi' => $request->id_provinsi
            ]);
            return response()->json([
                'success' => false,
                'errmessage' => 'Error fetching regencies'
            ], 500);
        }
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'didtxt' => 'required|integer|exists:dta_lembaga_seni,id'
        ], [
            'didtxt.required' => 'ID lembaga seni harus diisi',
            'didtxt.integer' => 'ID lembaga seni harus berupa angka',
            'didtxt.exists' => 'Lembaga seni tidak ditemukan'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errmessage' => $validator->errors()->first()
            ], 422);
        }

        DB::beginTransaction();
        try {
            DtaLembagaSeni::where('id', $request->didtxt)->update([
                'stat' => 0,
                'updated_by' => auth()->id()
            ]);

            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete lembaga: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'lembaga_id' => $request->didtxt
            ]);
            return response()->json([
                'success' => false,
                'errmessage' => 'Error saat menghapus data. Kode error: 30122348'
            ], 500);
        }
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'eidtxt' => 'required|integer|exists:dta_lembaga_seni,id',
            'nomontxt2' => 'required|integer|exists:tr_monitoring,no_monitoring',
            'nmtxt2' => 'required|string|max:255',
            'eprovtxt' => 'required|integer|exists:mt_provinsi,id_provinsi',
            'ekabtxt' => 'required|integer|exists:mt_kabupaten,id_kabupaten',
            'addrtxt2' => 'required|string',
            'foctxt2' => 'required|string',
            'tigtxt2' => 'required|string',
            'prgtxt2' => 'required|string'
        ], [
            'eidtxt.required' => 'ID lembaga seni harus diisi',
            'eidtxt.exists' => 'Lembaga seni tidak ditemukan',
            'nomontxt2.required' => 'Nomor monitoring harus diisi',
            'nomontxt2.exists' => 'Nomor monitoring tidak valid',
            'nmtxt2.required' => 'Nama lembaga seni harus diisi',
            'nmtxt2.max' => 'Nama lembaga seni maksimal 255 karakter',
            'eprovtxt.required' => 'Provinsi harus dipilih',
            'eprovtxt.exists' => 'Provinsi tidak valid',
            'ekabtxt.required' => 'Kabupaten/Kota harus dipilih',
            'ekabtxt.exists' => 'Kabupaten/Kota tidak valid',
            'addrtxt2.required' => 'Alamat harus diisi',
            'foctxt2.required' => 'Fokus kegiatan harus diisi',
            'tigtxt2.required' => 'Tingkat harus diisi',
            'prgtxt2.required' => 'Program harus diisi'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errmessage' => $validator->errors()->first()
            ], 422);
        }

        DB::beginTransaction();
        try {
            DtaLembagaSeni::where('id', $request->eidtxt)->update([
                'nama' => $request->nmtxt2,
                'provinsi' => $request->eprovtxt,
                'kabupaten' => $request->ekabtxt,
                'alamat' => $request->addrtxt2,
                'fokus' => $request->foctxt2,
                'tingkat' => $request->tigtxt2,
                'program' => $request->prgtxt2,
                'updated_by' => auth()->id()
            ]);

            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to update lembaga: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'lembaga_id' => $request->eidtxt
            ]);
            return response()->json([
                'success' => false,
                'errmessage' => 'Error saat mengupdate data. Kode error: 30122246'
            ], 500);
        }
    }
}
