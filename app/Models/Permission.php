<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	use HasFactory;



	/* + relationships */
	public function role()	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
	/* / relationships */
	
}
