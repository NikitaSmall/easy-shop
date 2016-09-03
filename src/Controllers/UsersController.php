<?php

namespace src\Controllers;

use src\Models\User;

class UsersController extends ApplicationController
{
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
}