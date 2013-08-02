<?php 
require("/Constantes.php");
//require("menuOperaciones.php");
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


require(CONSTANT_PATH_CONFIGURACION.'/clases/traeFV.php');
$tF=new traerFolios();
$tF->foliosDevolucion($entidad,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>

