<?PHP 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION."/administracionhospitalaria/inventarios/inventariosmenu.php"); ?>

<?PHP
$agrega = "INSERT INTO logs (
descripcion,almacenSolicitante,almacenDestino,usuario,hora,fecha,entidad,folioVenta,cuartoIngreso,cuartoTransferido)
values
('ACCESANDO A INVENTARIOS','".$ALMACEN."','".$_POST['almacenDestino']."',
'".$usuario."','".$hora1."','".$fecha1."','".$entidad."','',
'','')";
mysql_db_query($basedatos,$agrega);
echo mysql_error();
 ?>
<style type="text/css">
<!--
body {
	background-image: url(<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/imagenesModulos/inventario1.png);
}
-->
</style>