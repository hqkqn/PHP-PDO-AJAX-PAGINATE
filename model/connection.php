<?php 
/**
 * Clase que se encarga de la conexion con la base de datos
 */
class Connection extends PDO
{

	private $host;
	private $db_name;
	private $user;
	private $pass;
	
	public function __construct()
	{
		$this->host = 'localhost';
		$this->db_name = 'trucks_info';
		$this->user = 'root';
		$this->passowrd = '';
		
		try{
			//Sobreescribo el método constructor de la clase PDO.
			parent::__construct("mysql:host={$this->host};dbname={$this->db_name}",$this->user,$this->pass);
			parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  // errores de las excepciones de PDO
			parent::exec("SET CHARACTER SET UTF8");
		}catch(PDOexcepcion $e){
			die('ERROR: '.$e->getMessage());
		}
	}
}

?>