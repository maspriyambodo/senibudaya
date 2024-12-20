<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoring;
use App\Models\DtaLembagaSeni;
use App\Models\DtaSeniman;
use App\Models\DtaProgramSeni;

class Provinsi extends Model {

    use HasFactory;

    protected $table = 'mt_provinsi';

    public function monitoring() {
        return $this->hasMany(TrMonitoring::class, 'provinsi', 'id_provinsi');
    }

    public function lembagaSeni() {
        return $this->hasMany(DtaLembagaSeni::class, 'provinsi', 'id_provinsi');
    }

    public function seniman() {
        return $this->hasMany(DtaSeniman::class, 'provinsi', 'id_provinsi');
    }

    public function programSeni() {
        return $this->hasMany(DtaProgramSeni::class, 'kabupaten', 'id_kabupaten');
    }
}
