<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/acumuladoAlmacenes.php"); ?>

<?php
$acumula=new acumuladoAlmacenes();
$acumula->acumuladosAlmacenes($fecha2,$fecha1,$hora1,$entidad,$basedatos);
?>