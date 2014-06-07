<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class Size extends Ardent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sizes';

	// // Add your validation rules here
	public static $rules = [
		'size'   =>    'required|between:4,16',
		'order'  =>    'required|unique:sizes|digits_between:1,100|integer',
	];

	/**
	 * Prevents mass-assignement. The variables supplied can't be mass-assigned
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * Prevents laravel from freaking out because schema doesn't have created at + upated at.
	 */
	public $timestamps = false;

	public function product()
	{
		return $this-belongsToMany('Product');
	}

}