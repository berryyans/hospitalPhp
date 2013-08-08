<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/ADMINHOSPITALARIAS/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoHonorariosMedicosxInterpretacion.php'); ?>
<?php
$catalogoServiciosxInterp=new  catalogos();
$catalogoServiciosxInterp->catalogosServicios($entidad,$almacenSolicitante,$usuario,$fecha1,$basedatos);
?>
