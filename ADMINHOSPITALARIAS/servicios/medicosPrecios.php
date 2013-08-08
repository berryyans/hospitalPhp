<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/ADMINHOSPITALARIAS/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION.'/clases/medicosPrecios.php'); ?>

<?php
$medicosPrecios=new consultaMedicosPrecios();
$medicosPrecios->consultarPrecios($almacen,$entidad,$basedatos);
?>