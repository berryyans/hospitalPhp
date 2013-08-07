<?php 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php');?>

<?php
include(CONSTANT_PATH_CONFIGURACION."/clases/listadoArticulosPrecioMovil.php");?>
<?php 
$consultarArticulos=new consultaArticulosPrecio();
$consultarArticulos->consultarArticulos($ALMACEN,$entidad,$basedatos);
?>