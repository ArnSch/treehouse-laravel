@extends('shop/layout')

@section('content')
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