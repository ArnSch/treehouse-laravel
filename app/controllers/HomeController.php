<?php

class HomeController extends BaseController {

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

	public function index()
	{
		$recent_products = Product::orderBy('created_at','desc')->take(4)->get();


		return View::make('shop.home.homepage', compact('recent_products'));
	}

	public function email()
	{
		if (Request::isMethod('post'))
		{
			$from = Input::get('from');
		    $name = Input::get('name');
		    $subject = Input::get('subject');

		    $view_data = array( 'data' => Input::get('message') );


		    $to = 'arn@ud.tl';
    		$toName = 'Arnaud Schenk';

		     Mail::send('emails.contact', $view_data, function($message) use ($to, $toName, $from, $name, $subject)
			{
			    $message->to($to, $toName);

			    $message->from($from, $name);

			    $message->subject($subject);
			});
		};

		return View::make('shop.contact.form');
	}

};
