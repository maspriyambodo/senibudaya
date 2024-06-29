<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Classes\ClassMenu;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $auth = ClassMenu::group(session('group'));
            foreach ($auth as $key => $data) {
                $this->$key=$data;
            }
            $this->page=request()->segments()[0];
            $this->mode=isset(request()->segments()[1]) ? request()->segments()[1] : '';

            return $next($request);
        });
    }
}
