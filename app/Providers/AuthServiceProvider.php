<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
		//'App\Models\Post'	=> 	'App\Policies\PostPolicy'
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		$permissions = Permission::with('roles')->get();
		foreach ($permissions as $permission) {
			Gate::define($permission->name, function(User $user) use ( $permission ) {
				return $user->hasPermission($permission);
			});	
		}
	}
}
