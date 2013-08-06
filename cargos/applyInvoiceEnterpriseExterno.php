<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
 include(CONSTANT_PATH_CONFIGURACION."/clases/moduloFacturacionEnterprise.php");  
 ?>
<?php 

$TITULO='M�dulo de Facturaci�n';
$nCliente= $_GET['nCliente'];
$ventana='';

$facturar=new facturacion();
$facturar->facturaDirecta($_GET['tipoFacturacion'],$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['nt'],$basedatos);
?>