<?php 

/**
 * Clase que contiene la informacion del usuario, tanto de sus datos personales como demas datos de interes
 */
declare(strict_types=1);
require_once('cliente.php');
class Information extends Client
{	
	private $id_cliente;
	private $id_vehiculo;
	private $id_modelo;
	private $id_linea ;
	private $change_time;
	private $new_vehicle;
	private $tax;
	private $financiation;
	
	public function __construct(int $cliente, int $marca,int $modelo,int $linea,string $tiempo_estrenar,string $car_select,int $tax, int $financiacion)
	{
		$this->id_cliente = $cliente;
		$this->id_vehiculo = $marca;
		$this->id_modelo = $modelo;
		$this->id_linea = $linea;
		$this->change_time = $tiempo_estrenar;
		$this->new_vehicle = $car_select;
		$this->financiation = $financiacion;
		$this->tax = $tax;
		$this->addInformation();
	}

	public function addInformation():bool{
		$con = new Connection();
		$sentencia = $con->prepare("
			INSERT INTO 
			information(id_client,id_vehiculo,id_modelo,id_linea,change_time,new_vehicle,tax,financiation) 
			VALUES (:id_cliente,:id_vehiculo,:id_modelo,:id_linea,:change_time,:new_vehicle,:tax,:financiation)");
		$sentencia->bindParam(':id_cliente',$this->id_cliente);
		$sentencia->bindParam(':id_vehiculo',$this->id_vehiculo);
		$sentencia->bindParam(':id_modelo',$this->id_modelo);
		$sentencia->bindParam(':id_linea',$this->id_linea);
		$sentencia->bindParam(':change_time',$this->change_time);
		$sentencia->bindParam(':new_vehicle',$this->new_vehicle);
		$sentencia->bindParam(':tax',$this->tax);
		$sentencia->bindParam(':financiation',$this->financiation);
		$sentencia->execute();
		return true;
	}
}


?>