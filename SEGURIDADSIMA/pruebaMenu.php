<?php
require("/Constantes.php");

require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); 
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');
$mostrarmenu=new menus();
$mostrarFooter=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
$estilos=new muestraEstilos();
$estilos->styles();
?>
