<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrMonitoringHasil extends Model
{
    use HasFactory;

    protected $table = 'tr_monitoring_hasil';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_monitoring',
        'id_content',
        'jenis',
        'is_trash',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'id_monitoring' => 'integer',
        'id_content' => 'integer',
        'jenis' => 'integer',
        'is_trash' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function monitoring()
    {
        return $this->belongsTo(TrMonitoring::class, 'id_monitoring', 'id');
    }

    public function content()
    {
        return $this->belongsTo(Content::class, 'id_content');
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
