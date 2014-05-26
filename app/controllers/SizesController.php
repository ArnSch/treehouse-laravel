<?php

class SizesController extends \BaseController {

	/**
	 * Display a listing of sizes
	 *
	 * @return Response
	 */
	public function index()
	{
		$sizes = Size::all();

		return View::make('sizes.index', compact('sizes'));
	}

	/**
	 * Show the form for creating a new size
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sizes.create');
	}

	/**
	 * Store a newly created size in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Size::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Size::create($data);

		return Redirect::route('sizes.index');
	}

	/**
	 * Display the specified size.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$size = Size::findOrFail($id);

		return View::make('sizes.show', compact('size'));
	}

	/**
	 * Show the form for editing the specified size.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$size = Size::find($id);

		return View::make('sizes.edit', compact('size'));
	}

	/**
	 * Update the specified size in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$size = Size::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Size::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$size->update($data);

		return Redirect::route('sizes.index');
	}

	/**
	 * Remove the specified size from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Size::destroy($id);

		return Redirect::route('sizes.index');
	}

}
