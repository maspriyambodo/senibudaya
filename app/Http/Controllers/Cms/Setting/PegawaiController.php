<?php

namespace App\Http\Controllers\Cms\Setting;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Image;

class PegawaiController extends AuthController {

    private $target = 'cms.setting.pegawai';

    public function json(Request $request) {
        $exec = Pegawai::with('golongan')
                ->where('dta_pegawai.stat', 1)
                ->orderBy('dta_pegawai.nama');
        // Apply filters
        $this->applyFilters($exec, $request);

        $berita = $exec->latest()->get();

        return Datatables::of($berita)
                        ->addColumn('button', fn($row) => $this->getActionButtons($row))
                        ->rawColumns(['button'])
                        ->make(true);
    }

    private function applyFilters($query, Request $request) {
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('dta_pegawai.nama', 'like', "%" . $request->keyword . "%")
                        ->orWhere('dta_pegawai.nip', 'like', "%" . $request->keyword . "%")
                        ->orWhere('dta_pegawai.mail', 'like', "%" . $request->keyword . "%")
                        ->whereHas('golongan', function ($q) use ($request) {
                            $q->orWhere('pangkat', 'like', "%" . $request->keyword . "%");
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
            $buttons .= '<a id="edit" class="dropdown-item has-icon" href="javascript:void(0);" onclick="editData(' . $row->id . ');"><i class="fas fa-pencil-alt"></i> Ubah Data</a>';
        }

        if ($this->delete) {
            $buttons .= '<a id="hapus" class="dropdown-item has-icon" href="javascript:void(0);" onclick="deleteData(' . $row->id . ');"><i class="fas fa-trash"></i> Hapus Data</a>';
        }

        $buttons .= "</div></div>";

        return $buttons;
    }

    public function index() {

        $filter = ['Nama', 'NIP', 'email', 'Jabatan'];
        $golongan = Golongan::where('stat', 1)->get();
        $data = array_merge(ClassMenu::view($this->target), [
            'dt_gol' => $golongan,
            'filter' => $filter,
            'column' => $this->getColumnConfig()
        ]);

        return view($this->target, $data);
    }

    private function getColumnConfig() {
        // Default column configuration
        $column = [
            'id' => 'data',
            'align' => ['center', 'center', 'left', 'center', 'left', 'left'],
            'order' => ["[1, 'asc']"],
            'data' => ['button', 'nama', 'nip', 'mail', 'jabatan', 'display'],
            'nosort' => [0, 1, 2],
        ];
        return $column;
    }

    public function edit(Request $request) {
        $exec = Pegawai::where('id', $request->id)->first();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_user' => $exec
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function store(Request $request) {
        if ($request->q == 'add') {
            $validator = Validator::make($request->all(), [
                        'namatxt' => 'required|string|max:255',
                        'niptxt' => 'required|integer|unique:dta_pegawai,nip',
                        'mailtxt' => 'required|email|unique:dta_pegawai,mail',
                        'pangtxt' => 'required|integer|exists:mt_golongan,id'
            ]);
        } elseif ($request->q == 'update') {
            $validator = Validator::make($request->all(), [
                        'e_id' => 'required|integer|exists:dta_pegawai,id',
                        'namatxt2' => 'required|string|max:255',
                        'niptxt2' => 'required|integer',
                        'mailtxt2' => 'required|email',
                        'pangtxt2' => 'required|integer|exists:mt_golongan,id'
            ]);
        } elseif ($request->q == 'delete') {
            $validator = Validator::make($request->all(), [
                        'd_id' => 'required|integer|exists:dta_pegawai,id',
                        'namatxt3' => 'required|string|max:255',
                        'niptxt3' => 'required|integer',
                        'mailtxt3' => 'required|email',
                        'pangtxt3' => 'required|integer|exists:mt_golongan,id'
            ]);
        }
        if ($validator->fails()) {
            return redirect($this->page)->with('message', $validator->errors());
        }
        DB::beginTransaction();
        try {
            if ($request->q == 'add') {
                Pegawai::create([
                    'nama' => $request->namatxt,
                    'nip' => $request->niptxt,
                    'mail' => $request->mailtxt,
                    'jabatan' => $request->pangtxt,
                    'stat' => 1,
                    'created_by' => auth()->user()->id
                ]);
            } elseif ($request->q == 'update') {
                Pegawai::where('id', $request->e_id)
                        ->update([
                            'nama' => $request->namatxt2,
                            'nip' => $request->niptxt2,
                            'mail' => $request->mailtxt2,
                            'jabatan' => $request->pangtxt2,
                            'updated_by' => auth()->user()->id
                ]);
            } elseif ($request->q == 'delete') {
                Pegawai::where('id', $request->d_id)
                        ->update([
                            'stat' => 0,
                            'updated_by' => auth()->user()->id
                ]);
            }
            DB::commit(); // Commit transaction
            return redirect($this->page)->with('message', 'data pegawai berhasil disimpan!');
        } catch (Exception $exc) {
            DB::rollBack(); // Rollback transaction
            Log::error('Failed to create or update user: ' . $e->getMessage(), [
                'user_id' => auth()->user()->id,
                'request_data' => $request->all(),
            ]);
        }
    }
}
