<?php
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/buscarExpediente.php"); ?><?php include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>



<?php  $buscarExpediente=new expedientes();
$buscarExpediente->buscarExpediente($usuario,$numeroE,$basedatos); ?>

