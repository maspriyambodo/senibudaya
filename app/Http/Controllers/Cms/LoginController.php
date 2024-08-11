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
use Illuminate\Support\Facades\Mail;
use App\Mail\MailController;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    public function index(Request $request) {
        $ses_login = $request->session()->has('user');
        if ($ses_login) {
            $result = redirect('dashboard');
        } else {
//            $result = view('cms.login', array('param' => Parameter::data()));
            $result = view('cms.login2', array('param' => Parameter::data(), 'page' => 'Sign In'));
        }
        return $result;
    }

    public function forgot_password(Request $request) {
        $ses_login = $request->session()->has('user');
        if ($ses_login) {
            $result = redirect('dashboard');
        } else {
            $result = view('cms.vresetpass', array('param' => Parameter::data(), 'page' => 'Forgot Password'));
        }
        return $result;
    }

    public function req_password(Request $request) {
        $user = User::where('id_user', $request->email)->first();
        if (!is_null($user)) {
            $response = [
                'stat' => true
            ];
            $pass_reset_link = url('reset-password/' . enkrip($user->id_user . ',' . strtotime(date('Y-m-d H:i:s'))));
            $data = [
                'id' => $user->id,
                'user_email' => $user->id_user,
                'pass_reset_link' => $pass_reset_link,
                'subject_title' => 'Reset Password',
                'views_file' => 'emails.reset_password'
            ];
            Mail::to($user->id_user)->send(new MailController($data));
        } else {
            $response = [
                'stat' => false,
                'msgtxt' => 'user tidak ditemukan!'
            ];
        }
        return response()->json($response);
    }

    public function reset_password(Request $request) {
        $decrypted = dekrip($request->param);
        $param = explode(',', $decrypted);
        $user_email = $param[0];
        if (count($param) <> 2) {
            $result = redirect('/');
        } else {
            $start_timestamp = (int) strtotime(date('Y-m-d H:i:s'));
            $end_timestamp = (int) $param[1];
            $valid_time = (abs($end_timestamp - $start_timestamp) / 60);
            if ($valid_time > 10) {
                $result = view('cms.setup_password', array('param' => Parameter::data(), 'page' => ' Setup New Password', 'valid_time' => false, 'user_email' => $user_email)); //ganti jadi false
            } else {
                $result = view('cms.setup_password', array('param' => Parameter::data(), 'page' => ' Setup New Password', 'valid_time' => true, 'user_email' => $user_email));
            }
        }
        return $result;
    }

    public function setup_password(Request $request) {
        $user_mail = $request->user_email;
        $new_password = $request->password;
        $exec = User::where('id_user', $user_mail)
                ->update(['password_user' => Hash::make(md5($new_password))]);
        if($exec){
            $response = ['stat' => true];
        } else {
            $response = ['stat' => false, 'msgtxt' => 'Error system, errcode 15470808'];
        }
        return response()->json($response);
    }

    public function auth(Request $request) {
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

    public function logout(Request $request) {
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
