<?php 
	require_once("../model/vehiculo.php");
	$vehiculo = new Vehiculo();
	$getLine = $vehiculo->getLine($_POST['valor']);
	echo $getLine;
?>