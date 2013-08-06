<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/ventanaGeneraReq.php"); ?>




<?php 

$compraDirecta=new comprasDirectas(); 
$compraDirecta->compraDirecta($fecha1,$hora1,$_GET['almacen'],$basedatos,$usuario,$entidad);
?>
