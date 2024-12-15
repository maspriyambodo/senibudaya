<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoring;
use App\Models\DtaLembagaSeni;
use App\Models\DtaSeniman;
use App\Models\DtaProgramSeni;

class TrMonitoringHasil extends Model {

    use HasFactory;

    protected $table = 'tr_monitoring_hasil';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_monitoring', 'id_content', 'jenis', 'is_trash', 'created_at',
        'created_by', 'updated_at', 'updated_by'
    ];

    public function monitoring() {
        return $this->belongsTo(TrMonitoring::class, 'id_monitoring');
    }

    public function lembagaSeni() {
        return $this->belongsTo(DtaLembagaSeni::class, 'id_content');
    }

    public function seniman() {
        return $this->belongsTo(DtaSeniman::class, 'id_content');
    }

    public function programSeni() {
        return $this->belongsTo(DtaProgramSeni::class, 'id_content');
    }
}
