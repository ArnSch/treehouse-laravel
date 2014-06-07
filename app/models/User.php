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
	protected $fillable  = array('admin','email','password','country','address','first_name','last_name','remember_token','password_confirmation');

	/**
	 * Ardent validation rules
	 */
	public static $rules = array(
	  'first_name'            => 'required|between:4,16',
	  'last_name'             => 'required|between:4,16',
	  'email'                 => 'required|email|unique:users',
	  'password'              => 'required|min:8',
	  'password_confirmation' => 'required|min:8',
	  'country'               => 'alpha_dash',
	  'address'               => 'required',
	);
	/**
	 * Purge password confirmation
	 */
	public $autoPurgeRedundantAttributes = true;

	public function product()
	{
		return $this->belongsToMany('Product')->withTimestamps();
	}

	public function isAdmin()
	{
		if ($this->admin == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
	  return $this->getKey();
	}
	 
	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	  return $this->password;
	}
	 
	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
	  return $this->email;
	}
}
