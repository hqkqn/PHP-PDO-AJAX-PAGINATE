<?php 

require_once("../model/cliente.php");	
	$cliente = new Client('1','1',1,'1','1');
	$pag = $cliente->totalClientPaginate();
	$pagina = isset($_POST['pagina'])?$_POST['pagina']:'1';
	$filasTotal = $pag['filaTotal'];
	$filasPagina = $pag['filaPagina'];
	$empezarDesde = ($pagina - 1) * $filasPagina;
	$getCliente = '';

if(isset($_POST['valor']) != ''):
	//lista todos la lista de clientes
	$getCliente = $cliente->listCliente('',$empezarDesde,$filasPagina);
elseif (isset($_POST['search']) != ''):
	//lista la lista de cliente por busqueda
	$getCliente = $cliente->listCliente($_POST['value'],$empezarDesde,$filasPagina);
endif;
	echo $getCliente;

?>