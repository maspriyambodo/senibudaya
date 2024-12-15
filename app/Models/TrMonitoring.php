<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoringPetugas;
use App\Models\TrMonitoringHasil;
use App\Models\Provinsi;
use App\Models\KabupatenKota;

class TrMonitoring extends Model {

    use HasFactory;

    protected $table = 'tr_monitoring';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'no_monitoring', 'tgl_monitoring', 'provinsi', 'kabupaten', 'is_trash', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];

    public function petugas() {
        return $this->hasMany(TrMonitoringPetugas::class, 'id_monitoring');
    }

    public function hasil() {
        return $this->hasMany(TrMonitoringHasil::class, 'id_monitoring');
    }

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id_provinsi');
    }

    public function kabupaten() {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten', 'id_kabupaten');
    }
}
