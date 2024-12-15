<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoring;
use App\Models\Pegawai;

class TrMonitoringPetugas extends Model {

    use HasFactory;

    protected $table = 'tr_monitoring_petugas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_monitoring', 'id_pegawai', 'is_trash', 'created_at', 'created_by',
        'updated_at', 'updated_by'
    ];

    public function monitoring() {
        return $this->belongsTo(TrMonitoring::class, 'id_monitoring');
    }

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
