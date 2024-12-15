<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoring;

class Provinsi extends Model {

    use HasFactory;

    protected $table = 'mt_provinsi';

    public function monitoring() {
        return $this->hasMany(TrMonitoring::class, 'provinsi', 'id_provinsi');
    }
}
