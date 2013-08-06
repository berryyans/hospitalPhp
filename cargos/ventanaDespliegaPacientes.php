<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/clases/desplegarPacientesxHora.php'); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/funciones.php'); ?>
<?php 
$desplegar= new despliegaPx();
$desplegar->pxHora($entidad,$_GET['almacenDestino'],$usuario,$numeroE,$basedatos);

?>