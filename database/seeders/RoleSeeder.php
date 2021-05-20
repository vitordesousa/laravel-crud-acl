<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
				'id' => 1,
				'name' => 'Admin',
				'label' => 'System Administrator',
				'created_at' => $now,
			 	'updated_at' => $now
			],
			[
				'id' => 2,
				'name' => 'Users Managment',
				'label' => 'Users Managment',
				'created_at' => $now,
			 	'updated_at' => $now
			],
			[
				'id' => 3,
				'name' => 'CopyWriter',
				'label' => 'Posts CopyWriter',
				'created_at' => $now,
			 	'updated_at' => $now
			],
			[
				'id' => 4,
				'name' => 'Editor',
				'label' => 'Posts Editor',
				'created_at' => $now,
			 	'updated_at' => $now
			],
			[
				'id' => 5,
				'name' => 'Reader',
				'label' => 'Posts Reader',
				'created_at' => $now,
			 	'updated_at' => $now
			]
		];
		
		Role::insert($data);
	}
}
