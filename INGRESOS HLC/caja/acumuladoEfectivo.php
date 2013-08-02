<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/acumuladoEfectivo.php"); ?>

<?php
$acumula=new acumuladoEfectivo();
$acumula->acumuladosEfectivo($fecha2,$fecha1,$hora1,$entidad,$basedatos);
?>