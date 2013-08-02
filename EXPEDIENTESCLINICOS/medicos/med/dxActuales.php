<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); 
include(CONSTANT_PATH_CONFIGURACION."/clases/sql.php");
include(CONSTANT_PATH_CONFIGURACION."/clases/diagnosticos.php");?>
<?php
$numeroPaciente=$_GET['numeroE'];
$seguro=$_GET['seguro'];
$keyCAP=$_GET['keyCAP'];
$ruta='/sima/dx/mostrarDiagnosticos.php';
$diagnosticos=new diagnostico();
$diagnosticos->diagnosticos($MEDICO,$entidad,$ruta,$seguro,$numeroPaciente,$keyCAP,$usuario,$hora1,$fecha1,$basedatos);
?>
