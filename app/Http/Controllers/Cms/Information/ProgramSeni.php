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
use App\Models\DtaProgramSeni;
use App\Models\TrMonitoring;
use DataTables;

class ProgramSeni extends AuthController {

    private $target = 'programSeni.index_program';

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
            'data' => array('button', 'nama', 'frekuensi', 'tujuan', 'unsur', 'waktu', 'penyelenggara', 'created_at'),
            'nosort' => array(0),
        );
        $data2 = array_merge($data, array('column' => $column));
        return view($this->target, $data2);
    }

    public function json(Request $request) {
        $exec = DtaProgramSeni::where('stat', 1);

        $this->applyFilters($exec, $request);

        $berita = $exec->orderBy('id')->get();
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

    public function detil(Request $request) {
        $exec = TrMonitoring::with('hasil', 'hasil.programSeni')
                ->whereHas('hasil.programSeni', function ($q) use ($request) {
                    $q->where('id', $request->id);
                })
                ->first();
        if ($exec) {
            return response()->json([
                        'success' => true,
                        'dt_programSeni' => $exec
            ]);
        } else {
            return response()->json([
                        'success' => false
            ]);
        }
    }

    public function Update(Request $request) {
        $validator = Validator::make($request->all(), [
            'eidtxt' => 'required|integer|exists:dta_program_seni,id',
            'nomontxt2' => 'required|integer|exists:tr_monitoring,no_monitoring',
            'nmtxt2' => 'required|string',
            'bidtxt2' => 'required|string', // frekuensi
            'tigtxt2' => 'required|string', // tujuan
            'prgtxt2' => 'required|string', // unsur
            'wktxt2' => 'required|string', // waktu
            'pnltxt2' => 'required|string' // penyelenggara
        ]);
        if ($validator->fails()) {
            return response()->json([
                        'success' => false,
                        'errmessage' => 'mohon lengkapi form!'
                            ], 422);
        } else {
            DB::beginTransaction(); // Start transaction
            try {
                DtaProgramSeni::where('id', $request->eidtxt)
                        ->update([
                            'nama' => $request->nmtxt2,
                            'frekuensi' => $request->bidtxt2,
                            'tujuan' => $request->tigtxt2,
                            'unsur' => $request->prgtxt2,
                            'waktu' => $request->wktxt2,
                            'penyelenggara' => $request->pnltxt2,
                            'updated_by' => auth()->user()->id
                ]);
                DB::commit(); // Commit transaction
                return response()->json([
                            'success' => true,
                                ], 200);
            } catch (Exception $exc) {
                DB::rollBack(); // Rollback transaction
                Log::error('Failed to create or update lembaga: ' . $exc->getMessage(), [
                    'user_id' => auth()->user()->id,
                    'request_data' => $request->all(),
                ]);
                return response()->json([
                            'success' => false,
                            'errmessage' => 'error ketika update data, errcode: 02012258a'
                                ], 422);
            }
        }
    }

    public function Delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'didtxt' => 'required|integer|exists:dta_program_seni,id'
        ]);
        if ($validator->fails()) {
            return response()->json([
                        'success' => false,
                        'errmessage' => 'mohon lengkapi form!'
                            ], 422);
        } else {
            DB::beginTransaction(); // Start transaction
            try {
                DtaProgramSeni::where('id', $request->didtxt)
                        ->update([
                            'stat' => 0,
                            'updated_by' => auth()->user()->id
                ]);
                DB::commit(); // Commit transaction
                return response()->json([
                            'success' => true
                                ], 200);
            } catch (Exception $exc) {
                DB::rollBack(); // Rollback transaction
                Log::error('Failed to create or delete program seni: ' . $exc->getMessage(), [
                    'user_id' => auth()->user()->id,
                    'request_data' => $request->all(),
                ]);
                return response()->json([
                            'success' => false,
                            'errmessage' => 'error ketika delete data, errcode: 02012258b'
                                ], 422);
            }
        }
    }
}
