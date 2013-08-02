<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/expedientesclinicos/medicos/medicosmenu.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/buscarExpediente.php"); ?><?php include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>


<?php  $buscarExpediente=new expedientes();
$buscarExpediente->buscarExpediente($entidad,$usuario,$numeroE,$basedatos); ?>
