<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/internarPaciente.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?php 

if(!$ALMACEN) $ALMACEN=$_GET['almacen'];
$mostrarPaciente=new internar();
$mostrarPaciente->internarPaciente($fecha1,$hora1,$entidad,$_GET['almacen'],$usuario,$NUMEROE,$basedatos);
?>