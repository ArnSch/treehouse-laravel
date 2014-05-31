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

Route::resource('products', 'ProductsController');

Route::get('/login', array(
    'as' => 'loginForm',
    'uses' => 'SessionController@login'
));

Route::post('/login', array(
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

Route::get('/contact', array(
	'as' => 'contactForm',
	'uses' => 'HomeController@contact'
	));

Route::post('/contact', array(
	'as' => 'contact',
	'uses' => 'HomeController@contact'
	));

Route::get('/admin/dashboard', array(
	'as' => 'dashboard',
	'uses' => 'AdminController@dashboard'
	));

Route::get('/products/{sku}/buy', array(
	'as' => 'buyForm',
	'uses' => 'ProductsController@buy'
	));

Route::post('/products/{sku}/buy', array(
	'as' => 'buy',
	'uses' => 'ProductsController@buy'
	));

Route::get('/users/{id}/products', array(
	'as' => 'usersProducts',
	'uses' => 'UsersController@products'
	));