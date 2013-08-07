<?PHP 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/catalogos.php'); ?>
<?php
$catalogoArticulos=new catalogosOtros();
$catalogoArticulos->catalogoArticulos($entidad,$usuario,$codigo,$fecha,$basedatos);
?>
















