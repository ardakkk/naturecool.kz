<?php

/**
 * Класс для работы с базой данных
 * Class Db
 */
class Db
{
    /**
     * Возвразщает объект подключения к базе данных
     * @return PDO
     */
    public static function getConnection()
    {
		try {
			$paramsPath = $_SERVER['DOCUMENT_ROOT']."/api/db/db_params.php";
			$params = include($paramsPath);

			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']};";

			$db = new PDO($dsn, $params['user'], $params['password']);

			return $db;
			
		} catch (PDOException $e) {
			echo 'Подключение не удалось: ' . $e->getMessage();
			
			return false;
		}
    }
}