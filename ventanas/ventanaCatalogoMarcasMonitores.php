<?php require("../configuracion/ventanasEmergentes.php"); 
//#########CONFIGURACION DE LA TABLA##############
require("../configuracion/funciones.php");
$nombreTabla='sis_marcasm';
$limiteRegistros=0;
$titulo='Catalogo de Monitores';

//DIBUJA TABLA
$catSoftware=new catalogos();    
$catSoftware-> crearTabla($reservado1,$reservado2,$reservado3,$limiteRegistros,$nombreTabla,$webPage,$titulo,$entidad,$basedatos);
//##############################################
?>
