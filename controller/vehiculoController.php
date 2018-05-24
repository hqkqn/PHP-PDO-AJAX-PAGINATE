<?php 
	require_once('model/vehiculo.php');
	$vehiculo = new Vehiculo();
	$getMarca = $vehiculo->getCar();
	
?>