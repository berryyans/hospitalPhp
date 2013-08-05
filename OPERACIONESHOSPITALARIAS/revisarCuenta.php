<?php 
require("/Constantes.php");
//require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php");   
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


?>
<?php //require("../configuracion/clases/eCuenta.php"); ?>

<?php
print 'Site under construction';
//$ventana='/sima/cargos/revisarCuenta.php';
//$TITULO='Revisar Cuenta';
//$muestraInternos=new muestraInternos();
//$muestraInternos->listaInternos($_GET['datawarehouse'],$entidad,$TITULO,$ventana,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
