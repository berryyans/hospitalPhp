<?PHP //require("menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

require("../configuracion/clases/listaClientes.php"); 

?>
<?php $lista=new listadoClientes();
$TITULO='Lista [Convenio por Articulos/Servicios Precios Fijos]';
$ventana='agregarArticulos.php';
$ventana1='despliegaConvenios.php';
$lista->listaClientes('cantidad',$entidad,$ventana,$ventana1,$TITULO,$basedatos);


$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>