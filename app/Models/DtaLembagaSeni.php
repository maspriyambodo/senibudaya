<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoringHasil;
use App\Models\Provinsi;
use App\Models\KabupatenKota;

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
        return $this->hasMany(TrMonitoringHasil::class, 'id_content', 'id');
    }

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id_provinsi');
    }
    
    public function provinsiLihat() {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id_provinsi');
    }

    public function kabupaten() {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten', 'id_kabupaten');
    }
    
    public function kabupatenLihat() {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten', 'id_kabupaten');
    }
}
