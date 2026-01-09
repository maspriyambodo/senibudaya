<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Akses extends Model
	{
		protected $table = 'app_akses';

		protected $fillable = [
			'id_group',
			'id_menu',
			'nama_akses',
			'status_akses',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'id_group' => 'integer',
			'id_menu' => 'integer',
			'status_akses' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		];

		public function group()
		{
			return $this->belongsTo(Group::class, 'id_group');
		}

		public function menu()
		{
			return $this->belongsTo(Menu::class, 'id_menu');
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
