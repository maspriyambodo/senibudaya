<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Content extends Model
	{
		protected $table = 'dta_content';

		protected $fillable = [
			'id_kategori',
			'induk_content',
			'nama_content',
			'label_content',
			'keterangan_content',
			'detail_content',
			'redirect_content',
			'link_content',
			'hide_content',
			'urutan_content',
			'level_content',
			'icon_content',
			'image_content',
			'status_content',
			'is_hidden',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'id_kategori' => 'integer',
			'induk_content' => 'integer',
			'urutan_content' => 'integer',
			'level_content' => 'integer',
			'is_hidden' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		];

		public function kategori()
		{
			return $this->belongsTo(Kategori::class, 'id_kategori');
		}

		public function fotos()
		{
			return $this->hasMany(Foto::class, 'id_content');
		}

		public function videos()
		{
			return $this->hasMany(Video::class, 'id_content');
		}

		public function parent()
		{
			return $this->belongsTo(Content::class, 'induk_content');
		}

		public function children()
		{
			return $this->hasMany(Content::class, 'induk_content');
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
