<?PHP //require("menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

require("../configuracion/clases/listaClientes.php"); ?>
<?php $lista=new listadoClientes();

$TITULO='Convenios Globales';
$ventana='conveniosGlobalesV.php';
$ventana1='despliegaConveniosGlobales.php';
$tipoconvenio='global';
$lista->listaClientes($tipoconvenio,$entidad,$ventana,$ventana1,$TITULO,$basedatos,$tipoconvenio);


$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
