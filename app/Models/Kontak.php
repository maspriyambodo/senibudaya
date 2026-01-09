<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Kontak extends Model
	{
		protected $table = 'dta_kontak';

		protected $fillable = [
			'nama_kontak',
			'email_kontak',
			'detail_kontak',
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
	}
