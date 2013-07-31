<?php //require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php");
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

$almacen=$ALMACEN=$_GET['datawarehouse']; ?>
<?php require("../configuracion/clases/expedientessFV.php"); ?>



<?php  

$buscarExpediente=new expedientes();
$buscarExpediente->expedientesDuplicados($ALMACEN,$fecha1,$hora1,$entidad,$usuario,$numeroE,$basedatos); 

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>