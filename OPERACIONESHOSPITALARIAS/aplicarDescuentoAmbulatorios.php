<<<<<<< HEAD
<?php require("menuOperaciones.php"); ?>
<?php require("/configuracion/clases/listaExternosDescuentos.php"); ?>
=======
<?php //require("menuOperaciones.php"); 
require("../configuracion/ventanasEmergentes.php");
require('../configuracion/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<?php require("../configuracion/clases/listaExternosDescuentos.php"); ?>
>>>>>>> ffca23b146c55951cda977be74fea6569f465f46

<?php
$ventana='../cargos/aplicarDescuentos.php';
$TITULO='Px Ambulatorios';

$listaExternosDescuentos=new muestraExternosDescuentos();
$listaExternosDescuentos->listaExternosDescuentos($ALMACEN,$entidad,$TITULO,$ventana,$basedatos);

$mostrarFooter = new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>