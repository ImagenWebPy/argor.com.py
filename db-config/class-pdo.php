<?php
/**
 * Clase controladora de conexión a base de datos PDO
 */
class db {

	/**
	 * Declare instance
	 */
	private static $instance = NULL;

	/**
	 *
	 * the constructor is set to private so
	 * so nobody can create a new instance using new
	 *
	 */
	private function __construct(){
		/*		 * * maybe set the db name here later ** */
	}

	/**
	 *
	 * Return DB instance or create intitial connection
	 *
	 * @return object (PDO)
	 *
	 * @access public
	 *
	 */
	public static function getInstance(){
		if(!self::$instance){
			self::$instance = self::getNewInstance();
		}
		return self::$instance;
	}
	
	/**
	 * Crea una nueva instancia de PDO
	 * @return \PDO
	 */
	public static function getNewInstance(){
		global $db_host, $db_name, $db_user, $db_pass;
		//$instance = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
		$instance = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$instance->exec("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
		return $instance;
	}

	/**
	 *
	 * Like the constructor, we make __clone private
	 * so nobody can clone the instance
	 *
	 */
	private function __clone(){
		
	}

}
?>