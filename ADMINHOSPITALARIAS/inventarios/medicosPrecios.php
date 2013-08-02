<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/clases/medicosPrecios.php'); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/funciones.php'); ?>
<?php
$medicosPrecios=new consultaMedicosPrecios();
$medicosPrecios->consultarPrecios($almacen,$entidad,$basedatos);
?>