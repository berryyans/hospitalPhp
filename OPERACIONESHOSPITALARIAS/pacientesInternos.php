<?php //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require("/configuracion/clases/pacientesInternosUrgencias.php") ?>
<?php 
$TITULO='Cargos a  Pacientes';
$ventana='/sima/cargos/solicitaArticulos.php';
$ventana1='../ventanas/datosAdicionales.php';
$muestraPI=new pacientesInternosUrgencias();
$muestraPI->listadoPI($entidad,$TITULO,$ventana,$ventana1,$_GET['datawarehouse'],$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate();
?>