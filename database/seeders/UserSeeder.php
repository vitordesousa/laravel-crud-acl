<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
				'id'			=>	1,
				'name'			=>	'Admin',
				'email'			=>	'admin@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	2,
				'name'			=>	'Users Managment',
				'email'			=>	'users.managment@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	3,
				'name'			=>	'CopyWriter',
				'email'			=>	'copywriter@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	4,
				'name'			=>	'Editor',
				'email'			=>	'editor@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	5,
				'name'			=>	'Reader',
				'email'			=>	'reader@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	6,
				'name'			=>	'Editor 2',
				'email'			=>	'editor2@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	7,
				'name'			=>	'Editor 3',
				'email'			=>	'editor3@example.com',
				'password'		=>	bcrypt('password'),
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
		];
		
		User::insert($data);
	}
}
