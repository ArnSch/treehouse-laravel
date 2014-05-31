@extends('shop/home/homepage')

@section('product_card')
	@foreach ( $recent_products as $product)
		<li>
			<a href="/products/{{ $product->sku }}">
		    <img src=" {{{ $product->img_link }}}" alt=" {{ $product->name }} ">
		    <p>View Details</p>
		</a> <!-- Yes, there is a missing closing tag for whitespace reasons, because html is stupid. -->
	@endforeach
@stop