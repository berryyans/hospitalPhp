<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/clases/catalogos.php'); ?>
<?php
$catalogoArticulos=new catalogos();
$catalogoArticulos->catalogoArticulos($entidad,$usuario,$codigo,$fecha,$basedatos);
?>
















