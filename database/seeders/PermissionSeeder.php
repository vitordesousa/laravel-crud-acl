<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now 	=	Carbon::now();

		$data = [
			[
				'id' 			=> 1,
				'name' 			=> 'roles_index',
				'label' 		=> 'View All Roles',
				'route'			=> 'Roles',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 2,
				'name' 			=> 'roles_create',
				'label' 		=> 'Create Roles',
				'route'			=> 'Roles',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 3,
				'name' 			=> 'roles_edit',
				'label' 		=> 'Edit Roles',
				'route'			=> 'Roles',
				'created_at'	=> $now,
			 	'updated_at'	=> $now
			],
			[
				'id' 			=> 4,
				'name' 			=> 'roles_delete',
				'label' 		=> 'Delete Roles',
				'route'			=> 'Roles',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			
			[
				'id' 			=> 5,
				'name'			=> 'permissions_index',
				'label' 		=> 'View All Permissions',
				'route'			=> 'Permissions',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 6,
				'name' 			=> 'permissions_create',
				'label' 		=> 'Create Permissions',
				'route'			=> 'Permissions',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 7,
				'name' 			=> 'permissions_edit',
				'label' 		=> 'Edit Permissions',
				'route'			=> 'Permissions',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 8,
				'name' 			=> 'permissions_delete',
				'label' 		=> 'Delete Permissions',
				'route'			=> 'Permissions',
				'created_at'	=> $now,
			 	'updated_at' 	=> $now
			],
			
			[
				'id' 			=> 9,
				'name'			=> 'users_index',
				'label' 		=> 'View All Users',
				'route'			=> 'Users',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 10,
				'name' 			=> 'users_create',
				'label' 		=> 'Create Users',
				'route'			=> 'Users',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 11,
				'name' 			=> 'users_edit',
				'label' 		=> 'Edit Users',
				'route'			=> 'Users',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 12,
				'name' 			=> 'users_delete',
				'label' 		=> 'Delete Users',
				'route'			=> 'Users',
				'created_at'	=> $now,
			 	'updated_at' 	=> $now
			],
			
			[
				'id' 			=> 13,
				'name'			=> 'posts_index',
				'label' 		=> 'View All Posts',
				'route'			=> 'Posts',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 14,
				'name' 			=> 'posts_create',
				'label' 		=> 'Create Posts',
				'route'			=> 'Posts',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 15,
				'name' 			=> 'posts_edit',
				'label' 		=> 'Edit Posts',
				'route'			=> 'Posts',
				'created_at' 	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 16,
				'name' 			=> 'posts_delete',
				'label' 		=> 'Delete Posts',
				'route'			=> 'Posts',
				'created_at'	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 17,
				'name' 			=> 'posts_own_edit',
				'label' 		=> 'Edit Own Posts',
				'route'			=> 'Posts',
				'created_at'	=> $now,
			 	'updated_at' 	=> $now
			],
			[
				'id' 			=> 18,
				'name' 			=> 'posts_show',
				'label' 		=> 'View Posts',
				'route'			=> 'Posts',
				'created_at'	=> $now,
			 	'updated_at' 	=> $now
			],
		];
		
		Permission::insert($data);
	}
}
