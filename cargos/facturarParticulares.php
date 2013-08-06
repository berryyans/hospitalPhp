<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");  ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/cierraCuenta4.php"); ?>


<?php 
$tipoFacturacion='particular';
$cierreCuenta=new eCuentas();
$cierreCuenta->eCuenta($tipoFacturacion,$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['nt'],$basedatos);
?>
