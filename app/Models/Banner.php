<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Banner extends Model
	{
		protected $table = 'dta_banner';

		protected $fillable = [
			'nama_banner',
			'keterangan_banner',
			'image_banner',
			'status_banner',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'status_banner' => 'integer',
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
