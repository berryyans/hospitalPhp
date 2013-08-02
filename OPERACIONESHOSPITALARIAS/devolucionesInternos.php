<?php 
require("/Constantes.php");
require("/var/www/html/sima/OPERACIONESHOSPITALARIAS/menuOperaciones.php");
require(CONSTANT_PATH_CONFIGURACION.'/clases/devolucionesPI.php');
$tF=new traerFolios();
$tF->foliosDevolucion($entidad,$basedatos);
?>

