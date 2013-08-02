<?php 
require("/Constantes.php");
//require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require(CONSTANT_PATH_CONFIGURACION."/clases/desplegarListaPacientes.php"); ?>


<?php  $despliegaPx=new desplegar();
$despliegaPx->internarPaciente($TITULO,'/sima/cargos/reservarExpedienteFisico2.php',$ventana2,$keyPacientes,$entidad,$hora,$fecha,$_GET['datawarehouse'],$usuario,$numeroE,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
