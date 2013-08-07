<?php 
require("/Constantes.php");
//require("menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php 
//$imagen='ventapublicofarmacia.jpg';
$ALMACEN=$_GET['datawarehouse'];
$ventana1='ventaPublico.php';
$ventana11=CONSTANT_PATH_SIMA_RAIZ.'/cargos/listadoPacientes.php';
require(CONSTANT_PATH_CONFIGURACION."/formas/ventaPublicoMenu.php");

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>