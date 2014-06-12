@extends('/shop/layout')

@section('content')
	
	{{ Form::open(array('url' => 'admin/dashboard/edit')) }}
		<p>{{ Form::submit('Submit!') }}</p>
		<table>
			<thead>
				<th>Product SKU</th>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product PayPal Number</th>
				<th>Buyer email</th>
				<th>Buyer Name</th>
				<th>Buyer Address</th>
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
					<td>{{$record->address . ", " . $record->country}}</td>
					<td>{{$record->created_at}}</td>
					<td>{{ Form::checkbox($record->id, true, ($record->fulfilled ? true : false)) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

@stop