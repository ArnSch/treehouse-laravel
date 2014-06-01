@extends('shop/layout')

@section('content')
<div class="section page">

        <div class="wrapper">

            {{ Form::open(array('url' => 'contact')) }}
                 <h1>Contact</h1>

                <p>
                    {{ Form::label('from', 'Email Address') }}
                    {{ Form::email('from', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
                </p>

                <p>
                    {{ Form::label('name', 'Your Name') }}
                    {{ Form::text('name',  'Your Name') }}
                </p>

                <p>
                    {{ Form::label('subject', 'Subject') }}
                    {{ Form::text('subject','Subject') }}
                </p>

                <p>
                    {{ Form::label('message', 'Message') }}
                    {{ Form::textarea('message') }}
                </p>

                <p>{{ Form::submit('Submit!') }}</p>
            {{ Form::close() }}

        </div>

    </div>
@stop