@extends('shop/layout')

@section('content')
@if(Auth::check())
	@if(Auth::user()->admin == 1)
		<button class="admin-edit">Admin Edit</button>
	@endif
@endif
		<div class="section page">

			<div class="wrapper">

				<div class="breadcrumb">{{ link_to_route('products.index', "Shirts" )}} &gt; <?php echo $product["name"]; ?></div>

				<div class="shirt-picture">
					<span>
						<img src="/{{{ $product->img_link }}}" alt="{{$product->name}}">
					</span>
				</div>

				<div class="shirt-details">

					<h1><span class="price">${{number_format((float)$product->price, 2, '.', '')}}</span> {{$product->name}}</h1>

					<form target="paypal" action="{{$product->sku}}/buy" method="post">
<!-- 						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="item_name" value="<?php echo $product["name"]; ?>">
						<table>
						<tr>
							<th>
								<input type="hidden" name="on0" value="Size">
								<label for="os0">Size</label>
							</th>
							<td>
								<select name="os0" id="os0">
									@foreach( $product->size as $size )
									<option>{{$size->size}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						</table> -->
						<input type="submit" value="Add to Cart" name="submit">
					</form>

					<p class="note-designer">* All shirts are designed by Mike the Frog.</p>
				</div>

			</div>

		</div>
@stop