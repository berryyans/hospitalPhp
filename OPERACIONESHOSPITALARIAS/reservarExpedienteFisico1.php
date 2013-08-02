<?php //require("../OPERACIONESHOSPITALARIAS/menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require("../configuracion/clases/desplegarListaPacientes.php"); ?>


<?php  $despliegaPx=new desplegar();
$despliegaPx->internarPaciente($TITULO,'/sima/cargos/reservarExpedienteFisico2.php',$ventana2,$keyPacientes,$entidad,$hora,$fecha,$_GET['datawarehouse'],$usuario,$numeroE,$basedatos);

$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>
