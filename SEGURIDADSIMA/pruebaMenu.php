<?php
require("/configuracion/ventanasEmergentes.php"); 
require('/configuracion/funciones.php');
$mostrarmenu=new menus();
$mostrarFooter=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);
$mostrarFooter->footerTemplate();
$estilos=new muestraEstilos();
$estilos->styles();
?>
