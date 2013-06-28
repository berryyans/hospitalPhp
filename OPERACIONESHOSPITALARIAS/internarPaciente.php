<?php //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php 
$ventana1='../ventanas/internarPaciente2.php';

require("/configuracion/formas/menuUrgencias.php"); 
$mostrarFooter=new menus();
$mostrarFooter->footerTemplate();
?>
