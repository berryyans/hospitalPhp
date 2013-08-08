<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/ADMINHOSPITALARIAS/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/clases/listadoServiciosPrecio.php");?>
<?php 
$consultarArticulos=new consultaArticulosPrecio();
$consultarArticulos->consultarArticulos($ALMACEN,$entidad,$basedatos);
?>
