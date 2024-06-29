<?php

namespace App\Http\Controllers\Cms\Setting;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class UserController extends AuthController
{
    private $target = 'cms.setting.user';

    public function json()
    {
        $user = User::select('app_user.*', 'app_group.nama_group')
        ->join('app_group', 'app_group.id', '=', 'app_user.id_group')
        ->where(function ($query) {
            $query->whereRaw("id_user!='devel' or 'devel'='".Session::get('user')."'");
        });

        return Datatables::of($user)
        ->addColumn('display', function ($row) {
            return $row->status_user == "t" ?
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
                    $button.= "<a id=\"update\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#change\" data-backdrop=\"static\"><i class=\"fas fa-unlock-alt\"></i> Ubah Password</a> 
					<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#form\" data-backdrop=\"static\"><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
                }
                if($this->delete) {
                    $button.= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                }
                $button.= "</div>
				</div>";
            }
            return $button;
        })
        ->addColumn('image', function ($row) {
            $foto_user = public_path('cms/images/user/'.$row->foto_user);
            return "<img src=\"".asset('cms/images/user')."/".(
                (!empty($row->foto_user) && File::exists($foto_user)) ? $row->foto_user : 'default.png'
            )."\" class=\"img-radius\" style=\"width:30px;\">";
        }, 1)
        ->filter(function ($query) {
            if (request()->has('filter')) {
                $filter = explode(',', rtrim(request('filter'), ','));
            }

            if (request()->has('keyword')) {
                if(strlen($filter[0]) < 1) {
                    $query->where(function ($data) {
                        $data->where('id_user', 'like', "%" . request('keyword') . "%")
                        ->orWhere('nama_user', 'like', "%" . request('keyword') . "%")
                        ->orWhere('nama_group', 'like', "%" . request('keyword') . "%");
                    });
                }

                if(in_array("0", $filter)) {
                    $query->where('id_user', 'like', "%" . request('keyword') . "%");
                }
                if(in_array("1", $filter)) {
                    $query->where('nama_user', 'like', "%" . request('keyword') . "%");
                }
                if(in_array("2", $filter)) {
                    $query->where('nama_group', 'like', "%" . request('keyword') . "%");
                }
            }
        })
        ->rawColumns(['button', 'image', 'display'])
        ->toJson();
    }

    public function index()
    {
        $group = Group::where('status_group', 't')->where(function ($query) {
            $query->where('nama_group', '!=', 'developer')->orwhereRaw("'devel'='".Session::get('user')."'");
        })->orderBy('nama_group')->get();
        $filter = array("Username", "Nama Lengkap", "Group");

        $data = array_merge(ClassMenu::view($this->target), array('group' => $group), array('filter' => $filter));

        $column = array(
            'id' => 'data',
            'align' => array('center', 'center', 'center', 'left', 'left', 'left', 'center'),
            'order' => array("[3, 'asc']"),
            'data' => array('button', 'image', 'id_user', 'nama_user', 'nama_group', 'display'),
            'nosort' => array(0,1,2),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
                'id' => 'data',
                'align' => array('center', 'center', 'left', 'left', 'left', 'center'),
                'order' => array("[2, 'asc']"),
                'data' => array('image', 'id_user', 'nama_user', 'nama_group', 'display'),
                'nosort' => array(0,1),
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
            [
				'id_user' => 'unique:app_user,id_user,'.$request->id, 
				'foto_user' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'
			],
            [
				'id_user.unique' => 'Proses gagal, Username '.strtoupper($request->id_user).' sudah ada.', 
				'foto_user.image' => 'Proses gagal, File FOTO harus berupa gambar.',
				'foto_user.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $foto_user = "";
        $user = User::select('foto_user')->where('id', $request->id)->get();
        foreach ($user as $data) {
            $foto_user = $data->foto_user;
        }

        if ($request->hasfile('foto_user')) {
            $foto_temp = public_path('cms/images/user/'.$foto_user);
            if(File::exists($foto_temp)) {
                File::delete($foto_temp);
            }

            $image = $request->file('foto_user');
            $foto_user = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('cms/images/user/');
            $img_file = Image::make($image->getRealPath());
            $img_file->resize(125, 125)->save($path.'/'.$foto_user);
        }

        $user = $new ? new User() : User::find($request->id);
        $user->id_group = $request->id_group;
        $user->id_user = $request->id_user;
        if($new) {
            $user->password_user = Hash::make(md5($request->password_user));
        }
        $user->nama_user = $request->nama_user;
        $user->email_user = $request->email_user;
        $user->foto_user = $foto_user;
        $user->status_user = $request->status_user == "on" ? "t" : "f";
        if($new) {
            $user->created_by = Session::get('uid');
        }
        $user->updated_by = Session::get('uid');

        if($new) {
            $user->save();
        } else {
            $user->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect()->back()->with('message', $message);
    }

    public function change(Request $request)
    {
        $user = User::find($request->ch);
        $user->password_user = Hash::make(md5($request->password_change));
        $user->updated_by = Session::get('uid');

        $user->update();

        return redirect()->back()->with('message', "Ubah password berhasil.");
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->dt);
        $foto_user = public_path('cms/images/user/'.$user->foto_user);
        if(File::exists($foto_user)) {
            File::delete($foto_user);
        }

        $user->delete();

        return redirect()->back()->with('message', "Hapus data berhasil.");
    }
}
