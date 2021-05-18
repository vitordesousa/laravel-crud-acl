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
		return $this->belongsToMany(\App\Models\Permission::class);
	}
	public function user() {
		return $this->belongsToMany(\App\Models\User::class);
	}
	/* / relationships */
	
}
