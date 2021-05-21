<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
	use HasFactory;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'label',
		'route'
	];
	

	/* + relationships */
	public function role()	{
		return $this->belongsToMany(\App\Models\Role::class, 'role_permissions');
	}
	
	public function roleuser()	{
		return $this->belongsToMany(\App\Models\RoleUser::class, 'role_users');
	}

	/* / relationships */
	



	
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = Str::slug($value, '_');
	}
}
