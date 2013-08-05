<?php

require('configuracion/funciones.php');
$mostrarmenu = new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'], $_GET['datawarehouse'], $rutasalir, $rutapasswd, $usuario, $entidad, $rutamenuprincipal, 'principal', $rutaimagen, $basedatos);
$estilos=new muestraEstilos();
$estilos->styles();
print "</div>";
$mostrarFooter = new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
/*
  require("/configuracion/MenuPrincipal/header.php");
  <?php require("/configuracion/MenuPrincipal/footer.php"); ?>
 */
?>
