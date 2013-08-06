<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");  ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/revisarCuenta.php"); ?>


<?php 
$TITULO='Revisar Cuentas';
$revisarCuenta=new revisionCuentas();
$revisarCuenta->revisarCuenta($ALMACEN,'no',$TITULO,$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['nt'],$basedatos);
?>









