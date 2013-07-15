<?php //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

$TITULO='Cargos a  Pacientes';
$ventana='/sima/cargos/solicitaArticulos.php';
$ventana1='datosAdicionales.php';
require('/configuracion/clases/cargosPacientesInternos.php');

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>