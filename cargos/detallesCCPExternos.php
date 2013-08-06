<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ingresoshlcmenu/cxc/menuCXC.php"); 
include(CONSTANT_PATH_CONFIGURACION."/clases/cierraCuenta5.php"); ?>


<?php 
$tipoFacturacion='aseguradora';
$cierreCuenta=new eCuentas();
$cierreCuenta->eCuenta($tipoFacturacion,$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['folioVenta'],$basedatos);
?>
