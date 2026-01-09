<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'dta_pegawai';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'nip',
        'mail',
        'jabatan',
        'stat',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'jabatan' => 'integer',
        'stat' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'jabatan', 'id');
    }

    public function monitoringPetugas()
    {
        return $this->hasMany(TrMonitoringPetugas::class, 'id_pegawai');
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
