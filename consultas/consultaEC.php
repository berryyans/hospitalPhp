<?php
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");include(CONSTANT_PATH_CONFIGURACION."/clases/cierraCuenta2.php");  ?>
<?php 
$consultar=new eCuentas();
$consultar->eCuenta($bali,$transacciones,$TITULO,$entidad,$fecha1,$hora1,$dia,$usuario,$nT,$basedatos);
?>