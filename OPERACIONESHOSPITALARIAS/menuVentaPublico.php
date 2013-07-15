<?php //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php 
//$imagen='ventapublicofarmacia.jpg';
$ALMACEN=$_GET['datawarehouse'];
$ventana1='ventaPublico.php';
$ventana11='/sima/cargos/listadoPacientes.php';
require("/configuracion/formas/ventaPublicoMenu.php");

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>