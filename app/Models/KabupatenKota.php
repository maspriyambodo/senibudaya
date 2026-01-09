<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;

    protected $table = 'mt_kabupaten';
    protected $primaryKey = 'id_kabupaten';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id_provinsi',
        'nama',
        'stat',
        'latitude',
        'longitude',
        'syscreateuser',
        'sysupdateuser',
        'sysdeleteuser'
    ];

    protected $casts = [
        'id_kabupaten' => 'integer',
        'id_provinsi' => 'integer',
        'stat' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'syscreatedate' => 'datetime',
        'sysupdatedate' => 'datetime',
        'sysdeletedate' => 'datetime'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id_provinsi');
    }

    public function monitoring()
    {
        return $this->hasMany(TrMonitoring::class, 'kabupaten', 'id_kabupaten');
    }

    public function lembagaSeni()
    {
        return $this->hasMany(DtaLembagaSeni::class, 'kabupaten', 'id_kabupaten');
    }

    public function seniman()
    {
        return $this->hasMany(DtaSeniman::class, 'kabupaten', 'id_kabupaten');
    }

    public function ourCollections()
    {
        return $this->hasMany(OurCollection::class, 'kd_kabkota', 'id_kabupaten');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'id_kabupaten', 'id_kabupaten');
    }
}
