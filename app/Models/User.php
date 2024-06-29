<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	
	class User extends Authenticatable
	{
		protected $table = 'app_user';
		
		public function getAuthPassword(){
			return $this->password_user;
		}
	}
