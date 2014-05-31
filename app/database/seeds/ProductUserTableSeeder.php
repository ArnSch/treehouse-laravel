<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductUserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$user_low = User::select('id')->orderBy('id','asc')->take(1)->get();
		$user_high = User::select('id')->orderBy('id','dsc')->take(1)->get();

		$user_low = $user_low[0]['id'];
		$user_high = $user_high[0]['id'];

		$product_low = Product::select('sku')->orderBy('sku','asc')->take(1)->get();
		$product_high = Product::select('sku')->orderBy('sku','dsc')->take(1)->get();

		$product_low = $product_low[0]['sku'];
		$product_high = $product_high[0]['sku'];

		foreach(range(1, 10) as $index)
		{
			$user_rand = rand($user_low, $user_high);
			$product_rand = rand($product_low, $product_high);

			DB::table('product_user')->insert([
				'product_id' => $product_rand,
				'user_id' => $user_rand,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			]);
		}
	}

}