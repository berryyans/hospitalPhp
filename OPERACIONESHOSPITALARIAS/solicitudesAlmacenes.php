<?php //require("menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

require("../configuracion/clases/solicitudesAlmacenes.php");


$titulo='Surtir a Pacientes Directamente';
$desplegar=new solicitudesAlmacenes();
$desplegar->despliegaSolicitudes($hora1,$fecha1,$usuario,$entidad,$titulo,$_GET['datawarehouse'],$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>