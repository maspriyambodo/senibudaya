<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrMonitoring extends Model
{
    use HasFactory;

    protected $table = 'tr_monitoring';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'no_monitoring',
        'tgl_monitoring',
        'provinsi',
        'kabupaten',
        'is_trash',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'provinsi' => 'integer',
        'kabupaten' => 'integer',
        'is_trash' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'tgl_monitoring' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function petugas()
    {
        return $this->hasMany(TrMonitoringPetugas::class, 'id_monitoring', 'id');
    }

    public function hasil()
    {
        return $this->hasMany(TrMonitoringHasil::class, 'id_monitoring', 'id');
    }

    public function provinsiRelation()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id_provinsi');
    }

    public function kabupatenRelation()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten', 'id_kabupaten');
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
