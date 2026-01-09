<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Jenis extends Model
	{
		protected $table = 'dta_jenis';

		protected $fillable = [
			'nama_jenis',
			'keterangan_jenis',
			'urutan_jenis',
			'status_jenis',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'urutan_jenis' => 'integer',
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
	}
