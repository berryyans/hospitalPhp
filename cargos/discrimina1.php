<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/discrimina1.php"); ?>

<?php

$cierreCuenta=new eCuentas();
$cierreCuenta->eCuenta($fecha1,$hora1,$dia,$usuario,$_GET['nt'],$basedatos);

?>
