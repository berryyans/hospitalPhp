<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/clases/catalogoClientes.php"); ?>

<?php

$muestraClientes=new editarClientes();
$muestraClientes->editarC($entidad,$numCliente,$usuario,$ID_EJERCICIOM,$db_conn,$basedatos);
?>