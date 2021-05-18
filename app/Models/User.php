<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];


	public function hasPermission($permission){
		return $this->hasAnyRoles($permission->role);
	}

	public function hasAnyRoles($roles){
		if( is_array($roles) || is_object($roles)){
			return !! $roles->intersect($this->role)->count();
		} else {
			return $this->role->contains('name', $roles);
		}
	}


	

	/* + relationships */
	public function role()	{
		return $this->belongsToMany(\App\Models\Role::class);
	}

	public function userrole()	{
		return $this->HasMany(\App\Models\RoleUser::class);
	}

	/* / relationships */

}
