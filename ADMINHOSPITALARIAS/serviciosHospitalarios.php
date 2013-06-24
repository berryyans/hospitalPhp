<?PHP 
//require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require('/configuracion/clases/catalogoServiciosHospitalarios.php'); ?>
<?php
$catalogoServiciosxInterp=new  catalogosS();
$catalogoServiciosxInterp->catalogosServicios($entidad,$almacenSolicitante,$usuario,$fecha1,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate();
?>
