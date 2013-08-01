<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php'); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoMedicamentoPatente.php'); ?>
<?php
$catalogoArticulos=new articulos();
$catalogoArticulos->catalogoArticulos($entidad,$usuario,$codigo,$fecha,$basedatos);
?>
