<?php 

/**
 * Clase que contiene la informacion del vehiculo
 */
declare(strict_types=1);
require_once('connection.php');
class Vehiculo 
{
	
	public function __construct()
	{
		
	}
	//Funcion para listar las marcas de autos
	public function getCar():string{
		$con = new Connection();
		$sentencia = $con->prepare("SELECT * FROM brand ORDER BY nombre ASC");
		$sentencia->execute();
       	$rows = $sentencia->fetchAll(PDO::FETCH_ASSOC);//devuelve un array 
       	$html = "<select class='form-control' id='select_car' name='marca'>";
       	$html .= "<option value='0'>Marca</option>";
       	//recorremos el arreglo para ordenar el objeto en un select_option
      	foreach ($rows as $key) {
      		$html .= "<option value='{$key['id']}'>{$key['nombre']}</option>";
      	}
      	$html .= "</select>";
      	//retornamos un string con un select-option para los datos del vehiculo
      	return $html;
	}
	//Funcion para listar los modelos de autos de autos
	public function getModel(int $id_car):string{
		$con = new Connection();
		$sentencia = $con->prepare("SELECT * FROM model WHERE id_vehiculo = {$id_car}");

		$sentencia->execute();
		$rows = $sentencia->fetchALL(PDO::FETCH_ASSOC);
		$html = "<select class='form-control' id='select_model' name='modelo'>";
       	$html .= "<option value='0'>Modelo</option>";
       	//recorremos el arreglo para ordenar el objeto en un select_option
      	foreach ($rows as $key) {
      		$html .= "<option value='{$key['id']}'>{$key['nombre']}</option>";
      	}
      	$html .= "</select>";
      	//retornamos un string con un select-option para los datos del vehiculo
      	return $html;
	}

	public function getLine(int $id_model):string{
		$con = new Connection();
		$sentencia = $con->prepare("SELECT * FROM line WHERE id_modelo ={$id_model}");
		$sentencia->execute();
		$rows = $sentencia->fetchALL(PDO::FETCH_ASSOC);
		$html = "<select class='form-control' id='select_line' name='linea'>";
       	$html .= "<option value='0'>Linea</option>";
       	//recorremos el arreglo para ordenar el objeto en un select_option
      	foreach ($rows as $key) {
      		$html .= "<option value='{$key['id']}'>{$key['nombre']}</option>";
      	}
      	$html .= "</select>";
      	//retornamos un string con un select-option para los datos del vehiculo
      	return $html;
	}

}

?>