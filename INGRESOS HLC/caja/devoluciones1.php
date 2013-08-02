<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ingresoshlcmenu/caja/menuCaja.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/eCuenta.php"); ?>

<?php
$ventana='/sima/INGRESOS%20HLC/caja/liquidarCuenta.php';
$muestraInternos=new muestraInternos();
$muestraInternos->listaInternos($ventana,$basedatos);
?>
