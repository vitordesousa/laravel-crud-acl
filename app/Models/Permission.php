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
		'label'
	];
	

	/* + relationships */
	public function role()	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
	
	public function roleuser()	{
		return $this->belongsToMany(\App\Models\RoleUser::class);
	}

	/* / relationships */
	



	
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = Str::slug($value, '_');
	}
}
