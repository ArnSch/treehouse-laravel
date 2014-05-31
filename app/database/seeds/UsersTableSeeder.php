<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'id' => 0,
			'email' => 'arnaud.schenk@gmail.com',
			'password' => Hash::make('FG5Lk09YXQW%'),
			'country' => 'CH', // Random String for now, should be foreign key referencing countries table.
			'address' => 'Grand-Rue 39, 1095 Lutry',
			'first_name' => 'Arnaud',
			'last_name' => 'Schenk',
			'admin' => 1,
			'created_at' => new DateTime,
			'updated_at' => new DateTime,
			'remember_token' => null
		]);
		
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$user = 
			array(
				'email' => $faker->email,
				'password' => Hash::make($faker->word),
				'country' => 'CH', // Random String for now, should be foreign key referencing countries table.
				'address' => 'Grand-Rue 39, 1095 Lutry',
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'admin' => 0,
				'created_at' => new DateTime,
				'updated_at' => new DateTime,
				'remember_token' => null
			);
			User::create($user);
		}
	}

}