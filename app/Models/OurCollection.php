<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCollection extends Model
{
    use HasFactory;

    protected $table = 'dta_our_collections';
    protected $fillable = ['nama', 'pencipta', 'id_category', 'banner_path', 'body', 'kd_prov', 'kd_kabkota', 'status', 'slug', 'status_approval', 'user_approval', 'date_approval', 'created_by'];
}
