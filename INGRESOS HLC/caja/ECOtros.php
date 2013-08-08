<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/INGRESOS HLC/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/ECOtros.php");?>
<?php
$EC=new Otros();
$EC->estadoCuenta($fecha1,$entidad,$basedatos);
?>