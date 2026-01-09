<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Group extends Model
	{
		protected $table = 'app_group';

		protected $fillable = [
			'nama_group',
			'keterangan_group',
			'status_group',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'status_group' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		];

		public function users()
		{
			return $this->hasMany(User::class, 'id_group');
		}

		public function akses()
		{
			return $this->hasMany(Akses::class, 'id_group');
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
