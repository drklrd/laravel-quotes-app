@extends('layouts.master')

@section('content')
	<div class="centered">
		<h1>GREETINGS, {{$name === null ? 'you' : $name}} !</h1>
	</div>
@endsection