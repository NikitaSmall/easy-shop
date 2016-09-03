<?php

namespace src;

use Klein\Klein;

use src\Controllers\IndexController;
use src\Controllers\UsersController;

class Routes
{
	private $routes;

	public function __construct()
	{
		$this->routes = new Klein();
	}

	public function serve()
	{
		$this->initRoutes();
		$this->routes->dispatch();
	}

	private function initRoutes()
	{
		$this->routes->respond('/public/[*]', function($request, $response) {
		    return $response->file('./' . $request->pathname());
		});

		$this->routes->respond('GET', '/', function () {
			$indexController = new IndexController();
		    return $indexController->index();
		});

		$this->routes->with('/users', function () {
			$usersController = new UsersController();

			$this->routes->respond('GET', '/create', function () use ($usersController) {
				return $usersController->registerForm();
			});

			$this->routes->respond('POST', '/create', function ($request) use ($usersController) {
				return $usersController->createUser($request);
			});

			$this->routes->respond('GET', '/login', function () use ($usersController) {
				return $usersController->loginForm();
			});

			$this->routes->respond('POST', '/login', function ($request) use ($usersController) {
				return $usersController->loginUser($request);
			});
		});
	}
}