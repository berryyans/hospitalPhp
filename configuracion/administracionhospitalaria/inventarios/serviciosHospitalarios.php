<?PHP include("/configuracion/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>
<?php include('/configuracion/clases/catalogoServiciosHospitalarios.php'); ?>
<?php
$catalogoServiciosxInterp=new  catalogos();
$catalogoServiciosxInterp->catalogosServicios($entidad,$almacenSolicitante,$usuario,$fecha1,$basedatos);
?>