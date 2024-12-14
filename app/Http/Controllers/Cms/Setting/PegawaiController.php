<?php

namespace App\Http\Controllers\Cms\Setting;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
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
}
