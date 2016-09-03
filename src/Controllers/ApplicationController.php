<?php

namespace src\Controllers;

use Spatie\Blade\Blade;

use src\Models\User;

class ApplicationController
{
	protected $blade;

	public function __construct()
	{
		$this->blade = new Blade(getenv('VIEWS_DIR'), getenv('CACHE_DIR'));
	}

	public function isAdmin($username)
	{
		return User::isAdmin($username);
	}

	public function redirect($url)
	{
		header('Location: ' . $url);
	}
}