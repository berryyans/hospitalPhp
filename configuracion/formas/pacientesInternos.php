<?php 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/clases/listadoPacientesInternos.php") ?>
<?php 
$muestraPI=new listadoPacientesInternos();
$muestraPI->listadoPI($ALMACEN,$basedatos);
?>