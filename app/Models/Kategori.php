<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Kategori extends Model
	{
		protected $table = 'dta_kategori';

		protected $fillable = [
			'nama_kategori',
			'keterangan_kategori',
			'status_kategori',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		];

		public function contents()
		{
			return $this->hasMany(Content::class, 'id_kategori');
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
