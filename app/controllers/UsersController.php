<?php

class UsersController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'store') );

        $this->beforeFilter('auth', array('except' =>
        							array('create', 'store') ));

        $this->beforeFilter('admin', array('only' =>
        							 array('index') ));

        $this->beforeFilter('user', array('only' =>
        							array('show','edit','update','destroy', 'products') ));

        $this->beforeFilter('guest', array('on' => 'create') );

    }

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('shop.user.register');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);


		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = new User;
		$user->email = $data['email'];
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->password = Hash::make( $data['password'] );
		$user->password_confirmation = Hash::make( $data['password'] );
		$user->country = $data['country'];
		$user->address = $data['address'];
		$user->save();
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		echo $user;
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

	public function products($id)
	{
		echo User::find($id)->product;
	}

}
