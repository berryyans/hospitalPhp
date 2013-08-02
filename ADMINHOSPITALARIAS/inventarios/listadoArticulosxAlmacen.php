<?PHP 
require("/Constantes.php");
require("/var/www/html/sima/ADMINHOSPITALARIAS/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/listadoArticulosxAlmacen.php'); ?>

<?php
$consultaArticuloxAlmacen=new consultaArticulosPrecioxAlmacen();
$consultaArticuloxAlmacen->consultarArticulosxAlmacen($almacen,$entidad,$basedatos);
?>