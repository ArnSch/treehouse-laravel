<?php

class SizesTableSeeder extends Seeder {

	public function run()
	{
		$sizes = [
			[
				'size' => 'Small',
				'order' => 10
			],
			[
				'size' => 'Medium',
				'order' => 20
			],
			[
				'size' => 'Large',
				'order' => 30
			],
			[
				'size' => 'X-Large',
				'order' => 40
			]
		];


		foreach ($sizes as $size) {
			Size::create($size);
		}
	}

}