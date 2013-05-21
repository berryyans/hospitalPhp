<?PHP require("menuOperaciones.php"); ?>
<?php require("/configuracion/clases/ECAseguradoras.php");?>




<?php
$EC=new ECC();
$EC->estadoCuenta($entidad,$basedatos);
?>