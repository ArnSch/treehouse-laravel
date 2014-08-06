<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ProductUser extends Pivot {

	protected $table = 'product_user';

	/**
	 * Prevents mass-assignement. The variables supplied can't be mass-assigned
	 * @var array
	 */
	protected $guarded  = array('id');

	/**
	 * Marks all selected Transactions as fulfilled
	 * @var $markedTransactions = array
	 * @return redirect
	 */
	public function markFulfilled($markedTransactions) {
		ProductUser::whereIn('id',$markedTransactions)->update(array('fulfilled' => 1));
	}

	public function markUnfulfilled($markedTransactions) {
		ProductUser::whereNotIn('id', $markedTransactions)->update(array('fulfilled' => 0));
	}

	public function product()
	{
		return $this->belongsTo('Product')->select('sku', 'name', 'img_link', 'price', 'paypal_num');
	}

	public function user()
	{
		return $this->belongsTo('User')->select('email', 'country', 'address', 'first_name', 'last_name');
	}
}