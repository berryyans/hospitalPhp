<?php 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/estadoCuentaE.class.abonos.php"); include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?php //include("/configuracion/clases/respaldoCuentaE.class.php"); include("/configuracion/funciones.php"); ?>
<?php
$sSQLC= "Select status From statusCaja where entidad='".$entidad."' and usuario='".$usuario."' order by keySTC DESC ";
$resultC=mysql_db_query($basedatos,$sSQLC);
$myrowC = mysql_fetch_array($resultC);




if($myrowC['status']=='abierta' ){ //*******************Comienzo la validaci�n*****************

$eCuenta=new eCuentasE();
$eCuenta->eCuentaE(FALSE,$usuario,$entidad,$_GET['almacenSolicitante'],$fecha1,$hora1,$dia,$usuario,$_GET['nT'],$basedatos);
} else {
echo 'La caja esta cerrada';
}
?>
