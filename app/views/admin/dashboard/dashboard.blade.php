@extends('/shop/layout')

@section('content')
	<table>
		<thead>
			<th>Product SKU</th>
			<th>Product Image</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product PayPal Number</th>
			<th>Buyer email</th>
			<th>Buyer Name</th>
			<th>Time of Purchase</th>
			<th>Fulfilled</th>
		</thead>
		<tbody>
			@foreach($bought as $record)
			<tr>
				<td>{{$record->sku}}</td>
				<td>{{$record->img_link}}</td>
				<td>{{$record->name}}</td>
				<td>{{$record->price}}</td>
				<td>{{$record->paypal_num}}</td>
				<td>{{$record->email}}</td>
				<td>{{$record->first_name . $record->last_name}}</td>
				<td>{{$record->created_at}}</td>
				<td>{{$record->fulfilled}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop