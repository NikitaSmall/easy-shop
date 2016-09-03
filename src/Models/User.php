<?php

namespace src\Models;

class User extends Base
{
	public static function getByName($username)
	{
		$conn = parent::instance();
		$stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
		$stmt->execute([$username]);

		return $stmt->fetch();
	}

	public static function isExist($username)
	{
		return self::getByName($username);
	}

	public static function create($username, $password, $isAdmin = false)
	{
		$conn = parent::instance();

		if(self::isExist($username)) {
			return ['User is already created.'];
		}

		$stmt = $conn->prepare('INSERT INTO users (username, password, is_admin) VALUES (?, ?, ?)');
		$stmt->execute([$username, md5($password), $isAdmin]);

		return true;
	}
}