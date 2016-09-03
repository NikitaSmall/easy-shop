@extends('layout')

@section('content')
	<h2>Create user</h2>
	<form method="POST" action="/users/create">
		<input type="text" name="username">
		<input type="password" name="password">

		<input type="submit" value="submit!">
	</form>
@endsection
