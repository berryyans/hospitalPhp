<?php require("/configuracion/ventanasEmergentes.php"); ?>
<style type="text/css">
<!--
body {
	background-image: url(/sima/imagenes/imagenesModulos/laboratorio2.png);
	background-attachment:fixed;
	background-repeat:no-repeat;
	background-position:center top;
}
-->
</style>

<?php 
$ALMACEN='HLAB';
$raiz='OPERACIONES';
$secundario='LABORATORIO';
$checaModuloScript= "Select usuario From ModulosUsuarios1 WHERE 
raiz = '".$raiz."'
and
secundario='".$secundario."'
and
usuario = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if(!$resulScripModulo['usuario']){
exit;
}
?>
<HTML>
<head>
<title></title>
<script type="text/javascript"  src="/sima/js/new/stmenu.js"></script>
<script type="text/javascript">
<!--
window.onerror=function(m,u,l)
{
	window.status = "Java Script Error: "+m;
	return true;
}
//-->
</script>
<style type="text/css">
<!--
.Estilo1 {color: #E27907}
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="5" topmargin="5">


<center>
<a href="http://www.dhtml-menu-builder.com"  style="display:none;visibility:hidden;">Javascript DHTML Drop Down Menu Powered by dhtml-menu-builder.com</a>
<script type="text/javascript">
<!--
stm_bm(["menu3ba5",900,"","/sima/imagenes/blank.gif",0,"","",1,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,5,0,0,100,"",-2,"",-2,50,0,0,"#999999","#E6EFF9","/sima/imagenes/bg_02.gif",3,0,0,"#000000","",-1,-1,0,"#FFFFF7","",3,"/sima/imagenes/bg_03.gif",37,3,0,"#FFFFF7","",3,"",-1,-1,0,"#FFFFF7","",3,"/sima/imagenes/bg_01.gif",37,3,0,"#FFFFF7","",3,"","","","",20,20,20,20,20,20,20,20]);
stm_ai("p0i0",[0,"Ir Atras","","",-1,-1,0,"javascript:history.go(-1)","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#E6EFF9",1,"","",3,3,0,0,"#E6EFF9","#000000","#FFFF34","#FFFFFF","bold 9pt Verdana","bold 9pt Verdana",0,0,"","","","",0,0,0],150,33);

<!------------INICIO CATALOGOS----------------------
<?php 
$codModulo='LABORATORIO';
$codSM='ICSLAB';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p0i1","p0i0",[0,"Catalogo","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#E6EFF9",1,"","/sima/imagenes/4545454.gif",3,0,0,0,"#E6EFF9","#000000","#FFFFFF","#FFFF34","bold 8pt Verdana","bold 8pt Verdana"],100,33);
stm_bp("p1",[1,4,-20,2,0,5,0,0,100,"",-2,"",-2,50,2,3,"#333333","#333333","",3,1,1,"#000000"]);


<?php 
$codModulo='LABORATORIO';
$codSM='CSLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Servicios","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/modificaP.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);

<?php } ?>

<?php 
$codModulo='LABORATORIO';
$codSM='RelEstRepMant';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Relacion Estudio-Reportes","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/Reportes/RelArticReportRut.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);


<?php } ?>


<?php 
$codModulo='LABORATORIO';
$codSM='CatRepMant';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Catalogo de Reportes","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/Reportes/catalogoReportes.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);
<?php } ?>




<?php 
$codModulo='LABORATORIO';
$codSM='CatMatLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>

<?php } ?>

stm_ep();
<?php } ?>


//---------------FIN ESTUDIOS------------------>





















<!------------INICIO TRANSACCIONES----------------------
<?php 
$codModulo='LABORATORIO';
$codSM='ISolidLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p0i1","p0i0",[0,"Transacciones","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#E6EFF9",1,"","/sima/imagenes/4545454.gif",3,0,0,0,"#E6EFF9","#000000","#FFFFFF","#FFFF34","bold 8pt Verdana","bold 8pt Verdana"],100,33);
stm_bp("p1",[1,4,-20,2,0,5,0,0,100,"",-2,"",-2,50,2,3,"#333333","#333333","",3,1,1,"#000000"]);


stm_aix("p1i0","p0i1",[0,"Procesar Ordenes","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/autorizarOrdenes.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);



<?php 
$codModulo='LABORATORIO';
$codSM='ListOrdSol';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Solicitudes por Surtir","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/listapacientes.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);
stm_aix("p1i0","p0i1",[0,"Reposicion x Venta","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/salidaInventarios.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);
<?php } ?>

<?php 
$codModulo='LABORATORIO';
$codSM='PAmbLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Venta al Publico","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/cargosAmbulatorios.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);
<?php } ?>






<?php 
$codModulo='LABORATORIO';
$codSM='TransSReq';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Solicitud de Req.","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/solicitaReq.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);
<?php } ?>



stm_aix("p1i0","p0i1",[0,"Almacen de Consumo","","",-1,-1,0,"almacenConsumo.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);
stm_ep();
<?php } ?>
//---------------FIN TRANSACCIONES------------------>











<!------------REPORTES----------------------
<?php 
$codModulo='LABORATORIO';
$codSM='IModRepLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p0i1","p0i0",[0,"Reportes","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#E6EFF9",1,"","/sima/imagenes/4545454.gif",3,0,0,0,"#E6EFF9","#000000","#FFFFFF","#FFFF34","bold 8pt Verdana","bold 8pt Verdana"],100,33);
stm_bp("p1",[1,4,-20,2,0,5,0,0,100,"",-2,"",-2,50,2,3,"#333333","#333333","",3,1,1,"#000000"]);


stm_aix("p1i0","p0i1",[0,"Reposicion x Venta","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/rVenta.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);


<?php 
$codModulo='LABORATORIO';
$codSM='RepMatLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>

<?php } ?>


<?php 
$codModulo='LABORATORIO';
$codSM='RepServLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>

<?php } ?>


<?php 
$codModulo='LABORATORIO';
$codSM='RIntHonMedLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>


<?php } ?>


<?php 
$codModulo='LABORATORIO';
$codSM='RHonMedLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>


<?php } ?>

<?php 
$codModulo='LABORATORIO';
$codSM='RepBLAB';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Consultar x Fecha","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/consultaxFecha.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);

<?php } ?>


stm_ep();
<?php } ?>
//---------------REPORTES------------------>










<!------------INICIO EXPEDIENTES----------------------
<?php 
$codModulo='LABORATORIO';
$codSM='IMExpLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p0i1","p0i0",[0,"Expedientes","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#E6EFF9",1,"","/sima/imagenes/4545454.gif",3,0,0,0,"#E6EFF9","#000000","#FFFFFF","#FFFF34","bold 8pt Verdana","bold 8pt Verdana"],100,33);
stm_bp("p1",[1,4,-20,2,0,5,0,0,100,"",-2,"",-2,50,2,3,"#333333","#333333","",3,1,1,"#000000"]);

<?php 
$codModulo='LABORATORIO';
$codSM='RERLab';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p1i0","p0i1",[0,"Editar Resultados","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/laboratorio/listaResultados1.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);

<?php } ?>




stm_ep();
<?php } ?>
//---------------EXPEDIENTES------------------>



<!------------INICIO EXPEDIENTES----------------------
<?php 
$codModulo='LABORATORIOBD';
$codSM='ILabBD';
$checaModuloScript= "Select usuario From usuariosSubmodulos WHERE codModulo='".$codModulo."' 
and codSM = '".$codSM."' and 
usuario1 = '".$usuario."'";
$resScript=mysql_db_query($basedatos,$checaModuloScript);
$resulScripModulo = mysql_fetch_array($resScript);
echo mysql_error();
if($resulScripModulo['usuario']){ ?>
stm_aix("p0i1","p0i0",[0,"Bay-Day","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#E6EFF9",1,"","4545454.gif",3,0,0,0,"#E6EFF9","#000000","#FFFF34","#FFFFFF","bold 8pt Verdana","bold 8pt Verdana"],100,33);
stm_bp("p1",[1,4,-20,2,0,5,0,0,100,"",-2,"",-2,50,2,3,"#333333","#333333","",3,1,1,"#000000"]);
stm_ep();
<?php } ?>



<!------------INICIO SALIR----------------------
stm_aix("p0i1","p0i0",[0,"Salir","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#E6EFF9",1,"#E6EFF9",1,"","/sima/imagenes/4545454.gif",3,0,0,0,"#E6EFF9","#000000","#FF0000","#FFFF34","bold 8pt Verdana","bold 8pt Verdana"],100,33);
stm_bp("p1",[1,4,-20,2,0,5,0,0,100,"",-2,"",-2,50,2,3,"#333333","#333333","",3,1,1,"#000000"]);

stm_aix("p1i0","p0i1",[0,"Menu Operaciones","","",-1,-1,0,"/sima/OPERACIONESHOSPITALARIAS/index.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);

stm_aix("p1i0","p0i1",[0,"Menu Principal","","",-1,-1,0,"/sima/MenuIndex.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);


stm_aix("p1i0","p0i1",[0,"Salir del Sistema","","",-1,-1,0,"/sima/salir.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E6EFF9",1,"#000000",0,"","",3,3,0,0,"#E6EFF9","#000000","#FFFFFF","#6699FF"],165,20);


stm_em();
//-->
</script>
<span class="Estilo1"></span>
</center>
</body>
</html>