<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Berita extends Model
	{
		protected $table = 'dta_berita';

		protected $fillable = [
			'id_lama',
			'slug_berita',
			'nama_berita',
			'keterangan_berita',
			'detail_berita',
			'image_berita',
			'status_berita',
			'hits',
			'status_approval',
			'user_approval',
			'date_approval',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'id_lama' => 'integer',
			'hits' => 'integer',
			'status_approval' => 'integer',
			'user_approval' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime',
			'date_approval' => 'datetime'
		];

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
