<?PHP 
require("/Constantes.php");
//require("menuOperaciones.php");
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');
$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

require(CONSTANT_PATH_CONFIGURACION."/clases/solicitudesAlmacenes.php");


$sSQL8a= "
SELECT almacen
FROM
almacenes
WHERE
entidad='".$entidad."'
and
centroDistribucion='si'
";
$result8a=mysql_db_query($basedatos,$sSQL8a);
$myrow8a = mysql_fetch_array($result8a);

if($myrow8a['almacen']){
$titulo='Surtir a Pacientes Directamente';
$solicitudes=new solicitudesAlmacenes();
$solicitudes->despliegaSolicitudes($hora1,$fecha1,$usuario,$entidad,$titulo,$myrow8a['almacen'],$basedatos); 
} else { ?>
<script>
      window.alert("No hay ningun almacen principal definido");
</script>
<?php 
}
$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>