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
		$bought = DB::table('product_user AS pu')
								->join('users AS u', 'u.id', '=', 'pu.user_id')
								->join('products AS p', 'p.sku', '=', 'pu.product_id')
								->select('pu.id','fulfilled', 'pu.created_at', 'email', 'country', 'address', 'first_name', 'last_name', 'sku', 'name', 'img_link', 'price', 'paypal_num')->orderBy('pu.created_at','desc')->get();

		return View::make('admin.dashboard.dashboard', compact('bought'));

	}

	public function markFulfilled()
	{
		foreach ($_POST as $id => $boolean) {
			$transaction = DB::table('product_user')->where('id', $id)->first();

			$notFulfilled[] = $id;

			if($transaction)
			{
				DB::table('product_user')->where('id', $id)->update(array('fulfilled' => 1));
			}
		}
		DB::table('product_user')->whereNotIn('id', $notFulfilled)->update(array('fulfilled' => 0));
		return Redirect::route('dashboard');
	}



}