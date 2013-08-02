<?PHP 
require("/Constantes.php");
require("/var/www/html/sima/ADMINHOSPITALARIAS/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoMedicamentoPatente.php'); ?>
<?php
$catalogoArticulos=new articulos();
$catalogoArticulos->catalogoArticulos($entidad,$usuario,$codigo,$fecha,$basedatos);
?>
