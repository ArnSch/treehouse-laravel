<?php

class ProductsController extends \BaseController {

	function __construct() {
        $this->beforeFilter('admin', array('except' => array('index', 'show', 'buy')));
    }

	/**
	 * Display a listing of products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::paginate(8);


		return View::make('shop.products.products', compact('products'));
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Product::create($data);

		return Redirect::route('products.index');
	}

	/**
	 * Display the specified product.
	 *
	 * @param  int  $sku
	 * @return Response
	 */
	public function show($sku)
	{
		$product = Product::with('size')->findOrFail($sku);

		return View::make('shop.products.product', compact('product'));
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $sku
	 * @return Response
	 */
	public function edit($sku)
	{
		$product = Product::find($sku);

		return View::make('products.edit', compact('product'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $sku
	 * @return Response
	 */
	public function update($sku)
	{
		$product = Product::findOrFail($sku);

		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('products.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $sku
	 * @return Response
	 */
	public function destroy($sku)
	{
		Product::destroy($sku);

		return Redirect::route('products.index');
	}

}
