<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php');

if($_GET['paquetes']){
require(CONSTANT_PATH_CONFIGURACION."/formas/aplicarPaquete.php"); 
} else if($_GET['cargos']){
require(CONSTANT_PATH_CONFIGURACION."/formas/ventaPublico.php"); 
}
?>