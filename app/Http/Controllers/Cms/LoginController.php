<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use \App\Helpers\User as UserHelper;
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

    public function user_activate(Request $request) {
        $decrypted = UserHelper::dekrip($request->param);
        $param = explode(',', $decrypted);
        $id_user = $param[0];
        User::where('id', $id_user)
                ->update(['status_user' => 't']);
        return view('cms.user_activate', ['param' => Parameter::data(), 'page' => ' Account Activation']);
    }
    
    public function auth_register(Request $request) {
        $cek_email = User::where('id_user', $request->username)->first();
        if (!is_null($cek_email)) {
            $response = ['stat' => false, 'msgtxt' => 'Your email has been registered, please login.'];
        } else {
            $data = [
                'id_group' => 5,
                'id_user' => $request->username,
                'password_user' => Hash::make(md5($request->password)),
                'nama_user' => $request->namatxt,
                'email_user' => $request->username,
                'status_user' => 'f',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $exec = User::insertGetId($data);
            if (!is_null($exec)) {
                $url_activate = null;
                while (true) {
                    $enc = UserHelper::enkrip($exec . ',' . strtotime(date('Y-m-d H:i:s')));
                    $decrypted = UserHelper::dekrip($enc);
                    $param = explode(',', $decrypted);
                    if (!empty($param[0])) {
                        $url_activate = $enc;
                        break;
                    }
                }
                $url_link = url('user-activate/' . $url_activate);
                $mail_data = [
                    'id' => $exec,
                    'user_email' => $request->username,
                    'pass_reset_link' => $url_link,
                    'nama' => $request->namatxt,
                    'subject_title' => 'E-mail verification',
                    'views_file' => 'emails.mail_activate',
                    'nama' => null
                ];
                UserHelper::composeEmail($mail_data);
                $response = ['stat' => true, 'msgtxt' => 'We have sent an email to activate your account.', 'url_direct' => url('login')];
            } else {
                $response = ['stat' => false, 'msgtxt' => 'System error while saving data.'];
            }
        }
        return response()->json($response);
    }

    public function signup(Request $request) {
        $ses_login = $request->session()->has('user');
        if ($ses_login) {
            $result = redirect('dashboard');
        } else {
            $result = view('cms.signup', array('param' => Parameter::data(), 'page' => 'Sign Up'));
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
            $url_activate = null;
            while (true) {
                $enc = UserHelper::enkrip($user->id_user . ',' . strtotime(date('Y-m-d H:i:s')));
                $decrypted = UserHelper::dekrip($enc);
                $param = explode(',', $decrypted);
                if (!empty($param[0])) {
                    $url_activate = $enc;
                    break;
                }
            }
            $pass_reset_link = url('reset-password/' . $url_activate);
            $data = [
                'id' => $user->id,
                'user_email' => $user->id_user,
                'pass_reset_link' => $pass_reset_link,
                'subject_title' => 'Reset Password',
                'views_file' => 'emails.reset_password',
                'nama' => $user->nama_user
            ];
            UserHelper::composeEmail($data);
            $response = [
                'stat' => true,
                'url_direct' => url('login')
            ];
        } else {
            $response = [
                'stat' => false,
                'msgtxt' => 'user tidak ditemukan!'
            ];
        }
        return response()->json($response);
    }

    public function reset_password(Request $request) {
        $decrypted = UserHelper::dekrip($request->param);
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

    public function auth(Request $request): JsonResponse {
        // Validate the request inputs
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
//            'g-recaptcha-response' => 'recaptcha'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => ['stat' => false, 'msgtxt' => 'Invalid input.']], 400); // Use 400 for bad request
        }

        // Retrieve the user by username
        $user = User::where('id_user', $request->username)->first();
        $credentials = [
            'id_user' => $request->username,
            'status_user' => 't',
            'password' => md5($request->password),
        ];
        // Check if user exists and verify password
        if (Auth::attempt($credentials)) {
            // Regenerate session ID for security
            Session::regenerate();

            // Store user information in session
            Session::put('uid', $user->id);
            Session::put('user', $user->id_user);
            Session::put('group', $user->id_group);
            Session::put('nama_user', $user->nama_user);
            Session::put('foto_user', File::exists(public_path('cms/images/user/' . $user->foto_user)) ? $user->foto_user : "default.png");

            // Redirect based on user group
            $url = $user->id_group == 5 ? route('profile') : route('dashboard');
            return response()->json(['stat' => true, 'url_direct' => $url]);
        } else {
            // Return a generic error message
            return response()->json(['stat' => false, 'msgtxt' => 'Invalid credentials.'], 401);
        }
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
