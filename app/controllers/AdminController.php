<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$bought = ProductUser::with();

		return View::make('admin.dashboard.dashboard', compact('bought'));

	}

	public function markFulfilled()
	{
		foreach ($_POST as $id => $boolean) {
			$markedFulfilled
		}
		DB::table('product_user')->whereNotIn('id', $notFulfilled)->update(array('fulfilled' => 0));
		return Redirect::route('dashboard');
	}



}