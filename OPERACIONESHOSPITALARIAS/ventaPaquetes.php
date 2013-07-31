
<?php //require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


?>
<?php require("../configuracion/clases/mostrarPacientesPaquetes.php"); ?>



<?php

$ventana1='/sima/ventanas/modificarP.php';
$ventana='/sima/ventanas/ventanaAsignarPaquete.php';
$TITULO='Asignar un paquete a un paciente';
$mostrarPacientes=new listaPX();
$mostrarPacientes->mostrarPacientes($ventana1,$ventana,$entidad,$TITULO,$_GET['datawarehouse'],$usuario,$numeroE,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>