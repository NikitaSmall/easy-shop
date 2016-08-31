<?php

namespace src\Models;

use PDO;

class Base
{
	protected static $connection;

	public static function instance()
	{
		if (is_null(self::$connection)) {
			self::$connection = self::connect();
		}

		return self::$connection;
	}

	protected static function connect()
	{
		$connection = new PDO(getenv('DB_ADAPTER') . ':host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'));
		$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		return $connection; 
	}
}