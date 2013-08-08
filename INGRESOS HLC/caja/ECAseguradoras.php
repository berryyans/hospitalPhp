<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/INGRESOS HLC/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/ECAseguradoras.php");?>




<?php
$EC=new ECC();
$EC->estadoCuenta($entidad,$basedatos);
?>