<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model {

    protected $table = 'app_parameter';

    public static function data() {
        $parameter = self::all();
        foreach ($parameter as $data) {
            $appParam[strtolower($data->nama_parameter)] = $data->nilai_parameter;
        }
        return (object) $appParam;
    }
}
