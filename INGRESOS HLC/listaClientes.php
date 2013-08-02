<?PHP 
require("/Constantes.php");
//require("menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

require(CONSTANT_PATH_CONFIGURACION."/clases/listaClientes.php"); 

?>
<?php $lista=new listadoClientes();
$TITULO='Lista [Convenio por Articulos/Servicios Precios Fijos]';
$ventana='agregarArticulos.php';
$ventana1='despliegaConvenios.php';
$lista->listaClientes('cantidad',$entidad,$ventana,$ventana1,$TITULO,$basedatos);


$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>