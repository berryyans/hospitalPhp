<?php 
require("/Constantes.php");
//require("menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/listaServicios.php'); ?>
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