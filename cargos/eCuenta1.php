<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");  ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/cierraCuenta2.php"); ?>


<?php 
$TITULO='ESTADO DE CUENTA';
$cierreCuenta=new eCuentas();
$cierreCuenta->eCuenta($ALMACEN,'no',$TITULO,$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['nt'],$basedatos);
?>









