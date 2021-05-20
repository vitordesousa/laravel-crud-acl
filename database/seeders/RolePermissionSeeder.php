<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
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
			// + admin
			[
				'id'			=>	1,
				'role_id'		=>	1,
				'permission_id'	=>	1,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	2,
				'role_id'		=>	1,
				'permission_id'	=>	2,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	3,
				'role_id'		=>	1,
				'permission_id'	=>	3,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	4,
				'role_id'		=>	1,
				'permission_id'	=>	4,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	5,
				'role_id'		=>	1,
				'permission_id'	=>	5,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	6,
				'role_id'		=>	1,
				'permission_id'	=>	6,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	7,
				'role_id'		=>	1,
				'permission_id'	=>	7,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	8,
				'role_id'		=>	1,
				'permission_id'	=>	8,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	9,
				'role_id'		=>	1,
				'permission_id'	=>	9,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	10,
				'role_id'		=>	1,
				'permission_id'	=>	10,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	11,
				'role_id'		=>	1,
				'permission_id'	=>	11,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	12,
				'role_id'		=>	1,
				'permission_id'	=>	12,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	13,
				'role_id'		=>	1,
				'permission_id'	=>	13,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	14,
				'role_id'		=>	1,
				'permission_id'	=>	14,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	15,
				'role_id'		=>	1,
				'permission_id'	=>	15,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	16,
				'role_id'		=>	1,
				'permission_id'	=>	16,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			// / admin
			
			// + users managment
			[
				'id'			=>	17,
				'role_id'		=>	2,
				'permission_id'	=>	1,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	18,
				'role_id'		=>	2,
				'permission_id'	=>	2,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	19,
				'role_id'		=>	2,
				'permission_id'	=>	3,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	20,
				'role_id'		=>	2,
				'permission_id'	=>	4,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	21,
				'role_id'		=>	2,
				'permission_id'	=>	5,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	22,
				'role_id'		=>	2,
				'permission_id'	=>	6,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	23,
				'role_id'		=>	2,
				'permission_id'	=>	7,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	24,
				'role_id'		=>	2,
				'permission_id'	=>	8,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	25,
				'role_id'		=>	2,
				'permission_id'	=>	9,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	26,
				'role_id'		=>	2,
				'permission_id'	=>	10,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	27,
				'role_id'		=>	2,
				'permission_id'	=>	11,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	28,
				'role_id'		=>	2,
				'permission_id'	=>	12,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			// / users managment
			
			// + CopyWriter			
			[
				'id'			=>	29,
				'role_id'		=>	3,
				'permission_id'	=>	13,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	30,
				'role_id'		=>	3,
				'permission_id'	=>	14,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	31,
				'role_id'		=>	3,
				'permission_id'	=>	17,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			// / CopyWriter
			
			// + Editor
			[
				'id'			=>	32,
				'role_id'		=>	4,
				'permission_id'	=>	13,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	33,
				'role_id'		=>	4,
				'permission_id'	=>	15,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	34,
				'role_id'		=>	4,
				'permission_id'	=>	16,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			// / Editor
			
			// + Reader
			[
				'id'			=>	35,
				'role_id'		=>	5,
				'permission_id'	=>	13,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			[
				'id'			=>	36,
				'role_id'		=>	5,
				'permission_id'	=>	18,
				'created_at'	=>	$now,
			 	'updated_at'	=>	$now
			],
			// / Reader
		];

		RolePermission::insert($data);
	}
}
