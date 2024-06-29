<?php

namespace App\Http\Controllers;

use App\Models\SitemapModel;
use App\Classes\ClassContent;
use Illuminate\Http\Request;

class SitemapController extends Controller {

    public function index() {
        $total_berita = SitemapModel::count_all_posts();
        $posts_per_page = (int) round($total_berita / 1000, 0, PHP_ROUND_HALF_ODD);
        $data = [
            'posts_per_page' => ($posts_per_page + 1)
        ];
        return response()->view('sitemap', $data)->header('Content-Type', 'text/xml');
    }

    public function page() {
        $content = ClassContent::view('home');
        $menu = $icon = array();
        foreach ($content['content'] as $c) {
            $menu[$c->induk_content][] = $c;
            if (!empty($c->icon_content)) {
                $icon[$c->id] = $c;
            }

            if (isset($c->detail_content)) {
                foreach ($c->detail_content as $d) {
                    $menu[$d->induk_content][] = $d;
                    if (!empty($d->icon_content)) {
                        $icon[$d->id] = $d;
                    }
                }
            }
        }
        $menu1 = [];
        $menu2 = [];
        $menu3 = [];
        foreach ($menu[0] as $m) {
            if (isset($m->detail_content)) {
                foreach ($m->detail_content as $d) {
                    if (isset($menu[$d->id]) && !$d->hide_content) {
                        foreach ($menu[$d->id] as $l) {
                            if ($l->redirect_content <> 't') {
                                $menu2[] = $l->target_content;
                            }
                        }
                    } else {
                        if ($d->redirect_content != 't') {
                            $menu3[] = $d->target_content;
                        }
                    }
                }
            } else {
                $menu1[] = $m->target_content;
            }
        }
        $dt_menu = array_merge($menu1, $menu2, $menu3);
        return response()->view('page-sitemap', ['menu' => $dt_menu])->header('Content-Type', 'text/xml');
    }

    public function posts(Request $request) {
        $page_id = (int) preg_replace("/[^0-9]/", '', $request->id);
        $limit_posts_id = (int) ($page_id * 1000);
        $offset_posts_id = (int) ($limit_posts_id - 1000);
        $dt_berita = SitemapModel::get_posts($offset_posts_id);
        
//        print_r($offset_posts_id . ',' . 1000); query limit
        $data = [
            'url_berita' => $dt_berita
        ];
        return response()->view('sitemap_posts', $data)->header('Content-Type', 'text/xml');
    }
}
