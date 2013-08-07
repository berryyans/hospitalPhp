<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?><?PHP include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?PHP include(CONSTANT_PATH_CONFIGURACION."/clases/sql.php");include(CONSTANT_PATH_CONFIGURACION."/clases/mostrarImagenRX.php");?>
<?php
$numeroPaciente=$_GET['numeroE'];
$seguro=$_GET['seguro'];
$keyCAP=$_GET['keyCAP'];
$ruta='/sima/dx/mostrarDiagnosticos.php';
$DXRX=new DXRX();
$DXRX->diagnosticosRX($_GET['numeroE'],$_GET['nCuenta'],$ruta,$seguro,$numeroPaciente,$keyCAP,$usuario,$hora1,$fecha1,$basedatos);
?>
