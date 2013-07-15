<?php //require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


?>
<?php require('/configuracion/clases/articulosSurtidos.php'); ?>
<?php
$aSurtidos=new articulos();
$aSurtidos->surtidos($fecha1,$usuario,$entidad,$_GET['warehouse'],$codigo,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
    
?>

 