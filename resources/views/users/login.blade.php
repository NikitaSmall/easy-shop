@extends('layout')

@section('content')
	<h2>Login:</h2>
	<form method="POST" action="/users/login">
		<input type="text" name="username">
		<input type="password" name="password">

		<input type="submit" value="login!">
	</form>
@endsection
