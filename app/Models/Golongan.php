<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model {

    use HasFactory;

    protected $table = 'mt_golongan';
    protected $fillable = ['pangkat', 'golongan', 'ruang', 'created_by', 'updated_by', 'stat'];

    public function pegawais() {
        return $this->hasMany(Pegawai::class, 'jabatan', 'id');
    }
}
