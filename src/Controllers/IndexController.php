<?php

namespace src\Controllers;

use src\Models\Product;

class IndexController extends ApplicationController
{
	public function index()
	{
		$products = Product::all();
		return $this->blade->view()->make('hello', ['products' => $products]);
	}
}