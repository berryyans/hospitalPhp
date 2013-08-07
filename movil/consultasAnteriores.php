<?PHP  
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
include(CONSTANT_PATH_CONFIGURACION."/clases/despliegaConsultasAnterioresMovil.php"); 
include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>

<?php

$despliegaCA=new despliegaCA();
$despliegaCA->consultasAnteriores($ventana,$TITULO,$_POST['numeroE'],$basedatos);
?>