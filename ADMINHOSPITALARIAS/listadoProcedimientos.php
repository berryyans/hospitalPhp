<?PHP 
require("/Constantes.php");
require("menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/listadoServicios.php'); ?>
<?php
$listaServicios=new listaServicios();
$listaServicios->listadoServicios($entidad,$ALMACEN,$codigo,$basedatos);
?>