<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'mt_provinsi';
    protected $primaryKey = 'id_provinsi';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'nama',
        'stat',
        'latitude',
        'longitude',
        'syscreateuser',
        'sysupdateuser',
        'sysdeleteuser'
    ];

    protected $casts = [
        'id_provinsi' => 'integer',
        'stat' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'syscreatedate' => 'datetime',
        'sysupdatedate' => 'datetime',
        'sysdeletedate' => 'datetime'
    ];

    public function monitoring()
    {
        return $this->hasMany(TrMonitoring::class, 'provinsi', 'id_provinsi');
    }

    public function lembagaSeni()
    {
        return $this->hasMany(DtaLembagaSeni::class, 'provinsi', 'id_provinsi');
    }

    public function seniman()
    {
        return $this->hasMany(DtaSeniman::class, 'provinsi', 'id_provinsi');
    }

    public function ourCollections()
    {
        return $this->hasMany(OurCollection::class, 'kd_prov', 'id_provinsi');
    }

    public function kabupatenKota()
    {
        return $this->hasMany(KabupatenKota::class, 'id_provinsi', 'id_provinsi');
    }
}
