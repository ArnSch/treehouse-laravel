<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Prevents mass-assignement. Only the variables supplied can be mass-assigned
	 * @var array
	 */
	protected $fillable  = array('email','country','address','first_name','last_name');

	/**
	 * Ardent validation rules
	 */
	public static $rules = array(
	  'first_name'            => 'required|between:4,16',
	  'last_name'             => 'required|between:4,16',
	  'email'                 => 'required|email',
	  'password'              => 'required|alpha_num|min:8|confirmed',
	  'password_confirmation' => 'required|alpha_num|min:8',
	  'country'               => 'alpha_dash',
	);
	/**
	 * Purge password confirmation
	 */
	public $autoPurgeRedundantAttributes = true;

	public function product()
	{
		return $this->belongsToMany('Product');
	}

}
