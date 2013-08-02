<?PHP 
require("/Constantes.php");
require("/var/www/html/sima/ADMINHOSPITALARIAS/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoHonorariosMedicos.php'); ?>
<?php
$catalogoServiciosxInterp=new  catalogos();
$catalogoServiciosxInterp->catalogosServicios($entidad,$almacenSolicitante,$usuario,$fecha1,$basedatos);
?>