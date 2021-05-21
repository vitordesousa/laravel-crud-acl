<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'label'
	];
	
	/* + relationships */
	public function permission() {
		return $this->belongsToMany(Permission::class, 'role_permissions');
	}
	public function user() {
		return $this->belongsToMany(User::class, 'role_users');
	}
	public function rolepermission()	{
		return $this->HasMany(RolePermission::class);
	}
	/* / relationships */
	
}
