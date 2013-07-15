<?PHP //require("menuOperaciones.php"); 
require("/configuracion/ventanasEmergentes.php");
require('/configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

//$estilos= new muestraEstilos();
//$estilos->styles();

if($_GET['warehouse']=='INVENTARIOS'){
require("/configuracion/clases/listadoArticulosPrecio.php");
}elseif($_GET['warehouse']=='SERVICIOS'){
require("/configuracion/clases/listadoServiciosPrecio.php");    
}
?>
<?php 
$consultarArticulos=new consultaArticulosPrecio();
$consultarArticulos->consultarArticulos($ALMACEN,$entidad,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
