<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'mt_golongan';

    protected $fillable = [
        'pangkat',
        'golongan',
        'ruang',
        'stat',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'stat' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'jabatan', 'id');
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
