<?php

namespace src;

use Klein\Klein;

use src\Controllers\IndexController;

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

		
	}
}