<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class Product extends Ardent {

	/**
	 * Overwrites default primary key. Laravel will breakdown and cry otherwise.
	 */
	protected $primaryKey = 'sku';

	// Add your validation rules here
	public static $rules = [
		'name'       =>    'required|between:4,64',
		'img_link'   =>    'required|url',
		'price'      =>    'required|numeric',
		'paypal_num' =>    'required|alphaNum'
	];

	// Don't forget to fill this array
	protected $fillable = ['name','img_link','price','paypal_num'];

	public function size()
	{
		return $this->belongsToMany('Size');
	}

	public function user()
	{
		return $this->belongsToMany('user');
	}

}