<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoHonorariosMedicosxInterpretacion.php'); ?>
<?php
$catalogoServiciosxInterp=new  catalogos();
$catalogoServiciosxInterp->catalogosServicios($entidad,$almacenSolicitante,$usuario,$fecha1,$basedatos);
?>
