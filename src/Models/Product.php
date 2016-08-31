<?php

namespace src\Models;

class Product extends Base
{
	public static function all($category = null)
	{
		$conn = parent::instance();

		$stmt = $conn->prepare('SELECT * FROM products');
		$stmt->execute([]);

		return $stmt->fetchAll();
	}
}
