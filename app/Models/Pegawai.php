<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model {

    use HasFactory;

    protected $table = 'dta_pegawai';
    protected $fillable = ['nama', 'nip', 'mail', 'jabatan', 'stat', 'created_by', 'updated_by'];
    
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'jabatan', 'id');
    }
}
