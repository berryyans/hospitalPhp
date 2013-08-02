<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoAlimentosMiscelaneos.php'); ?>
<?php
$catalogoArticulos=new catalogos();
$catalogoArticulos->catalogoArticulos($entidad,$usuario,$codigo,$fecha,$basedatos);
?>
















