@extends('layouts.master')

@section('content')
	<div class="centered">
		<a href="{{ route('greet') }}">Greet</a>
		<a href="{{ route('hi') }}">Hi</a>
		<a href="{{ route('hello') }}">Hello</a>
	</div>
@endsection