<?php //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require('/configuracion/clases/listaServicios.php'); ?>
<?php
$ventana='ventanaAsignaCuarto.php';
$titulo='Asignar un servicio a un cuarto';
$listaServicios=new listaServicios();
$listaServicios->listadoServicios($titulo,$ventana,$entidad,$ALMACEN,$codigo,$basedatos);
?>
<?php
$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
 ?>