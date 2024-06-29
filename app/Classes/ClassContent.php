<?php

namespace App\Classes;

use App\Models\Parameter;
use App\Models\Content;

class ClassContent {

    public static function view($view, $title = '') {
        $sub = array();
        foreach (Content::select('induk_content')->where('status_content', 't')->where('level_content', 3)->groupBy('induk_content')->get() as $data) {
            $sub[] = $data->induk_content;
        }

        $content = Content::where('status_content', 't')->orderBy('induk_content')->orderBy('urutan_content')->get();

        $column = 0;
        foreach ($content as $data) {
            $redirect = $data->redirect_content == 't' ? true : false;
            $hide = $data->hide_content == 't' ? true : false;

            $target = Content::where('induk_content', $data->id)->where('redirect_content', 'f')->orderBy('urutan_content')->pluck('nama_content')->first();
            if (empty($target))
                $target = $data->nama_content;
            $target = $redirect ? strip_tags($data->detail_content) : str_replace("/", "-", str_replace(' ', '-', strtolower($target)));

            if (empty($data->induk_content) || in_array($data->id, $sub)) {
                $top[$data->id] = array(
                    'id' => $data->id,
                    'nama_content' => $data->nama_content,
                    'target_content' => $target,
                    'induk_content' => $data->induk_content,
                    'redirect_content' => $redirect,
                    'hide_content' => $hide,
                    'icon_content' => $data->icon_content,
                    'is_hidden' => $data->is_hidden,
                );

                if (!empty($data->induk_content)) {
                    $child[$data->induk_content][] = array(
                        'id' => $data->id,
                        'nama_content' => $data->nama_content,
                        'target_content' => $target,
                        'induk_content' => $data->induk_content,
                        'redirect_content' => $redirect,
                        'hide_content' => $hide,
                        'icon_content' => $data->icon_content,
                    );
                }
            } else {
                $child[$data->induk_content][] = array(
                    'id' => $data->id,
                    'nama_content' => $data->nama_content,
                    'target_content' => $target,
                    'induk_content' => $data->induk_content,
                    'redirect_content' => $redirect,
                    'hide_content' => $hide,
                    'icon_content' => $data->icon_content,
                );
            }

            if ($data->link_content == 't') {
                $tipe = $data->induk_content > 0 ? 'info' : 'menu';
                $footer[$tipe][] = array(
                    'id' => $data->id,
                    'nama_content' => $data->nama_content,
                    'target_content' => $target,
                    'induk_content' => $data->induk_content,
                    'redirect_content' => $redirect,
                    'hide_content' => $hide,
                    'icon_content' => $data->icon_content,
                );
            }

            $str = explode(' ', empty($data->label_content) ? $data->nama_content : $data->label_content);
            $label = count($str) > 1 ? '<span>' : '<span class="accent-color-2">';
            foreach ($str as $id => $txt) {
                if ($id == ceil(count($str) / 2))
                    $label .= '</span><span class="accent-color-2">';
                $label .= $txt . ' ';
            }
            $label .= '</span>';
            
            $menu[$target] = array(
                'id' => $data->id,
                'parent' => $data->induk_content > 0 ? $top[$data->induk_content]['nama_content'] : '',
                'title' => $data->nama_content,
                'label' => $label,
                'current' => $target,
                'keterangan' => $data->keterangan_content,
                'detail' => $data->detail_content,
                'image' => $data->image_content,
                'kategori' => $data->id_kategori,
            );
        }
        
        foreach ($top as $id => $data) {
            $dta[$id] = $data;
            $count = isset($child[$id]) ? count($child[$id]) : 0;
            if ($count > 0) {
                foreach ($child as $id => $value) {
                    $dta[$id]['detail_content'] = (object) $value;
                }
            }
        }
        ksort($dta);

        $label = '<span>';
        $str = explode(' ', $title);
        foreach ($str as $id => $txt) {
            if ($id == ceil(count($str) / 2))
                $label .= '</span><span class="accent-color-2">';
            $label .= $txt . ' ';
        }
        $label .= '</span>';
        $dtb = array_values($dta);
        
        return isset($menu[$view]) ?
                array_merge($menu[$view], array(
                    'param' => Parameter::data(),
                    'column' => $column,
                    'content' => json_decode(json_encode(isset($dtb) ? $dtb : array())),
                    'footer' => json_decode(json_encode(isset($footer) ? $footer : array())),
                )) :
                array(
            'id' => '0',
            'parent' => '',
            'title' => $title,
            'label' => $label,
            'current' => str_replace(' ', '-', strtolower($title)),
            'keterangan' => '',
            'detail' => '',
            'image' => '',
            'kategori' => '0',
            'param' => Parameter::data(),
            'column' => $column,
            'content' => json_decode(json_encode(isset($dtb) ? $dtb : array())),
            'footer' => json_decode(json_encode(isset($footer) ? $footer : array())),
        );
    }
}
