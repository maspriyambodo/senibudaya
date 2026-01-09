<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DtaProgramSeni extends Model
{
    use HasFactory;

    protected $table = 'dta_program_seni';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'frekuensi',
        'tujuan',
        'unsur',
        'waktu',
        'penyelenggara',
        'stat',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'stat' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function hasil()
    {
        return $this->hasMany(TrMonitoringHasil::class, 'id_content', 'id');
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
