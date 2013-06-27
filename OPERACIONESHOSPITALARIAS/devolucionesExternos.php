<?php //require("menuOperaciones.php");
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


require('/configuracion/clases/traeFV.php');
$tF=new traerFolios();
$tF->foliosDevolucion($entidad,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate();
?>

