<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/ADMINHOSPITALARIAS/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/clases/listadoServiciosGPOProducto.php");?>
<?php 
$consultarArticulos=new consultaArticulosPrecio();
$consultarArticulos->consultarArticulos($ALMACEN,$entidad,$basedatos);
?>
