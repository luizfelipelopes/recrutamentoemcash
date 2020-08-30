<?php 

namespace classes;

/**
 * Connect(): Classe  responsável pela conexão 
 * com o banco de dados (PDO).
 * */
class Connect
{	

	private static $host = HOST;
	private static $db = DB;
	private static $user = USER;
	private static $pass = PASS;
	private static $Connect = null;


	public static function getConnect()
	{

		return self::conectar();		
		
	}


	private static function conectar()
	{

		try {

			if(self::$Connect == null){
				$dsn = "mysql:host=".self::$host.";dbname=".self::$db."";
				self::$Connect = new \PDO ($dsn, self::$user, self::$pass, 
				array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				self::$Connect->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			}
			
		} catch (\PDOException $e) {
			echo $e->getMessage();
			die;
		}

		return self::$Connect;

	}

}


?>