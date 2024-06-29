<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitemapModel extends Model {

    protected $table = 'dta_berita';

    public static function count_all_posts() {
        return SitemapModel::select('id')->where('status_berita', 't')->count();
    }
    
    public static function get_posts($param) {
        return SitemapModel::select('slug_berita', 'created_at AS tanggal')
                ->where('status_berita', 't')
                ->offset($param)
                ->limit(1000)
                ->get();
    }
}
