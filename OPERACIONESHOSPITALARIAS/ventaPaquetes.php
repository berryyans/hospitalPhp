
<?php 
require("/Constantes.php");
//require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/mostrarPacientesPaquetes.php"); ?>



<?php

$ventana1=CONSTANT_PATH_SIMA_RAIZ.'/ventanas/modificarP.php';
$ventana=CONSTANT_PATH_SIMA_RAIZ.'/ventanas/ventanaAsignarPaquete.php';
$TITULO='Asignar un paquete a un paciente';
$mostrarPacientes=new listaPX();
$mostrarPacientes->mostrarPacientes($ventana1,$ventana,$entidad,$TITULO,$_GET['datawarehouse'],$usuario,$numeroE,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>