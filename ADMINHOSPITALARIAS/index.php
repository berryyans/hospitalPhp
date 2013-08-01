<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); 
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');
$mostrarmenu=new menus();
$mostrarmenu->menuOperaciones($_GET['main'],$_GET['primario'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);
?>
<?PHP //require("/configuracion/ingresoshlcmenu/menuingresoshlc.php"); ?>
<html>
    <body>
        <IMG  SRC="/sima/imagenes/simalineas.png" ALIGN="CENTER" >
          
    </body>
</html>