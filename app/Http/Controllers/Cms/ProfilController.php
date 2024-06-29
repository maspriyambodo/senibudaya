<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Classes\ClassMenu;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Image;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::where('id', Session::get('uid'))->first();
        $group = Group::where('id', Session::get('group'))->first();

        $view = 'cms.profil';
        $data = array_merge(ClassMenu::view($view, 'Profil User', 'profil'), array('user'=> $user, 'nama_group' => $group->nama_group));

        return view($view, $data);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            ['id_user' => 'unique:app_user,id_user,'.$request->id, 'foto_user' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            ['id_user.unique' => 'Proses gagal, Username '.strtoupper($request->id_user).' sudah ada.', 'foto_user.image' => 'Proses gagal, File FOTO harus berupa gambar.']
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

            $foto_user = 'img_'.round(microtime(true) * 1000).'.'.$request->file('foto_user')->getClientOriginalExtension();

            $image = $request->file('foto_user');
            $foto_user = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('cms/images/user/');
            $img_file = Image::make($image->getRealPath());
            $img_file->resize(125, 125)->save($path.'/'.$foto_user);
        }

        $user = User::find($request->id);
        $user->id_user = $request->id_user;
        $user->nama_user = $request->nama_user;
        $user->email_user = $request->email_user;
        $user->foto_user = $foto_user;
        $user->updated_by = Session::get('uid');

        $user->update();

        Session::put('user', $request->id_user);
        Session::put('nama_user', $request->nama_user);

        $foto_user = public_path('cms/images/user/'.$user->foto_user);
        Session::put('foto_user', (File::exists($foto_user) && !empty($user->foto_user)) ? $user->foto_user : "default.png");

        return redirect('profil')->with('message', "Update profil user berhasil.");
    }

    public function change(Request $request)
    {
        $user = User::find(Session::get('uid'));
        $user->password_user = Hash::make(md5($request->password_reset));
        $user->updated_by = Session::get('uid');

        $user->update();

        return redirect('logout');
    }
}
