<?php 
require_once('../model/cliente.php');
$cliente = new Client('1','1',1,'1','1');
$pag = $cliente->totalClientPaginate();
echo ceil($pag['filaTotal']/$pag['filaPagina']);

?>