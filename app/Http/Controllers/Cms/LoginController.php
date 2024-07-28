<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $ses_login = $request->session()->has('user');
        if ($ses_login) {
            $result = redirect('dashboard');
        } else {
//            $result = view('cms.login', array('param' => Parameter::data()));
            $result = view('cms.login2', array('param' => Parameter::data(), 'page' => 'Sign In'));
        }
        return $result;
    }
    
    public function forgot_password() {
        
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $credentials = [
            'id_user' => $request->username,
            'status_user' => 't',
            'password' => md5($request->password),
        ];

        if (Auth::attempt($credentials)) {
            $user = User::where('id_user', $request->username)->first();
            Session::put('uid', $user->id);
            Session::put('user', $user->id_user);
            Session::put('group', $user->id_group);
            Session::put('nama_user', $user->nama_user);

            $foto_user = public_path('cms/images/user/' . $user->foto_user);
            Session::put('foto_user', (File::exists($foto_user) && !empty($user->foto_user)) ? $user->foto_user : "default.png");
            $output = [
                'stat' => true,
                'url_direct' => url('/dashboard')
            ];
        } else {
            $output = [
                'stat' => false,
                'msgtxt' => 'Username password tidak sesuai.'
            ];
        }
        return response()->json($output);
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        Cookie::forget('start');
        Cookie::forget('length');
        Cookie::forget('keyword');
        Cookie::forget('kategori');
        Cookie::forget('sub');
        Cookie::forget('year');
        Cookie::forget('month');

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
