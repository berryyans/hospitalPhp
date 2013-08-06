<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); 
include(CONSTANT_PATH_CONFIGURACION."/clases/listadoArticulosGPOProductoMateriales.php");?>
<?php 
$consultarArticulos=new consultaArticulosPrecio();
$consultarArticulos->consultarArticulos($ALMACEN,$entidad,$basedatos);
?>
