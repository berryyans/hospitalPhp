<?php 
require("/Constantes.php");
require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); ?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/historialPx.php"); ?>

<?php
$TITULO='Consultar Historial Paciente';
$historial=new historialPacientesC();
$historial->historialPacientes($entidad,$TITULO,$basedatos);

?>  