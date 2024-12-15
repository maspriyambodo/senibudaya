<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoringHasil;

class DtaLembagaSeni extends Model {

    use HasFactory;

    protected $table = 'dta_lembaga_seni';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nama', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'alamat', 'fokus',
        'tingkat', 'program', 'stat', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];

    public function hasil() {
        return $this->hasMany(TrMonitoringHasil::class, 'id_content');
    }
}
