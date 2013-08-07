<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>


<?php
//#########CONFIGURACION DE LA TABLA##############
require(CONSTANT_PATH_CONFIGURACION."/funciones.php");
$nombreTabla='sis_catTipoPlanCell';
$limiteRegistros=0;
$titulo='Tipos de Plan';

//DIBUJA TABLA
$catSoftware=new catalogos();    
$catSoftware-> crearTabla($reservado1,$reservado2,$reservado3,$limiteRegistros,$nombreTabla,$webPage,$titulo,$entidad,$basedatos);
//##############################################
?>