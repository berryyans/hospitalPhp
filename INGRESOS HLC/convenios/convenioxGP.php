<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/INGRESOS HLC/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/clases/listaClientes.php"); ?>
<?php $lista=new listadoClientes();
$TITULO='Convenios x Grupo de Producto';
$ventana='convenioxGPV.php';
$ventana1='despliegaGP.php';
$lista->listaClientes('grupoProducto',$entidad,$ventana,$ventana1,$TITULO,$basedatos);
?>
