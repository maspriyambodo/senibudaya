<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Menu extends Model
	{
		protected $table = 'app_menu';

		protected $fillable = [
			'induk_menu',
			'nama_menu',
			'keterangan_menu',
			'folder_menu',
			'target_menu',
			'icon_menu',
			'akses_menu',
			'urutan_menu',
			'status_menu',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'induk_menu' => 'integer',
			'akses_menu' => 'integer',
			'urutan_menu' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		];

		public function akses()
		{
			return $this->hasMany(Akses::class, 'id_menu');
		}

		public function parent()
		{
			return $this->belongsTo(Menu::class, 'induk_menu');
		}

		public function children()
		{
			return $this->hasMany(Menu::class, 'induk_menu');
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
