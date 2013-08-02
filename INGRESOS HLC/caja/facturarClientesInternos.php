<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ingresoshlcmenu/caja/menuCaja.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/eCuenta.php"); ?>

<?php
$ventana='/sima/cargos/facturarParticulares.php';
$TITULO='Facturar Px Particular';
$muestraInternos=new muestraInternos();
$muestraInternos->listaInternos($ALMACEN,$entidad,$TITULO,$ventana,$basedatos);
?>
