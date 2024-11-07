<?php

namespace App\Classes;

use App\Models\Menu;
use App\Models\Akses;
use App\Models\Parameter;
use Illuminate\Support\Facades\Session;

class ClassMenu {

    public static function view($view, $title = "", $current = "", $icon = "") {
        $status = array("view", "input", "edit", "delete");
        $menu = Menu::where('status_menu', 't')->orderBy('induk_menu')->orderBy('urutan_menu')->get();
        $akses = Akses::where('id_group', Session::get('group'))->orderBy('id_menu')->get();

        foreach ($akses as $data) {
            $status_akses[$data->id_menu][$data->nama_akses] = $data->status_akses;
        }

        foreach ($menu as $data) {
            $akses_menu = array();
            for ($i = 0; $i < count($status); $i++)
                $akses_menu['' . $status[$i] . ''] = (isset($status_akses[$data->id]['' . $status[$i] . '']) && $status_akses[$data->id]['' . $status[$i] . ''] == "t") ?
                        true : false;

            if (empty($data->induk_menu)) {
                $appAkses[empty($data->folder_menu) ? 'cms.' . $data->target_menu : 'cms.' . $data->folder_menu . '.' . $data->target_menu] = array_merge(array(
                    'parent' => '',
                    'title' => $data->nama_menu,
                    'current' => $data->target_menu,
                    'icon' => $data->icon_menu,
                        ), $akses_menu);

                $top[$data->id] = array(
                    'id' => $data->id,
                    'nama_menu' => $data->nama_menu,
                    'target_menu' => $data->target_menu,
                    'icon_menu' => empty($data->icon_menu) ? "fas fa-angle-right" : $data->icon_menu,
                );
            } else {
                $appAkses[empty($data->folder_menu) ? 'cms.' . $data->target_menu : 'cms.' . $data->folder_menu . '.' . $data->target_menu] = array_merge(array(
                    'parent' => $top[$data->induk_menu]['nama_menu'],
                    'title' => $data->nama_menu,
                    'current' => $data->target_menu,
                    'icon' => $data->icon_menu,
                        ), $akses_menu);

                if (isset($status_akses[$data->id]['view']) && $status_akses[$data->id]['view'] == 't')
                    $child[$data->induk_menu][] = array(
                        'id' => $data->id,
                        'nama_menu' => $data->nama_menu,
                        'target_menu' => $data->target_menu,
                        'icon_menu' => empty($data->icon_menu) ? "fas fa-angle-right" : $data->icon_menu,
                    );
            }
        }


        foreach ($top as $id => $data) {
            $count = isset($child[$id]) ? count($child[$id]) : 0;
            if ((isset($status_akses[$id]['view']) && $status_akses[$id]['view'] == 't') || $count > 0) {
                $appMenu[$id] = $data;
                $appMenu[$id]['count_menu'] = $count;
                if ($count > 0) {
                    foreach ($child as $id => $value) {
                        $appMenu[$id]['detail_menu'] = (object) $value;
                    }
                }
            }
        }
        if (isset($appMenu))
            ksort($appMenu);

        return isset($appAkses[$view]) ?
                array_merge($appAkses[$view], array(
                    'param' => Parameter::data(),
                    'menu' => json_decode(json_encode(isset($appMenu) ? $appMenu : array())),
                    'column' => array(),
                )) :
                array(
            'parent' => '',
            'title' => $title,
            'current' => $current,
            'icon' => $icon,
            'view' => true,
            'input' => false,
            'edit' => false,
            'delete' => false,
            'param' => Parameter::data(),
            'menu' => json_decode(json_encode(isset($appMenu) ? $appMenu : array())),
            'column' => array(),
        );
    }

    public static function group($id) {
        $segment = request()->segments();
        $menu = isset($segment[0]) ? $segment[0] : "";
        $akses = Akses::select('nama_akses', 'status_akses')
                        ->join('app_menu', 'app_menu.id', '=', 'app_akses.id_menu')
                        ->where('id_group', $id)
                        ->where('target_menu', $menu)
                        ->orderBy('id_menu')->get();

        $result = array(
            "view" => false,
            "input" => false,
            "edit" => false,
            "delete" => false,
        );
        foreach ($akses as $data) {
            $result[$data->nama_akses] = $data->status_akses == "t" ? true : false;
        }

        $page = isset($segment[1]) ? $segment[1] : "index";
        if (in_array($page, array("index", "json", "show")) && !$result['view'])
            return abort(redirect('404'));

        if (in_array($page, array("store")) && !$result['input'] && !$result['edit'])
            return abort(redirect($menu));

        if (in_array($page, array("change")) && !$result['edit'])
            return abort(redirect($menu));

        if (in_array($page, array("destroy")) && !$result['delete'])
            return abort(redirect($menu));


        return json_decode(json_encode($result));
    }

    public static function store($var, $new) {
        $menu = isset(request()->segments()[0]) ? request()->segments()[0] : "";
        if (($new && !$var->input) || (!$new && !$var->edit))
            return abort(redirect($menu));
    }
}
