<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');
$mostrarmenu=new menus();
$mostrarmenu->mainmenu($reservado1,$reservado2,$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);
?>