<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
<<<<<<< HEAD
	use HasFactory;



	/* + relationships */
	public function roles()	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
	/* / relationships */
	
=======
    use HasFactory;
>>>>>>> 29c145a1308fb919ceb71651f28040471c4b822f
}
