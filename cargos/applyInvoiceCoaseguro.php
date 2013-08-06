<?PHP 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
 include(CONSTANT_PATH_CONFIGURACION."/clases/moduloFacturacionCoaseguro.php");  
 ?>
<?php 

$TITULO='M�dulo de Facturaci�n Coaseguro';
$nCliente= $_GET['nCliente'];
$ventana='';

$facturar=new facturacion();
$facturar->facturaCoaseguro($_GET['tipoFacturacion'],$entidad,$fecha1,$hora1,$dia,$usuario,$_GET['nt'],$basedatos);
?>