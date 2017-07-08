@extends('layouts.master')

@section('content')
	<div class="centered">
		<a href="{{ route('niceaction',['action'=>'greet']) }}">Greet</a>
		<a href="{{ route('niceaction',['action'=>'hi']) }}">Hi</a>
		<a href="{{ route('niceaction',['action'=>'hello']) }}">Hello</a>
		<br>
		@if (count($errors) > 0)
			<div>
				<ul>
					@foreach($errors->all() as $error)
						{{ $error }}
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ route('formsubmit') }}" method="post">
			<label for="select-action">I want to </label>
			<select name="action" id="select-action">
				<option value="greet">Greet</option>
				<option value="hi">Hi</option> 
				<option value="hello">Hello</option>
			</select>
			<input type="text" name="name">
			<button type="submit"> Great !</button>
			<input type="hidden" value="{{ Session::token() }}" name="_token">
		</form>
	</div>
@endsection