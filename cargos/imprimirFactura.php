<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/imprimeFactura.php"); ?><?php require(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>

<?php 

printInvoice::imprimirFactura($_GET['nT'],$_GET['nCuenta'],$_GET['seguro'],$fecha1,$_GET['numeroE'],$basedatos);
?>