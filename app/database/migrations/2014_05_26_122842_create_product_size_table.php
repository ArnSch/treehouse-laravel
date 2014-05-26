<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSizeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_size', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->foreign('product_id')->references('sku')->on('products')->onDelete('cascade');
			$table->integer('size_id')->unsigned()->index();
			$table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_size');
	}

}
