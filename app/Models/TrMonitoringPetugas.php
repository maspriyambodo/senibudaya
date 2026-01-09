<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrMonitoringPetugas extends Model
{
    use HasFactory;

    protected $table = 'tr_monitoring_petugas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_monitoring',
        'id_pegawai',
        'is_trash',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'id_monitoring' => 'integer',
        'id_pegawai' => 'integer',
        'is_trash' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function monitoring()
    {
        return $this->belongsTo(TrMonitoring::class, 'id_monitoring', 'id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
