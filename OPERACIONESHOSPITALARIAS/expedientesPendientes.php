<?php //require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);


?>
<?php require("../configuracion/clases/despliegaExpedientesPendientes.php"); ?>


<?php
$ventana='';

$despliegaExpedientes=new despliegaExpedientesPendientes();
$despliegaExpedientes->despliegaExpedientes($entidad,$ventana,$fecha1,$hora1,$ALMACEN,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
