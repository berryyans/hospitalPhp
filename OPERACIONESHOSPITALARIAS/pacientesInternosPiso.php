<?php 
require("/Constantes.php");
//require("menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

$TITULO='Cargos a  Pacientes';
$ventana=CONSTANT_PATH_SIMA_RAIZ.'/cargos/solicitaArticulos.php';
$ventana1='datosAdicionales.php';
require(CONSTANT_PATH_CONFIGURACION.'/clases/cargosPacientesInternos.php');

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>