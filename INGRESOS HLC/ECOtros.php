<?PHP //require("/var/www/html/sima/INGRESOS HLC/menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require("../configuracion/clases/ECOtros.php");?>
<?php
$EC=new Otros();
$EC->estadoCuenta($fecha1,$entidad,$basedatos);
$mostrarFooter = new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>