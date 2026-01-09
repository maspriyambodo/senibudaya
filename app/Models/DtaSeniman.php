<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DtaSeniman extends Model
{
    use HasFactory;

    protected $table = 'dta_seniman';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat',
        'bidang',
        'karya',
        'lembaga',
        'stat',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'provinsi' => 'integer',
        'kabupaten' => 'integer',
        'kecamatan' => 'integer',
        'kelurahan' => 'integer',
        'stat' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function hasil()
    {
        return $this->hasMany(TrMonitoringHasil::class, 'id_content', 'id');
    }

    public function provinsiRelation()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id_provinsi');
    }

    public function kabupatenRelation()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten', 'id_kabupaten');
    }

    public function kecamatanRelation()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'id_kecamatan');
    }

    public function kelurahanRelation()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'id_kelurahan');
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
