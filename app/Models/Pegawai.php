<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Golongan;
use App\Models\TrMonitoringPetugas;

class Pegawai extends Model {

    use HasFactory;

    protected $table = 'dta_pegawai';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['nama', 'nip', 'mail', 'jabatan', 'stat', 'created_by', 'updated_by'];

    public function golongan() {
        return $this->belongsTo(Golongan::class, 'jabatan', 'id');
    }

    public function monitoringPetugas() {
        return $this->hasMany(TrMonitoringPetugas::class, 'id_pegawai');
    }
}
