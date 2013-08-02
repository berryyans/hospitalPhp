<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION.'/clases/catalogoMedicamentoGenerico.php'); ?>
<?php
$catalogoArticulos=new articulos();
$catalogoArticulos->catalogoArticulos($entidad,$usuario,$codigo,$fecha,$basedatos);
?>
