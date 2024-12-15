<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrMonitoring;

class KabupatenKota extends Model {

    use HasFactory;

    protected $table = 'mt_kabupaten';

    public function monitoring() {
        return $this->hasMany(TrMonitoring::class, 'kabupaten', 'id_kabupaten');
    }
}
