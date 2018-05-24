<?php 

/**
 * Clase que contiene la informacion del cliente
 */
declare(strict_types=1);
require_once('connection.php');

class Client
{

	private $id;
	private $nombre;
	private $apellido;
	private $telefono;
	private $correo;
	private $genero;
	private $fecha;
	protected $connection;

	public function getId() {
       return $this->id;
    }
	
	public function __construct(string $nombre,string $apellido,int $telefono,string $correo,string $genero)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->telefono = $telefono;
		$this->correo = $correo;
		$this->genero = $genero;
		$this->fecha = date("Y-m-d");
		$this->connection = new Connection();
		//$this->addClient();
	}

	public function addClient(){
		$sentencia = $this->connection->prepare("INSERT INTO client(nombre,apellido,celular,correo,genero,data_create) 
									VALUES (:nombre,:apellido,:telefono,:correo,:genero,:fecha)");
		$sentencia->bindParam(':nombre',$this->nombre);
		$sentencia->bindParam(':apellido',$this->apellido);
		$sentencia->bindParam(':telefono',$this->telefono);
		$sentencia->bindParam(':correo',$this->correo);
		$sentencia->bindParam(':genero',$this->genero);
		$sentencia->bindParam(':fecha',$this->fecha);
		$sentencia->execute();
		$this->id = $con->lastInsertId();
	}

	public function listCliente(string $busqueda, int $desde, int $total):string{
		if(isset($busqueda) && $busqueda!= ''){
			$busqueda = "'%".$busqueda."%'";
			$sentencia = $this->connection->query("SELECT * FROM client WHERE nombre LIKE {$busqueda} OR nombre LIKE {$busqueda} OR apellido LIKE {$busqueda} OR correo LIKE {$busqueda} ORDER BY nombre,apellido,correo ASC LIMIT {$desde},{$total} ");

		}else{
			$sentencia = $this->connection->query("SELECT * FROM client ORDER BY nombre,apellido,correo ASC LIMIT {$desde},{$total}");
		}
		$row = $sentencia->fetchALL(PDO::FETCH_ASSOC);
		
		if(!empty($row)){
			$html = "<table class='table table-striped'>
				    <thead class='thead-dark'>
				      <tr>
				        <th>Nombre</th>
				        <th>Apellido</th>
				        <th>Celular</th>
				        <th>Genero</th>
				        <th>Correo</th>
				      </tr>
				    </thead>";
			$html .= "<tbody>";
		foreach ($row as $key) {
			$html .= 
				"<tr>
					<td>{$key['nombre']}</td>
					<td>{$key['apellido']}</td>
					<td>{$key['celular']}</td>
					<td>{$key['genero']}</td>
					<td>{$key['correo']}</td>
			     </tr>";
		}
		$html .= "</tbody>";
		}else{
			$html = '<h1>No se encontraron datos</h1>';
		}
		# Liberamos los recursos utilizados por $sentencia
		$sentencia=null;
		return $html;

	}

	public function totalClientPaginate():array{
		$sentencia = $this->connection->query("SELECT COUNT(*) FROM client");
		return array(
			'filaTotal' => $sentencia->fetch(PDO::FETCH_BOTH)[0],
			'filaPagina' => '1'
		);
	}

}

?>