<?php

namespace src\Controllers;

class IndexController extends ApplicationController
{
	public function index()
	{
		return $this->blade->view()->make('hello', ['name' => 'World']);
	}
}