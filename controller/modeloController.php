<?php 
	require_once("../model/vehiculo.php");
	$vehiculo = new Vehiculo();
	$getModelo = $vehiculo->getModel($_POST['valor']);
	echo $getModelo;
?>