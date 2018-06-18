<?php

	class Database
	{

		private static $host = 'localhost';

		private static $dbname = 'tienda';

		private static $user = 'root';

		private static $password = '';

		public static function startConnection()
		{
			$pdo = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}

	}

?>