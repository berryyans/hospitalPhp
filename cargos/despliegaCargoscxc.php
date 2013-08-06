<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?><?php require(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/eCCIsT.php"); ?>
<?php
$eCuenta=new estadoCuentas();
$eCuenta-> eCCI(FALSE,$usuario,$entidad,$_GET['folioVenta'],$basedatos);
?>