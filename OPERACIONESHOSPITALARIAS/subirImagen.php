<?php //require("menuOperaciones.php");  
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require("/configuracion/clases/editarResultados.php"); ?>
<?php  
$reporteReportes='agregarImagen.php';
$editarResultados=new  editarResultados();
$editarResultados->editaResultados($entidad,$reporteReportes,$fecha1,$ventana,$TITULO,$_GET['datawarehouse'],$basedatos);
$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>