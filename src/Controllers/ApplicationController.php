<?php

namespace src\Controllers;

use Spatie\Blade\Blade;

class ApplicationController
{
	protected $blade;

	public function __construct()
	{
		$this->blade = new Blade(getenv('VIEWS_DIR'), getenv('CACHE_DIR'));
	}
}