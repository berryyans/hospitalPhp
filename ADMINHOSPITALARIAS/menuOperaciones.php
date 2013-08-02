<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); 
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');
$mostrarmenu=new menus();
$mostrarmenu->menuOperacionesF($_GET['warehouse'],$res,$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>