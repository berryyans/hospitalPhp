<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php');

require(CONSTANT_PATH_CONFIGURACION."/clases/aplicarDevolucionInternos.php");
require(CONSTANT_PATH_CONFIGURACION."/funciones.php"); 
$cargosCia=new acumulados();
$cargosParticularesCC=new  cierraCuenta();
$cargosAseguradoraCC=new cierraCuenta();


$devInternos=new devE();
$devInternos->devolucionInternos($usuario,$folioVenta,$entidad,$basedatos);
?>
