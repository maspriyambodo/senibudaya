<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'app_parameter';

    protected $fillable = [
        'nama_parameter',
        'nilai_parameter',
        'status_parameter',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public static function data()
    {
        $parameter = self::all();
        foreach ($parameter as $data) {
            $appParam[strtolower($data->nama_parameter)] = $data->nilai_parameter;
        }
        return (object) $appParam;
    }
}
