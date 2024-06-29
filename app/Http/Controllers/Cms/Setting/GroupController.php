<?php

namespace App\Http\Controllers\Cms\Setting;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Group;
use App\Models\Menu;
use App\Models\Akses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;

class GroupController extends AuthController
{
    private $target = 'cms.setting.group';
    private $status = array('view', 'input', 'edit', 'delete');

    public function json()
    {
        $group = Group::where(function ($query) {
            $query->where('nama_group', '!=', 'developer')->orwhereRaw("'devel'='".Session::get('user')."'");
        });

        return Datatables::of($group)
        ->addColumn('display', function ($row) {
            return $row->status_group == "t" ?
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
                    $button.= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#form\" data-backdrop=\"static\"><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
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
            if (request()->has('filter')) {
                $filter = explode(',', rtrim(request('filter'), ','));
            }

            if (request()->has('keyword')) {
                if(strlen($filter[0]) < 1) {
                    $query->where(function ($data) {
                        $data->where('nama_group', 'like', "%" . request('keyword') . "%")
                        ->orWhere('keterangan_group', 'like', "%" . request('keyword') . "%");
                        ;
                    });
                }

                if(in_array("0", $filter)) {
                    $query->where('nama_group', 'like', "%" . request('keyword') . "%");
                }
                if(in_array("1", $filter)) {
                    $query->where('keterangan_group', 'like', "%" . request('keyword') . "%");
                }
            }
        })
        ->rawColumns(['display', 'button'])
        ->toJson();
    }

    public function show($id)
    {
        $menu=array();
        $akses = Akses::where('id_group', $id)->get();
        foreach ($akses as $data) {
            $menu[$data->nama_akses][$data->id_menu] = $data->status_akses;
        }
        if(count($menu) < 1) {
            $akses = Menu::where('status_menu', 't')->orderBy('induk_menu')->orderBy('urutan_menu')->get();
            foreach ($akses as $data) {
                foreach ($this->status as $nama_akses) {
                    $menu[$nama_akses][$data->id] = "f";
                }
            }
        }

        return json_encode($menu);
    }

    public function index()
    {
        $menu = Menu::where('status_menu', 't')->orderBy('induk_menu')->orderBy('urutan_menu')->get();
        $status = Akses::where('id_group', Session::get('group'))->orderBy('id_menu')->get();
        foreach ($status as $data) {
            $status_akses[$data->id_menu][$data->nama_akses] = $data->status_akses;
        }

        foreach ($menu as $data) {
            $akses = array();
            $len = strlen($data->akses_menu);
            for($i=0; $i<$len; $i++) {
                $akses['' .$this->status[$i]. '_menu'] = (
                    (isset($status_akses[$data->id][''.$this->status[$i].'']) &&
                $status_akses[$data->id][''.$this->status[$i].''] == "t") ||
                Session::get('user') == 'devel'
                ) ? substr($data->akses_menu, $i, 1) : 0;
            }

            if(empty($data->induk_menu)) {
                $top[$data->id] = array_merge(array('id' => $data->id, 'nama_menu' => $data->nama_menu), $akses);
            } else {
                $child[$data->induk_menu][] = array_merge(array('id' => $data->id, 'nama_menu' => $data->nama_menu), $akses);
            }
        }

        $menu = array();
        foreach ($top as $id => $data) {
            $count = isset($child[$id]) ? count($child[$id]) : 0;
            if((isset($status_akses[$id]['view']) && $status_akses[$id]['view'] == 't') || Session::get('user') == 'devel' || $count > 0) {
                $menu[$id] = $data;
                $menu[$id]['count_menu'] = $count;
                if($count > 0) {
                    foreach ($child as $id => $value) {
                        $menu[$id]['detail_menu'] = (object) $value;
                    }
                } else {
                    $menu[$id]['detail_menu'] = new \stdClass();
                }
            }
        }
        $akses = json_decode(json_encode($menu));
        $filter = array("Group", "Keterangan");
        $data = array_merge(ClassMenu::view($this->target), array('akses' => $akses), array('filter' => $filter));

        $column = array(
        'id' => 'data',
        'align' => array('center', 'center', 'left', 'left', 'center'),
        'order' => array("[2, 'asc']"),
        'data' => array('button', 'nama_group', 'keterangan_group', 'display'),
        'nosort' => array(0,1),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center', 'left', 'left', 'center'),
            'order' => array("[1, 'asc']"),
            'data' => array('nama_group', 'keterangan_group', 'display'),
            'nosort' => array(0),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['nama_group' => 'unique:app_group,nama_group,'.$request->id],
            ['nama_group.unique' => 'Proses gagal, group '.strtoupper($request->nama_group).' sudah ada.']
        );

        //set app_group
        $group = $new ? new Group() : Group::find($request->id);
        $group->nama_group = $request->nama_group;
        $group->keterangan_group = $request->keterangan_group;
        $group->status_group = $request->status_group == "on" ? "t" : "f";
        if($new) {
            $group->created_by = Session::get('uid');
        }
        $group->updated_by = Session::get('uid');

        if($new) {
            $group->save();
        } else {
            $group->update();
        }

        //set app_akses
        $id = $new ? $group->id : $request->id;
        $menu = Menu::select('id')->where('status_menu', 't')->orderBy('induk_menu')->orderBy('urutan_menu')->get();
        foreach ($menu as $data) {
            foreach ($this->status as $nama_akses) {
                $status_menu = isset($request->$nama_akses[$data->id]) ? "t" : "f";
                $akses = Akses::where('id_group', $id)->where('id_menu', $data->id)->where('nama_akses', $nama_akses);
                $new = empty(count($akses->get())) ? true : false;

                if($new) {
                    $akses = new Akses();
                    $akses->id_group = $id;
                    $akses->id_menu = $data->id;
                    $akses->nama_akses = $nama_akses;
                    $akses->status_akses = $status_menu;
                    $akses->created_by = Session::get('uid');
                    $akses->updated_by = Session::get('uid');
                    $akses->save();
                } else {
                    $akses->update([
                    'status_akses' => $status_menu,
                    'created_by' => Session::get('uid'),
                    'updated_by' => Session::get('uid')
                    ]);
                }
            }
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        if(User::where('id_group', $request->dt)->get()->count() > 0) {
            return redirect($this->page)->withErrors(['msg' => 'Proses gagal, data sudah digunakan.']);
        } else {
            $group = Group::find($request->dt);
            $group->delete();

            $akses = Akses::where('id_group', $request->dt);
            $akses->delete();

            return redirect($this->page)->with('message', "Hapus data berhasil.");
        }
    }
}
