<?php 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); 
require(CONSTANT_PATH_CONFIGURACION."/clases/despliegaPacientesInternos.php");
require(CONSTANT_PATH_CONFIGURACION."/funciones.php");
$bali=$ALMACEN;
?>
<?php 
$display=new despliegaPacientesInternos();
$ventana=CONSTANT_PATH_SIMA_RAIZ.'/cargos/imprimeSD.php';
$display->displayPI($entidad,$bali,$ventana,$basedatos);
?>