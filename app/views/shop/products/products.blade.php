@extends('shop/layout')

@section('content')
@if(Auth::check())
	@if(Auth::user()->admin == 1)
		@include('admin.products.productsEdit')
		<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		  Launch demo modal
		</button>
	@endif
@endif
<div class="section shirts page">

			<div class="wrapper">

				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>

				{{$products->links();}}

				<ul class="products">
					@foreach ( $products as $product)
                        @include('shop.include.productCard')
                    @endforeach
				</ul>

				{{$products->links();}}

			</div>

		</div>
@stop