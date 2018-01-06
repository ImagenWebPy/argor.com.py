<?php
/**
 * Clase para manejar una Base de Datos MySQL en PHP.
 * Esta clase utiliza el patr�n de dise�o "Singleton".
 *
 * @author Abel Botello <abelini@microplagio.com>
 * @copyright Copyright &copy; 2012, Abel Botello
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link http://www.microplagio.com/articulos/clase-para-manejar-base-de-datos-mysql-en-php/ Clase para manejar una Base de Datos MySQL en PHP
 * @version 1.1
 */

require_once('database.php');
require_once('class-pdo.php');
 
class DataBase {

	/**
	 * @var resource La conexion a la BD
	 */
	private $conexion;
	
	/**
	 * @var resource Para manejo de los resultados
	 */

	/**
	 * @var resource El resultado de cada operacion SQL
	 */
	private $resource;

	/**
	 * @var string La consulta SQL
	 */
	private $sql;

	/**
	 * @var int El numero de consultas a la DB
	 */
	public static $queries;

	/**
	 * @var object La instancia de la BD
	 */
	private static $_singleton;
        
        /**
         * @var string Log de errores
         */
        
        public $error = '';

	/**
	 * Obtiene la instancia de la DB, funciona a modo de constructor.
	 *
	 * @return object La instancia de la DB
	 */
	public static function getInstance(){
		if (is_null(self::$_singleton)) {
			self::$_singleton = new DataBase();
		}
		return self::$_singleton;
	}

	/**
	 * Constructor
	 */
	private function __construct(){
                $conf = new DATABASE_CONFIG();
		$this->conexion = new mysqli($conf->default['host'], $conf->default['login'], $conf->default['password'], $conf->default['database']);
		self::$queries = 0;
		$this->resource = null;
	}

	/**
	 * Ejecuta la sentencia SELECT previamente declarada en setQuery()
	 *
	 * @return resource El resultado de la consulta
	 */
	private function execute(){
                $this->resource = $this->conexion->query($this->sql);
      
		if($this->resource === false){
                        echo $this->conexion->error;
			return false;
		}
                
		self::$queries++;
		return $this->resource;
	}

	/**
	 * Ejecuta la sentencia INSERT, UPDATE, DELETE previamente declarada en setQuery()
	 *
	 * @return boolean True en caso de exito, false caso contrario
	 */
	public function alter(){
		if(!($this->resource = $this->conexion->query($this->sql))){
			return false;
		}
		return true;
	}

	/**
	 * Regresa un arreglo de objetos con los resultados de un SELECT previamente declarado en setQuery(). Difiere de loadObject() porque este m�todo regresa todas las filas de la consulta mientras que aquel solo regresa la primera.
	 *
	 * @return array Resultados de la consulta en forma de objetos en un arreglo
	 */
	public function loadObjectList(){
		if (!($result = $this->execute())){
			return null;
		}														//pendiente
		$array = array();
		while ($row = $result->fetch_object()){
			$array[] = $row;
		}
		return $array;
	}

	/**
	 * Establece la sentencia SQL a ejecutarse.
	 *
	 * @param string $sql La sentencia SQL
	 * @return boolean False en caso de error o cadena vacia. True caso contrario.
	 */
	public function setQuery($sql){
		if(empty($sql)){
                    $this->error = '('.$this->conexion->errno.') '.$this->conexion->error;
			return false;
		}
		$this->sql = $sql;
		return true;
	}
        
	/**
	 * Libera de memoria los resultados de la ultima operacion efectuada
	 */
	public function freeResults(){
		$this->resource->free;
		return true;
	}

	/**
	 * Ejecuta la consulta SELECT previamente declarada en setQuery() y regresa un objeto con el resultado. Como nada mas regresa un objeto, siempre ser� la primera fila del resultado.
	 *
	 * @return mixed Si la consulta arroja un resultado, se regresa un objeto. Regresa null si el resultado no puede convertirse en objeto y false si no hay resultado.
	 */
	public function loadObject(){
		if ($result = $this->execute()){
			if ($object = $result->fetch_object()){
				return $object;
			}
			else {
				return null;
			}
		}
		else {
			return false;
		}
	}

	/**
	 * El numero de consultas SELECT realizadas.
	 *
	 * @return int
	 */
	public function getQueries(){
		return $this->queries;
	}
        
        /**
	 * Retorna el count de la consulta pasada como parametro.
	 *
	 * @return int
	 */
        public function getCount($query){
            if($query):
                $this->setQuery($query);
            
                if (!($result = $this->execute())){
                    return null;
                }else{
                    $arrayResult = $result->fetch_row();
                    return $arrayResult[0];
                }
            endif;
        }

	/**
	 * Destructor. Libera de memoria cualquier recurso SQL existente y cierra la conexion a la BD.
	 */
	function __destruct(){
		//$this->resource->free();
		$this->conexion->close();
	}
}
?>