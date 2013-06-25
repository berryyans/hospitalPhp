<?PHP //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

require("/configuracion/clases/listaClientes.php"); ?>
<?php $lista=new listadoClientes();
$TITULO='Convenios x Grupo de Producto';
$ventana='convenioxGPV.php';
$ventana1='despliegaGP.php';
$lista->listaClientes('grupoProducto',$entidad,$ventana,$ventana1,$TITULO,$basedatos);


$mostrarFooter=new menus();
$mostrarFooter->footerTemplate();
?>
