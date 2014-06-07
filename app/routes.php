<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@index'
));

Route::resource('users', 'UsersController');

Route::get('/users/{id}/products', array(
	'as' => 'usersProducts',
	'uses' => 'UsersController@products'
));


Route::resource('products', 'ProductsController');

Route::get('/products/{sku}/buy', array(
	'as' => 'buyForm',
	'uses' => 'ProductsController@buy'
));

Route::post('/products/{sku}/buy', array(
	'before' => 'auth',
	'as' => 'buy',
	'uses' => 'ProductsController@buy'
));



Route::get('/login', array(
	'before' => 'guest',
    'as' => 'loginForm',
    'uses' => 'SessionController@login'
));

Route::post('/login', array(
	'before' => 'guest',
    'as' => 'login',
    'uses' => 'SessionController@login'
));

Route::get('/logout', array(
    'as' => 'logoutForm',
    'uses' => 'SessionController@logout'
));

Route::post('/logout', array(
    'as' => 'logout',
    'uses' => 'SessionController@logout'
));

Route::get('/register', array(
	'as' => 'registerForm',
	'uses' => 'UsersController@create'
));

Route::post('/register', array(
	'as' => 'register',
	'uses' => 'UsersController@store'
));



Route::get('/contact', array(
	'as' => 'contactForm',
	'uses' => 'HomeController@email'
));

Route::post('/contact', array(
	'as' => 'contact',
	'uses' => 'HomeController@email'
));




Route::get('/admin/dashboard', array(
	// 'before' => 'admin',
	'as' => 'dashboard',
	'uses' => 'AdminController@dashboard'
));













