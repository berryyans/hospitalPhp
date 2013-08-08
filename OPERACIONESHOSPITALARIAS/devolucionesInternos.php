<?php 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/OPERACIONESHOSPITALARIAS/menuOperaciones.php");
require(CONSTANT_PATH_CONFIGURACION.'/clases/devolucionesPI.php');
$tF=new traerFolios();
$tF->foliosDevolucion($entidad,$basedatos);
?>

