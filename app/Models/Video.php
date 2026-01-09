<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Video extends Model
	{
		protected $table = 'dta_video';

		protected $fillable = [
			'id_content',
			'nama_video',
			'keterangan_video',
			'url_video',
			'status_video',
			'status_approval',
			'user_approval',
			'date_approval',
			'created_by',
			'updated_by'
		];

		protected $casts = [
			'id_content' => 'integer',
			'status_approval' => 'integer',
			'user_approval' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime',
			'date_approval' => 'datetime'
		];

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

		public function approvedBy()
		{
			return $this->belongsTo(User::class, 'user_approval');
		}
	}
