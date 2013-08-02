<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/modificarMedicos.php");?>
<?php
$modificaMedicos=new modificarMedicos();
$modificaMedicos->modificaMedico($entidad,$_GET['numMedico'],$basedatos);
?>