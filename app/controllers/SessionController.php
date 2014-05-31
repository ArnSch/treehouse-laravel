<?php

class SessionController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function login()
	{
		if (Request::isMethod('post'))
		{
			// validate the info, create rules for the inputs
			$rules = array(
				'email'    => 'required|email',
				'password' => 'required'
			);

			$validator = Validator::make(Input::all(), $rules);

			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
				return Redirect::to('login')
					->withErrors($validator)
					->withInput(Input::except('password'));
			} else {

				$userdata = array(
					'email' 	=> Input::get('email'),
					'password' 	=> Input::get('password')
				);

				// attempt to do the login
				if (Auth::attempt($userdata)) {

					$users = Auth::user()->id;

					return Redirect::to('users/' . $users);

				} else {

					// validation not successful, send back to form
					return Redirect::to('login')
						->withInput(Input::except('password'));

				}

			}
		};

		return View::make('shop.user.login');
	}

	public function logout()
	{
		if ( Auth::check() ) {
			Auth::logout();
			return Redirect::to('/');
		} else {
			return Redirect::to('login');
		};

	}
}
