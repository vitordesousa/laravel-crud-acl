<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
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
				'user_id'		=>	3,
				'title'			=>	'Post From Editor 1',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	2,
				'user_id'		=>	3,
				'title'			=>	'Post From Editor 1',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	3,
				'user_id'		=>	3,
				'title'			=>	'Post From Editor 1',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],

			[
				'id'			=>	4,
				'user_id'		=>	6,
				'title'			=>	'Post From Editor 2',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	5,
				'user_id'		=>	6,
				'title'			=>	'Post From Editor 2',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	6,
				'user_id'		=>	6,
				'title'			=>	'Post From Editor 2',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],

			[
				'id'			=>	7,
				'user_id'		=>	7,
				'title'			=>	'Post From Editor 3',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	8,
				'user_id'		=>	7,
				'title'			=>	'Post From Editor 3',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
			[
				'id'			=>	9,
				'user_id'		=>	7,
				'title'			=>	'Post From Editor 3',
				'description'	=>	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat tincidunt magna eu blandit. Sed bibendum enim quam, vitae aliquam arcu congue in. Donec consequat eu nunc ut sollicitudin. Vivamus finibus convallis ullamcorper. Nulla eget eleifend odio, nec finibus velit. Aliquam dictum, ligula quis egestas luctus, ipsum lacus dapibus mauris, nec semper tellus turpis vel elit. Duis tincidunt mollis eros a malesuada. Nullam lobortis ligula non congue mattis. Phasellus eget risus eu augue efficitur varius dignissim a diam. Quisque ultricies erat odio.',
				'created_at'	=>	$now,
			 	'updated_at' 	=>	$now
			],
		];
		
		Post::insert($data);
	}
}
