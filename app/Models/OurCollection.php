<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCollection extends Model
{
    use HasFactory;

    protected $table = 'dta_our_collections';

    protected $fillable = [
        'id_category',
        'sub_category',
        'nama',
        'slug',
        'body',
        'banner_path',
        'banner_source',
        'pencipta',
        'kd_prov',
        'kd_kabkota',
        'status',
        'status_approval',
        'user_approval',
        'date_approval',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'id_category' => 'integer',
        'sub_category' => 'integer',
        'kd_prov' => 'integer',
        'kd_kabkota' => 'integer',
        'status' => 'integer',
        'status_approval' => 'integer',
        'user_approval' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date_approval' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(CategoriesOurCollection::class, 'id_category');
    }

    public function subCategory()
    {
        return $this->belongsTo(CategoriesOurCollection::class, 'sub_category');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kd_prov', 'id_provinsi');
    }

    public function provinsiRelation()
    {
        return $this->belongsTo(Provinsi::class, 'kd_prov', 'id_provinsi');
    }

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kd_kabkota', 'id_kabupaten');
    }

    public function kabupatenRelation()
    {
        return $this->belongsTo(KabupatenKota::class, 'kd_kabkota', 'id_kabupaten');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'user_approval');
    }
}
