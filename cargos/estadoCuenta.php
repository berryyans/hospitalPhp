<?php 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?><?php include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/eCCI.php"); ?>
<?php
$eCuenta=new estadoCuentas();
$eCuenta-> eCCI($usuario,$entidad,$_GET['folioVenta'],$basedatos);
?>