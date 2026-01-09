<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesOurCollection extends Model
{
    use HasFactory;

    protected $table = 'dta_categories_our_collection';

    protected $fillable = [
        'id_sub_category',
        'nama',
        'slug',
        'urutan',
        'icon_path',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'id_sub_category' => 'integer',
        'urutan' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function ourCollections()
    {
        return $this->hasMany(OurCollection::class, 'id_category');
    }

    public function parent()
    {
        return $this->belongsTo(CategoriesOurCollection::class, 'id_sub_category');
    }

    public function children()
    {
        return $this->hasMany(CategoriesOurCollection::class, 'id_sub_category');
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
