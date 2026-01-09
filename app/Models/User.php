<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Foundation\Auth\User as Authenticatable;

	class User extends Authenticatable
	{
		protected $table = 'app_user';

		protected $fillable = [
			'id_android',
			'id_token',
			'id_random',
			'id_fcm',
			'id_imei',
			'id_group',
			'id_user',
			'password_user',
			'nama_user',
			'email_user',
			'phone',
			'foto_user',
			'status_user',
			'login_user',
			'created_by',
			'updated_by'
		];

		protected $hidden = [
			'password_user',
			'id_token',
			'id_fcm'
		];

		protected $casts = [
			'status_user' => 'integer',
			'id_group' => 'integer',
			'created_at' => 'datetime',
			'updated_at' => 'datetime',
			'login_user' => 'datetime'
		];

		public function getAuthIdentifierName()
		{
			return 'id_user';
		}

		public function getAuthPassword()
		{
			return $this->password_user;
		}

		public function group()
		{
			return $this->belongsTo(Group::class, 'id_group');
		}

		public function akses()
		{
			return $this->hasMany(Akses::class, 'id_group', 'id_group');
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
