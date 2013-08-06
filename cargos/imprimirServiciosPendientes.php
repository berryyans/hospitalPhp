<?php 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/imprimeServiciosPendientes.php"); ?><?php include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?php
$imprimirServiciosP=new imprimirServicios();
$imprimirServiciosP->imprimirServiciosP($entidad,$fecha1,$hora1,$_GET['numeroE'],$_GET['nCuenta'],$_GET['keyCAP'],$basedatos);
?>