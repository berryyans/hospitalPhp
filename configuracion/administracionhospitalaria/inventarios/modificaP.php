<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>
<?php include(CONSTANT_CONFIGURACION.'/clases/catalogos.php'); ?>
<?php
$catalogoServicios=new catalogos();
$catalogoServicios->catalogosServicios($entidad,$ALMACEN,$usuario,$fecha,$basedatos);

?>