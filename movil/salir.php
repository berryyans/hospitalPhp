<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php'); ?>

<?php 
$destruyeSesion=new validator();
$destruyeSesion->destruyeSesion($usuario,$hora1,$fecha1,$basedatos);
 
 
?>