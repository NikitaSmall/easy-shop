<?php

namespace src\Controllers;

use src\Models\User;

class UsersController extends ApplicationController
{
	public function loginForm()
	{
		return $this->blade->view()->make('users.login');
	}

	public function loginUser($request)
	{
		$user = User::find($request->username, $request->password);
		if ($user) {
			$this->setUser($user);
		} else {
			return ['User doesn\'t exist'];
		}

		return true;
	}

	public function registerForm()
	{
		return $this->blade->view()->make('users.create');
	}

	public function createUser($request)
	{
		$res = User::create($request->username, $request->password);
		if (is_array($res)) {
			return $res;
		}

		return true;
	}

	public function logout()
	{
		unset($_SESSION['user']);
		return true;
	}

	private function setUser($user)
	{
		if(!isset($_SESSION['user'])) {
			$_SESSION['user'] = [];
		}

		$_SESSION['user']['id'] = $user->id;
		$_SESSION['user']['name'] = $user->username;
	}
}