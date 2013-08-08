<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_SIMA."/INGRESOS HLC/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/clases/listaClientes.php"); ?>
<?php $lista=new listadoClientes();
$TITULO='Descuentos sobre Convenios';
$ventana='agregarDescuentosConvenios.php';
$ventana1='despliegaDescuentosConvenios.php';
$lista->listaClientes('descuentoConvenio',$entidad,$ventana,$ventana1,$TITULO,$basedatos);
?>
