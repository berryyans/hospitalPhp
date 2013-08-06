<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
include(CONSTANT_PATH_CONFIGURACION."/clases/desplegarFacturaParticular.php"); ?>


<?php 

$subCuenta=new subCuentas();
$subCuenta->subCuenta($_GET['ID_EJERCICIO'],$_GET['folioFactura'],$bali,$_GET['tipoCliente'],$TITULO,$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['nT'],$basedatos);
?>
