<?php

namespace App\Classes;

use App\Models\Menu;
use App\Models\Akses;
use App\Models\Parameter;
use Illuminate\Support\Facades\Session;

class ClassMenu {

    public static function view($view, $title = "", $current = "", $icon = "") {
        // Define possible access statuses
        $status = ["view", "input", "edit", "delete"];

        // Fetch menus and access rights
        $menu = Menu::where('status_menu', 't')->orderBy('induk_menu')->orderBy('urutan_menu')->get();
        $akses = Akses::where('id_group', Session::get('group'))->orderBy('id_menu')->get();
        
        // Organize access rights into an associative array
        $status_akses = [];
        foreach ($akses as $data) {
            $status_akses[$data->id_menu][$data->nama_akses] = $data->status_akses;
        }

        $appAkses = [];
        $top = [];
        $child = [];

        foreach ($menu as $data) {
            // Determine access rights for each menu item
            $akses_menu = array_combine($status, array_map(function ($s) use ($data, $status_akses) {
                        return isset($status_akses[$data->id][$s]) && $status_akses[$data->id][$s] == "t";
                    }, $status));

            $menuKey = empty($data->folder_menu) ? 'cms.' . $data->target_menu : 'cms.' . $data->folder_menu . '.' . $data->target_menu;

            // Construct top-level menu items
            if (empty($data->induk_menu) || $data->induk_menu == 0) {
                $appAkses[$menuKey] = array_merge([
                    'parent' => '',
                    'title' => $data->nama_menu,
                    'current' => $data->target_menu,
                    'icon' => $data->icon_menu,
                        ], $akses_menu);

                $top[$data->id] = [
                    'id' => $data->id,
                    'nama_menu' => $data->nama_menu,
                    'target_menu' => $data->target_menu,
                    'icon_menu' => $data->icon_menu ?: "fas fa-angle-right",
                ];
            } else {
                // Construct child menu items
                $appAkses[$menuKey] = array_merge([
                    'parent' => $top[$data->induk_menu]['nama_menu'],
                    'title' => $data->nama_menu,
                    'current' => $data->target_menu,
                    'icon' => $data->icon_menu,
                        ], $akses_menu);

                if (isset($status_akses[$data->id]['view']) && $status_akses[$data->id]['view'] == 't') {
                    $child[$data->induk_menu][] = [
                        'id' => $data->id,
                        'nama_menu' => $data->nama_menu,
                        'target_menu' => $data->target_menu,
                        'icon_menu' => $data->icon_menu ?: "fas fa-angle-right",
                    ];
                }
            }
        }

        // Build the final menu structure
        $appMenu = [];
        foreach ($top as $id => $data) {
            $count = isset($child[$id]) ? count($child[$id]) : 0;
            if ((isset($status_akses[$id]['view']) && $status_akses[$id]['view'] == 't') || $count > 0) {
                $appMenu[$id] = $data;
                $appMenu[$id]['count_menu'] = $count;
                if ($count > 0) {
                    $appMenu[$id]['detail_menu'] = (object) $child[$id];
                }
            }
        }

        if (isset($appMenu)) {
            ksort($appMenu);
            $appMenu = array_values($appMenu); // Reset keys of $appMenu
        }

        // Return the final view configuration
        return isset($appAkses[$view]) ? array_merge($appAkses[$view], [
                    'param' => Parameter::data(),
                    'menu' => json_decode(json_encode(array_values($appMenu))), // Reset keys of $appAkses menu
                    'column' => [],
                ]) : [
            'parent' => '',
            'title' => $title,
            'current' => $current,
            'icon' => $icon,
            'view' => true,
            'input' => false,
            'edit' => false,
            'delete' => false,
            'param' => Parameter::data(),
            'menu' => json_decode(json_encode($appMenu)),
            'column' => [],
        ];
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
