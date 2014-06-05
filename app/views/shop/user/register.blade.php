@extends('shop/layout')
@section('content')
	{{ Form::open(array('url' => '/register')) }}
		<h1>Login</h1>

		<!-- if there are registration errors, show them here -->
 		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name') }}
		</p>

		<p>
			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name') }}
		</p>

		<p>
			{{ Form::label('address', 'Your shipping address') }}
			{{ Form::textarea('address') }}
		</p>

		<p>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::email('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>
			{{ Form::label('password_confirmation', 'Password') }}
			{{ Form::password('password_confirmation') }}
		</p>

		<p>
			{{ Form::label('country', 'Country') }}
			{{ Form::text('country') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

@stop