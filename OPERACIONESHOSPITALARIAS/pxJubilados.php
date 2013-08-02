<?php //require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require("../configuracion/clases/pacientesJubilados.php"); ?>

<?php 
$ventana='ventanitaCambiaPorcentaje.php';
$pxJubilados=new jubilados();
$pxJubilados->pacientesJubilados($ventana,$entidad,$usuario,$numeroE,$basedatos);

$mostrarFooter = new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>

