<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'mt_kecamatan';
    protected $primaryKey = 'id_kecamatan';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id_kabupaten',
        'nama',
        'is_trash',
        'latitude',
        'longitude',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'id_kecamatan' => 'integer',
        'id_kabupaten' => 'integer',
        'is_trash' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_kabupaten', 'id_kabupaten');
    }

    public function lembagaSeni()
    {
        return $this->hasMany(DtaLembagaSeni::class, 'kecamatan', 'id_kecamatan');
    }

    public function seniman()
    {
        return $this->hasMany(DtaSeniman::class, 'kecamatan', 'id_kecamatan');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'id_kecamatan', 'id_kecamatan');
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
