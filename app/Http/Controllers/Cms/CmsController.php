<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Classes\ClassMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CmsController extends Controller
{
    public function index()
    {
        $view = 'cms.home';
        $menu = ClassMenu::view($view, 'Home');

        $content = array();
        foreach ($menu['menu'] as $detail) {
            foreach ($detail->detail_menu as $data) {
                $content[] = $data;
            }
        }
        $data = array_merge($menu, array('content' => $content));
        return view($view, $data);
    }
}
