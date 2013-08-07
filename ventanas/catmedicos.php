<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/modificarMedicos.php");?>
<?php
$modificaMedicos=new modificarMedicos();
$modificaMedicos->modificaMedico($entidad,$_GET['medico'],$basedatos);
?>