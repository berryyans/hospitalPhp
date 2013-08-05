<?php 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>
<?php 

if($_GET['almacen']=='HCEX'){
include(CONSTANT_PATH_CONFIGURACION."/clases/cargosPaquetes.php"); 
} else {
include(CONSTANT_PATH_CONFIGURACION."/clases/formasCapturaPaquetes.php"); 
$numeroPaciente=$_GET['numeroE'];
$seguro=$_GET['seguro'];
$credencial=$_GET['credencial'];
$medico=$_GET['medico'];
$almacenSolicitante=$_GET['almacen'];
$nCuenta=$_GET['nCuenta'];
$tipoCargo=$_GET['tipoCargo'];
$almacenDestino=$_POST['almacenDestino'];
$tipoPaciente=$_GET['tipoPaciente'];
$banderaCXC=$_GET['banderaCXC'];
 $fechaSolicitud=$_GET['fechaSolicitud'];
 $horaSolicitud=$_GET['horaSolicitud'];
 
$solicitar=new solicitarPaquetes();
$solicitar->solicitaPaquete($entidad,$almacenSolicitante,$ID_EJERCICIOM,$dia,$fecha1,$hora1,$usuario,$numeroPaciente,$seguro,$credencial,$medico,$almacenSolicitante,$nCuenta,$tipoCargo,$almacenDestino,$tipoPaciente,$basedatos);
}
?>