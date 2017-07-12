@extends('layouts.master')

@section('content')
	<form action="" method="post">
		
		<div class="input-group">
			<label for="name">Your name</label>
			<input type="text" name="name" id="name" placeholder="Your name"> </input>
		</div>

		<div class="input-group">
			<label for="password">Your password</label>
			<input type="password" name="password" id="password" placeholder="Your password"> </input>
		</div>

		<button type="submit">Login</button>

	</form>
@endsection



