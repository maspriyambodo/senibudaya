<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'mt_kelurahan';
    protected $primaryKey = 'id_kelurahan';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id_kecamatan',
        'nama',
        'is_trash',
        'latitude',
        'longitude',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'id_kelurahan' => 'integer',
        'id_kecamatan' => 'integer',
        'is_trash' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function lembagaSeni()
    {
        return $this->hasMany(DtaLembagaSeni::class, 'kelurahan', 'id_kelurahan');
    }

    public function seniman()
    {
        return $this->hasMany(DtaSeniman::class, 'kelurahan', 'id_kelurahan');
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
