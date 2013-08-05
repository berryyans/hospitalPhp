<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php');

require(CONSTANT_PATH_CONFIGURACION."/clases/aplicarDevolucionExternos.php");
require(CONSTANT_PATH_CONFIGURACION."/funciones.php"); 
$cargosCia=new acumulados();
$cargosParticularesCC=new  cierraCuenta();
$cargosAseguradoraCC=new cierraCuenta();



$devExternos=new devE();
$devExternos->devolucionExternos($usuario,$folioVenta,$entidad,$basedatos);
?>
