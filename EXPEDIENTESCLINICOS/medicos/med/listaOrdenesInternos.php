<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/expedientesclinicos/medicos/medicosmenu.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/listaCitasMedicos.php"); 
$listadoCitas=new listaCitas();
$listadoCitas->listadoCitas($retorno,$fecha1,$MEDICO,$basedatos);
?>