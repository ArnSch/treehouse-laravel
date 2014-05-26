<?php

class Product extends \Eloquent {

	protected $primaryKey = 'sku';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}