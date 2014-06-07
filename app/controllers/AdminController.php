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
								->select('fulfilled', 'pu.created_at', 'email', 'country', 'address', 'first_name', 'last_name', 'sku', 'name', 'img_link', 'price', 'paypal_num')->orderBy('pu.created_at','desc')->get();

		return View::make('admin.dashboard.dashboard', compact('bought'));

	}

	public function markFulfilled($sku)
	{

	}



}