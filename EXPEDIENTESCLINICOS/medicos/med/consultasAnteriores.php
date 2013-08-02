<?PHP 
require("/Constantes.php");
include(CONSTANT_PATH_CONFIGURACION."/expedientesclinicos/medicos/medicosmenu.php");  
include(CONSTANT_PATH_CONFIGURACION."/clases/despliegaConsultasAnteriores.php"); 
include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>

<?php

$despliegaCA=new despliegaCA();
$despliegaCA->consultasAnteriores($ventana,$TITULO,$_POST['numeroE'],$basedatos);
?>