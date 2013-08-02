<?php 
require("/Constantes.php");
//require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/despliegaExpedientesPendientes.php"); ?>


<?php
$ventana='';

$despliegaExpedientes=new despliegaExpedientesPendientes();
$despliegaExpedientes->despliegaExpedientes($entidad,$ventana,$fecha1,$hora1,$ALMACEN,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
