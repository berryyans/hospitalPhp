<?php require('/configuracion/ventanasEmergentes.php');require('/configuracion/funciones.php');?>
<?php  
//QUIEN ES CENTRO DE DISTRIBUCION DE ESTA ENTIDAD    
$cendis=new whoisCendis();
$centroDistribucion=$cendis->cendis($entidad,$basedatos); 


if($_GET['keyR'] AND ($_GET['inactiva'] or $_GET['activa'])){

	if($_GET['inactiva']=="inactiva"){
$q = "delete from OC

		WHERE keyR='".$_GET['keyR']."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();
	}



}
?>


















<?php 
if($_POST['update'] ){
$precioSugerido=$_POST['precioSugerido'];$costo=$_POST['costo'];
$keyR=$_POST['keyR'];$cantidad=$_POST['cantidad'];$notaCredito=$_POST['notaCredito'];$tipoEntrada=$_POST['tipoEntrada'];
$descuentoPorcentaje=$_POST['descuentoPorcentaje'];$descuentoPorcentajePP=$_POST['descuentoPorcentajePP'];$porcentajeOferta=$_POST['porcentajeOferta'];
for($i=0;$i<=$_POST['bandera'];$i++){

if($keyR[$i]){

    
    
    
$sSQL12= "
	SELECT *
FROM
    OC

WHERE keyR='".$keyR[$i]."'";


$result12=mysql_db_query($basedatos,$sSQL12);
$myrow12 = mysql_fetch_array($result12);
    

if($descuentoPorcentaje[$i]>0){
    $importeDescu=$costo[$i]-(($descuentoPorcentaje[$i]*0.01)*$costo[$i]);
}    else{
    $importeDescu=NULL;
}
    
    
$q = "UPDATE OC set 
porcentajeOferta='".$porcentajeOferta[$i]."',      
naturaleza='C',
      tipoEntrada='".$tipoEntrada[$i]."',
      notaCredito='".$notaCredito[$i]."',
    cantidad='".$cantidad[$i]."',
        importeDescuento='".$importeDescu."',
        descuentoPorcentaje='".$descuentoPorcentaje[$i]."',
            descuentoPorcentajePP='".$descuentoPorcentajePP[$i]."',
precioSugerido='".$precioSugerido[$i]."',
precioUnitario='".$costo[$i]."'

		WHERE keyR='".$keyR[$i]."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();
	
}

}




}












if($_POST['descripcion'] and $_POST['keyPA'] and !$_POST['update'] and !$_POST['send']){


$sSQL12= "
	SELECT *
FROM
  articulos
WHERE 
keyPA='".$_POST['keyPA']."'
";
$result12=mysql_db_query($basedatos,$sSQL12);
$myrow12 = mysql_fetch_array($result12);


$agregaSaldo = "INSERT INTO OC ( id_requisicion,id_almacen,usuario,fecha,hora,status,prioridad,id_proveedor,
    entidad,numFactura,keyPA,cantidadParticular,cantidadAseguradora,cantidad,descripcionArticulo,naturaleza

) values (

'".$_GET['req']."','".$_GET['departamento']."','".$usuario."','".$fecha1."','".$hora1."','request',
'".$_POST['prioridad']."','".$_GET['proveedor']."','".$entidad."','".$_GET['id_factura']."','".$_POST['keyPA']."' ,'0.00','0.00','0' ,'".$myrow12['descripcion']."','C' )";
mysql_db_query($basedatos,$agregaSaldo);
echo mysql_error();

}
?>

























<?php 
$fecha1=date("Y-m-d");
$hora1= date("H:i a");

if($_POST['send']){
$keyR=$_POST['keyR'];
$costo=$_POST['costo'];
$cantidad=$_POST['cantidad'];
$keyPA=$_POST['keyPA'];
$precioSugerido=$_POST['precioSugerido'];
$tipoEntrada=$_POST['tipoEntrada'];

        $q4 = "

    INSERT INTO contadorTransaccionesKardex(contador, usuario,entidad)
    SELECT(IFNULL((SELECT MAX(contador)+1 from contadorTransaccionesKardex where entidad='".$entidad."'), 1)), '".$usuario."','".$entidad."'

    ";
    mysql_db_query($basedatos,$q4);
    echo mysql_error();

    $sSQL= "SELECT max(contador) as topeMaximo from contadorTransaccionesKardex where entidad='".$entidad."' and usuario='".$usuario."'";
    $result=mysql_db_query($basedatos,$sSQL);
    $myrow = mysql_fetch_array($result);
    $numSolicitud=$myrow['topeMaximo'];


    
    
    

$sSQL3ae= "
	SELECT 
almacen
FROM
almacenes
where
entidad='".$entidad."'
    and
    centroDistribucion='si'  ";
$result3ae=mysql_db_query($basedatos,$sSQL3ae);
$myrow3ae = mysql_fetch_array($result3ae);    
    
    
    
    
    

$q1 = "UPDATE compras
    set 
status='sent'
WHERE 
entidad='".$entidad."'
    and
factura='".$_GET['id_factura']."'
";
mysql_db_query($basedatos,$q1);



for($i=0;$i<=$_POST['bandera'];$i++){



if($keyR[$i]!=NULL){



$sSQL3a= "
	SELECT 
codigo,gpoProducto,descripcion
FROM
articulos
WHERE keyPA='".$keyPA[$i]."'";
$result3a=mysql_db_query($basedatos,$sSQL3a);
$myrow3a = mysql_fetch_array($result3a);




$sSQLrd= "SELECT  
* 
FROM OC
WHERE
entidad='".$entidad."'
and
numFactura='".$_GET['id_factura']."'
and
codigo='".$myrow3a['codigo']."'";
$resultrd=mysql_db_query($basedatos,$sSQLrd);
$myrowrd = mysql_fetch_array($resultrd);


$_GET['departamento']=$myrowrd['id_almacen'];


//***************************************
if($cantidad[$i]>0 and  $costo[$i]>0 and $keyR[$i]  ){


$porcentajeParticular=($costo[$i]*$myrow3['porcentajeParticular'])/100;
$porcentajeAseguradora=($costo[$i]*$myrow3['porcentajeAseguradora'])/100;





if($keyPA[$i]!=NULL){
$q1a = "INSERT INTO precioArticulos 
(codigo,costo,usuario,fecha,hora,entidad,keyPA,ID_EJERCICIO,status,
cantidadParticular,cantidadAseguradora,descripcionArticulo,precioSugerido)
values
('".$myrow3a['codigo']."','".$costo[$i]."','".$usuario."','".$fecha1."','".$hora1."',
    '".$entidad."','".$keyPA[$i]."','".$ID_EJERCICIOM."' ,'request'  ,'".$porcentajeParticular."' ,
        '".$porcentajeAseguradora."' ,'".$myrow3a['descripcion']."' ,'".$precioSugerido[$i]."' )";

mysql_db_query($basedatos,$q1a);
echo mysql_error();



  


//*******************ACTUALIZO EXISTENCIAS***********************

############DEPRECATED##########
$sSQL8ac= "
SELECT * 
FROM
articulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow3a['codigo']."'
";
$result8ac=mysql_db_query($basedatos,$sSQL8ac);
$myrow8ac = mysql_fetch_array($result8ac);
    
if($myrow8ac['cajaCon']>0){
    $ct=$cantidad[$i]*$myrow8ac['cajaCon'];
}else{
    $ct=$cantidad[$i];
}
################################
$ct=$cantidad[$i];
//****************************************************************







####DEPRECATED######
/*
$karticulos=new kardex();
$karticulos-> movimientoskardex('entrada',$ct,'ENTRADA POR COMPRAS',$tipoEntrada[$i],$usuario,$fecha1,$hora1,$myrow3ae['almacen'],$_GET['departamento'],$keyPA[$i],$myrow3a['codigo'],$entidad,$basedatos);
*/













###########AJUSTE MANUAL DE KARDEX#############
$sSQL8acd= "
SELECT * 
FROM
conceptoinventarios
WHERE

codigo='01'
";
$result8acd=mysql_db_query($basedatos,$sSQL8acd);
$myrow8acd = mysql_fetch_array($result8acd);

//******************CUANTO HABIA EN EXISTENCIAS***********
     $sSQL8ac1e= "
SELECT sum( cantidad) as entrada
FROM
articulosExistencias
WHERE
entidad='".$entidad."'
and
codigo='".$myrow3a['codigo']."'
    and
      status='ready'
  
";
$result8ac1e=mysql_db_query($basedatos,$sSQL8ac1e);
$myrow8ac1e = mysql_fetch_array($result8ac1e);
echo mysql_error();

    $sSQL8acb= "
SELECT * 
FROM
precioArticulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow3a['codigo']."'
    order by keyC DESC
";
$result8acb=mysql_db_query($basedatos,$sSQL8acb);
$myrow8acb = mysql_fetch_array($result8acb);


  $q1ab = "INSERT INTO kardex 
(kc,evento,descripcion,descripcionevento,naturaleza,usuario,fecha,hora,entidad,
keyPA,almacenSolicitante,almacenDestino,costo,cantidad,cantidadtotal,
descripcionArticulo,existencia,existenciaTotal,otro,gpoProducto,tipoMovimiento,
almacenConsumo,io,cajaCon,status,cbarra,numSolicitud)
values
('".$myrow3a['codigo']."','".$myrow8acd['codigo']."',
    '".$myrow8acd['tipoMovimiento']."',
    '".$myrow8acd['descripcion']."','".$myrow8acd['naturaleza']."',
        '".$usuario."','".$fecha1."',
        '".$hora1."',
    '".$entidad."','".$myrow8ac['keyPA']."','".$myrow3ae['almacen']."',
        '".$myrow3ae['almacen']."',
        '".$myrow8acb['costo']."',
        '".$cantidad[$i]."','".$cantidad[$i]."','".$myrow8ac['descripcion']."','".$myrow8ac1e['entrada']."',
            '".$myrow8ac1e['entrada']."',
        '".$myrow8acd['otro']."','".$myrow8ac['gpoProducto']."',
            '".$myrow8acd['tipoMovimiento']."',
            '".$myrowk['almacenConsumo']."','ENTRADA',
                '".$myrow8ac['cajaCon']."','final','".$myrow8ac['cbarra']."',
                '".$numSolicitud."'
         )";

mysql_db_query($basedatos,$q1ab);
echo mysql_error();
//CIERRO AFECTACION DE KARDEX*******












$agrega = "INSERT INTO entradaArticulos (
codigo,keyPA,gpoProducto,cantidad,tipoVenta,entidad,tipoMov,fecha,hora,usuario,almacen,factura,tipo,status)
values
('".$myrow8ac['codigo']."','".$myrow8ac['keyPA']."','".$myrow8ac['gpoProducto']."','".$ct."','".$myrow['tipoVenta']."','".$entidad."','entrada',
    '".$fecha1."','".$hora1."','".$usuario."','".$myrow3ae['almacen']."','".$_GET['id_factura']."','".$tipoEntrada[$i]."','standby')";
mysql_db_query($basedatos,$agrega);
echo mysql_error();

//$q1a = "UPDATE existencias set 
//cantidadTotal=cantidadTotal+'".$ct."',
//existencia=existencia+'".$cantidad[$i]."'
//WHERE
//
//keyPA='".$keyPA[$i]."'
//and
//almacen='".$_GET['departamento']."'
//";
//mysql_db_query($basedatos,$q1a); 
//echo mysql_error();

}
}











}


//**********conversion a unidades***********
$entrance=new entradas();
$entrance=$entrance->entradaInventarios($costo,$numSolicitud,'01','si',$almacen,$fecha1,$hora1,$_GET['id_factura'],$usuario,$entidad,$basedatos);













//ACTUALIZA PRECIOS

    
    
//TODOS articulos en request
 $sSQL1= "SELECT
* 
FROM 
precioArticulos
where
entidad='".$entidad."'
   and
    status='request'

";

$result1=mysql_db_query($basedatos,$sSQL1);
while($myrow1 = mysql_fetch_array($result1)){
$codigo+=1;
$a+=1;


if($col){
$color = '#FFCCFF';
$col = "";
} else {
$color = '#FFFFFF';
$col = 1;
}

//QUIERO SABER EL GRUPO
$sSQL1a= "SELECT
* 
FROM 
articulos
where
entidad='".$entidad."'
    and
codigo='".$myrow1['codigo']."'
";

$result1a=mysql_db_query($basedatos,$sSQL1a);
$myrow1a = mysql_fetch_array($result1a);
$grupo=$myrow1a['gpoProducto'];

$sSQL1act= "SELECT
* 
FROM 
gpoProductos
where

codigoGP='".$grupo."'
";

$result1act=mysql_db_query($basedatos,$sSQL1act);
$myrow1act = mysql_fetch_array($result1act);

//SI TRAE PRECIO SUGERIDO LO RESPETO
if( $myrow1act['afectaPS']=='si' and $myrow1['precioSugerido']>0  ){


$sSQL7a= "Select * From articulosPrecioNivel where entidad='".$entidad."' 
and
codigo='".$myrow1['codigo']."'
";
$result7a=mysql_db_query($basedatos,$sSQL7a); 
while($myrow7a = mysql_fetch_array($result7a)){
    
    //actualizar todo************************************


$porcentajePS=1-round(($myrow7a['nivel1']/$myrow7a['nivel3']),2);
$nivel1=$myrow1['precioSugerido'];
$nivel3=$nivel1+($nivel1*$porcentajePS);


$agrega = "UPDATE precioArticulos set
status='final'
where
entidad='".$entidad."'
    and
codigo='".$myrow7a['codigo']."'
and
status='request'
order by  keyC DESC
";

mysql_db_query($basedatos,$agrega);
echo mysql_error();



    $q = "insert into historialPrecios
(
codigo,precioPaquete1,
precioPaquete3,
nivel1,
nivel3,
id_medico,
keyPA,almacen,usuario,fecha,hora,entidad)
values
('".$_GET['codigo']."','".$precioPaquete1[$i]."','".$precioPaquete3[$i]."',
    '".$nivel1."','".$nivel3."', '".$id_medico[$i]."','".$_GET['keyPA']."','".$myrow7a['almacen']."','".$usuario."','".$fecha."','".$hora."','".$entidad."')";
mysql_db_query($basedatos,$q);
echo mysql_error();

$agrega1 = "UPDATE articulosPrecioNivel set
nivel1='".$nivel1."',
    nivel3='".$nivel3."'
where
entidad='".$entidad."'
    and
codigo='".$myrow7a['codigo']."' 
and
almacen='".$myrow7a['almacen']."'
";

mysql_db_query($basedatos,$agrega1);
echo mysql_error();
//****************************************************
}



}else{ //NO TRAE PRECIO SUGERIDO
    

//verificar si tiene politicas de precio
$sSQL1b= "SELECT
* 
FROM 
politicasPrecios
where 
entidad='".$entidad."'    
and
gpoProducto='".$grupo."' 
";

$result1b=mysql_db_query($basedatos,$sSQL1b);
$myrow1b = mysql_fetch_array($result1b);






if( $myrow1b['rangoInicial']>0){
//AHORA ME TRAIGO EL CODIGO QUE ESTA EN LOS ALMACENES

    $sSQL7a= "Select * From articulosPrecioNivel where entidad='".$entidad."' 
and
codigo='".$myrow1['codigo']."'

";
$result7a=mysql_db_query($basedatos,$sSQL7a); 
while($myrow7a = mysql_fetch_array($result7a)){
    

    
    


$sSQL1bd= "SELECT
* 
FROM 
politicasPrecios
where 
entidad='".$entidad."'    
and
gpoProducto='".$grupo."' 
    and
     '".$myrow1['costo']."' 
         between rangoInicial and rangoFinal
        
";

$result1bd=mysql_db_query($basedatos,$sSQL1bd);
$myrow1bd = mysql_fetch_array($result1bd);
    

    
    //actualizar todo************************************
    if($myrow1bd['porcentaje']>0 and $myrow1['costo']>0){



        
        
$porcentajePS=0.100;
$nivel1=($myrow1['costo']+($myrow1['costo']*$myrow1bd['porcentaje'])/100);
//echo '<br>';
$nivel3=$nivel1+($nivel1*$porcentajePS);
//echo '<br>';


$agrega = "UPDATE precioArticulos set
status='final'
where
entidad='".$entidad."'
    and
codigo='".$myrow7a['codigo']."'
and
status='request'
order by  keyC DESC
";

mysql_db_query($basedatos,$agrega);
echo mysql_error();



    $q = "insert into historialPrecios
(
codigo,precioPaquete1,
precioPaquete3,
nivel1,
nivel3,
id_medico,
keyPA,almacen,usuario,fecha,hora,entidad)
values
('".$myrow7a['codigo']."','','',
    '".round($nivel1)."','".round($nivel3)."', '','".$myrow7a['keyPA']."','".$myrow7a['almacen']."','".$usuario."','".$fecha."','".$hora."','".$entidad."')";
mysql_db_query($basedatos,$q);
echo mysql_error();

$agrega1 = "UPDATE articulosPrecioNivel set
nivel1='".round($nivel1)."',
    nivel3='".($nivel3)."'
where
entidad='".$entidad."'
    and
codigo='".$myrow7a['codigo']."' 
and
almacen='".$myrow7a['almacen']."'
";

mysql_db_query($basedatos,$agrega1);
echo mysql_error();
//****************************************************
}
}  
}



}//no trae precio sugerido
}


//******************************************
} 

?>
<script>
window.alert("Factura Enviada");
window.opener.document.forms["form1"].submit();
window.close();
</script>
<?php 
}
?>







<script>

var win = null;
function nueva(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
if(win.window.focus){win.window.focus();}
}

</script>




<?php 

if($_POST['up']!=NULL and count($_POST['ccodigo']>0) ){
$keyRGB=$_POST['keyRGB'];
$keyR=$_POST['keyR'];
$ccodigo=$_POST['ccodigo'];
$cantidad=$_POST['cantidad'];

for($i=0;$i<count($_POST['ccodigo']);$i++){

   
##COMPROBAR QUE SOLO ESTE LO QUE NECESITE
$sSQL39e1= "
SELECT 
*
FROM
articulosExistencias
WHERE 
entidad='".$entidad."'
    and
almacen='".$centroDistribucion."'
and
codigo='".$ccodigo[$i]."'
    and
    status='ready'
limit 0,$cantidad[$i] 
";
$result39e1=mysql_db_query($basedatos,$sSQL39e1);
while($myrow39e1= mysql_fetch_array($result39e1)){
    
    
    $sSQL8ac1e= "
SELECT sum( cantidad) as entrada
FROM
articulosExistencias
WHERE
entidad='".$entidad."'
and
codigo='".$ccodigo[$i]."'
    and
      status='reqDev'
and
almacen='".$centroDistribucion."'
";
$result8ac1e=mysql_db_query($basedatos,$sSQL8ac1e);
$myrow8ac1e = mysql_fetch_array($result8ac1e);
echo mysql_error();

//echo $myrow8ac1e['entrada'].' ->  '.$cantidad[$i];
if($myrow8ac1e['entrada']!=$cantidad[$i]){    
            $q = "UPDATE articulosExistencias 
            set
            status='reqDev'
            WHERE
            keyAE='".$myrow39e1['keyAE']."'";
            mysql_db_query($basedatos,$q);
		echo mysql_error();
                
}       
}
}    
}
?>
































<?php

if($_POST['devolver']!=null){
 
##############AFECTAR KARDEX########
    $q4 = "

    INSERT INTO contadorTransaccionesKardex(contador, usuario,entidad)
    SELECT(IFNULL((SELECT MAX(contador)+1 from contadorTransaccionesKardex where entidad='".$entidad."'), 1)), '".$usuario."','".$entidad."'

    ";
    mysql_db_query($basedatos,$q4);
    echo mysql_error();

    $sSQL= "SELECT max(contador) as topeMaximo from contadorTransaccionesKardex where entidad='".$entidad."' and usuario='".$usuario."'";
    $result=mysql_db_query($basedatos,$sSQL);
    $myrow = mysql_fetch_array($result);
    $numSolicitud=$myrow['topeMaximo'];
    ###########AJUSTE MANUAL DE KARDEX#############
    
    
##COMPROBAR QUE SOLO ESTE LO QUE NECESITE
$sSQL39e1= "
SELECT 
*
FROM
articulosExistencias
WHERE 
entidad='".$entidad."'
    and
almacen='".$centroDistribucion."'
and
   status='reqDev'
   group by codigo
";
$result39e1=mysql_db_query($basedatos,$sSQL39e1);
while($myrow= mysql_fetch_array($result39e1)){    
$sSQL8ac= "
SELECT * 
FROM
articulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow['codigo']."'
";
$result8ac=mysql_db_query($basedatos,$sSQL8ac);
$myrow8ac = mysql_fetch_array($result8ac);
    
$sSQL8acd= "
SELECT * 
FROM
conceptoinventarios
WHERE

codigo='11'
";
$result8acd=mysql_db_query($basedatos,$sSQL8acd);
$myrow8acd = mysql_fetch_array($result8acd);

//******************CUANTO HABIA EN EXISTENCIAS***********
     $sSQL8ac1e= "
SELECT sum( cantidad) as entrada
FROM
articulosExistencias
WHERE
entidad='".$entidad."'
and
codigo='".$myrow['codigo']."'
    and
      status='ready'

  
";
$result8ac1e=mysql_db_query($basedatos,$sSQL8ac1e);
$myrow8ac1e = mysql_fetch_array($result8ac1e);

     $sSQL8= "
SELECT sum( cantidad) as entrada
FROM
articulosExistencias
WHERE
entidad='".$entidad."'
and
codigo='".$myrow['codigo']."'
    and
      status='reqDev'
      and
      almacen='".$centroDistribucion."'
  
";
$result8=mysql_db_query($basedatos,$sSQL8);
$myrow8 = mysql_fetch_array($result8);
echo mysql_error();




    $sSQL8acb= "
SELECT * 
FROM
precioArticulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow['codigo']."'
    order by keyC DESC
";
$result8acb=mysql_db_query($basedatos,$sSQL8acb);
$myrow8acb = mysql_fetch_array($result8acb);


  $q1ab = "INSERT INTO kardex 
(kc,evento,descripcion,descripcionevento,naturaleza,usuario,fecha,hora,entidad,
keyPA,almacenSolicitante,almacenDestino,costo,cantidad,cantidadtotal,
descripcionArticulo,existencia,existenciaTotal,otro,gpoProducto,tipoMovimiento,
almacenConsumo,io,cajaCon,status,cbarra,numSolicitud)
values
('".$myrow['codigo']."','".$myrow8acd['codigo']."',
    '".$myrow8acd['tipoMovimiento']."',
    '".$myrow8acd['descripcion']."','".$myrow8acd['naturaleza']."',
        '".$usuario."','".$fecha1."',
        '".$hora1."',
    '".$entidad."','".$myrow['keyPA']."','".$myrow['almacenSolicitante']."',
        '".$myrow['almacenDestino']."',
        '".$myrow8acb['costo']."',
        '".$myrow8['entrada']."','".$myrow8['entrada']."','".$myrow['descripcionArticulo']."','".$myrow8ac1e['entrada']."',
            '".$myrow8ac1e['entrada']."',
        '".$myrow8acd['otro']."','".$myrow['gpoProducto']."',
            '".$myrow8acd['tipoMovimiento']."',
            '".$myrowk['almacenConsumo']."','salida',
                '".$myrow8ac['cajaCon']."','final','".$myrow8ac['cbarra']."',
                '".$numSolicitud."'
         )";

mysql_db_query($basedatos,$q1ab);
echo mysql_error();
}
//CIERRO AFECTACION DE KARDEX*******
    
    
    
    
#######ELIMINAR EXISTENCIAS###
       $q = "DELETE FROM articulosExistencias 
            
            WHERE
entidad='".$entidad."'
    and
almacen='".$centroDistribucion."' 
    and
    status='reqDev'

";
		mysql_db_query($basedatos,$q);
		echo mysql_error();
    
                
######ACTUALIZO LAS COMPRAS TMABIEN
$q1 = "UPDATE compras
    set
    statusDevolucion='si'
       WHERE
entidad='".$entidad."'
    and
factura='".$_GET['id_factura']."' 
    and
    proveedor='".$_GET['proveedor']."'

";
		mysql_db_query($basedatos,$q1);
		echo mysql_error();
    

$q2 = "UPDATE OC
    set
    statusDevolucion='si'
       WHERE
entidad='".$entidad."'
    and
numFactura='".$_GET['id_factura']."' 
    and
    id_proveedor='".$_GET['proveedor']."'

";
		mysql_db_query($basedatos,$q2);
		echo mysql_error();                
                
                
echo '    <script>
window.alert("Se aplico la devolucion correctamente!");
window.opener.document.forms["form1"].submit();
window.close();
</script>';
}
?>

<script language=javascript> 
function ventanaSecundaria7 (URL){ 
   window.open(URL,"ventanaSecundaria7","width=1024,height=800,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script>

<script language=javascript> 
function ventanaSecundaria2 (URL){ 
   window.open(URL,"ventana2","width=660,height=800,scrollbars=YES") 
} 
</script>































<script language=javascript> 
function ventanaSecundaria17 (URL){ 
   window.open(URL,"ventanaSecundaria17","width=550,height=700,scrollbars=YES") 
} 
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php
$estilos=new muestraEstilos();
$estilos->styles();


?>

</head>

<body>
<h1 align="center" class="titulos"><br />

    <?php echo 'Proveedor: '.$_GET['descripcionProveedor'];?>

</h1>

  <form id="form1" name="form1" method="post" >
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <table width="807" border="0" align="center" cellpadding="4" cellspacing="0" class="normal" style="border: 0px solid #000000;">
      <tr bgcolor="#FFFF00">
        
          
          <td width="68" class="Estilo5" >
         
              keyR
         </td>
          
        
        <td width="283" >Descripcion</td>
        

        
        
        <td width="80" class="normal" scope="col">Cantidad</td>
        
    <td width="80" class="normal" scope="col">ExistenciaCendis</td>    
     <td width="80" class="normal" scope="col">Solicitado</td>   
        
    <td width="91" class="normal" scope="col">
           
           Costo
         
       </td>
        
               
        
        <td width="35" >
           Total
       </td>
        
  
        
      </tr>
<?php	
$importe[0]=number_format($importe[0],2);
$precioDerivado=number_format($precioDerivado,2);
$a=number_format($a,2);
$oferta[0]=number_format($oferta[0],2);
$ivaOfertaD=number_format($ivaOfertaD,2);
$tivaOferta[0]=number_format($tivaOferta[0],2);
$tivaDescuentoD=number_format($tivaDescuentoD,2);
$descuentoD=number_format($descuentoD,2);
$ivaDescuentoR=number_format($ivaDescuentoR,2);
$descuentoPPD=number_format($descuentoPPD,2);
$b=number_format($b,2);
$descuentoD=number_format($descuentoD,2);
$c=number_format($c,2);


$sSQL= "SELECT  
* 
FROM OC
WHERE
entidad='".$entidad."'
and
numFactura='".$_GET['id_factura']."'
and
id_proveedor='".$_GET['proveedor']."'
";


$result=mysql_db_query($basedatos,$sSQL);
while($myrow = mysql_fetch_array($result)){ 
    $a+=1;
$bandera+=1;
$bandera1+=1;
$gpoProducto=$myrow['gpoProducto'];
$code1=$myrow['codigo'];
//*************************************CONVENIOS********************************************
$sSQL12= "
	SELECT *
FROM
  articulos
WHERE 
keyPA='".$myrow['keyPA']."'
";
$result12=mysql_db_query($basedatos,$sSQL12);
$myrow12 = mysql_fetch_array($result12);
$gpoProducto=$myrow12['gpoProducto'];
$ctaMayor=$myrow12['ctaContable'];

//*/****************************************Cierro validacion de convenios************************

//cierro descuento

if($col){
$color = '#FFFF99';
$col = "";
} else {
$color = '#FFFFFF';
$col = 1;
}



$sSQL4= "
SELECT 
razonSocial
FROM
proveedores
WHERE
entidad='".$entidad."'
and

 id_proveedor = '".$myrow['id_proveedor']."'
";
$result4=mysql_db_query($basedatos,$sSQL4);
$myrow4 = mysql_fetch_array($result4);



$um=$myrow12['um'];
$medico=$myrow['medico'];

$sSQL39d= "
	SELECT 
*
FROM
precioArticulos
WHERE keyPA='".$myrow['keyPA']."' order by keyC DESC";
$result39d=mysql_db_query($basedatos,$sSQL39d);
$myrow39d = mysql_fetch_array($result39d);

$sSQL39e1= "
	SELECT 
existencia,cantidadTotal
FROM
existencias
WHERE 
entidad='".$entidad."'
    and
almacen='".$_GET['departamento']."'
and
keyPA='".$myrow['keyPA']."' ";
$result39e1=mysql_db_query($basedatos,$sSQL39e1);
$myrow39e1= mysql_fetch_array($result39e1);


$sSQL39e= "
	SELECT 
*
FROM
gpoProductos
WHERE 

codigoGP='".$myrow12['gpoProducto']."'";
$result39e=mysql_db_query($basedatos,$sSQL39e);
$myrow39e = mysql_fetch_array($result39e);








//***************PRECIO ORIGINAL DERIVADO**************
if($myrow['porcentajeOferta']>0 or $myrow['descuentoPorcentaje']>0 or $myrow['descuentoPorcentaje']>0){
$precioDerivado=$myrow['precioUnitario']; 

//VALIDACION DE OFERTA
if($myrow['porcentajeOferta']>0){
$ofertaD=$precioDerivado*($myrow['porcentajeOferta']*0.01);
$a=$precioDerivado=$precioDerivado-$ofertaD;


   if($myrow39e['tasaGP']>0){ 
    $ivaOfertaD=($ofertaD*$myrow['cantidad'])*($myrow39e['tasaGP']*0.01);
    $tivaOferta[0]+=$ivaOfertaD;
    
   }
   
   
$oferta[0]+=($ofertaD*$myrow['cantidad']);//este multiplica cantidades


}else{
$a=$myrow['precioUnitario'];
}//TERMINA VALIDACION DE OFERTA





//VALIDACION DE PORCENTAJE NORMAL
if($myrow['descuentoPorcentaje']>0){
$descuentoD=$precioDerivado*($myrow['descuentoPorcentaje']*0.01);
$precioDerivado=$precioDerivado-$descuentoD;
$descuento[0]+= ($a-$precioDerivado)*$myrow['cantidad'];
$ivaDescuentoR=($a-$precioDerivado);


   if($myrow39e['tasaGP']>0){ 
    $tivaDescuentoD=(($ivaDescuentoR)*($myrow39e['tasaGP']*0.01))*$myrow['cantidad']; 
    
    $tivaDescuento[0]+=$tivaDescuentoD;
   }



  $b=$descuentoD;
}else{  
  $b=$myrow['precioUnitario'];
}//TERMINA VALIDACION DE PORCENTAJE NORMAL
    





//DESCUENTO PORCENTAJE PP
if($myrow['descuentoPorcentajePP']>0){
$descuentoPPD=$precioDerivado*($myrow['descuentoPorcentajePP']*0.01);
$precioDerivado=$precioDerivado-$descuentoPPD;

$descuentoPP[0]+= ($a-$precioDerivado)*$myrow['cantidad'];
$ivaDescuentoPPR=($b-$precioDerivado);


   if($myrow39e['tasaGP']>0){ 
    $tivaDescuentoPPD=(($ivaDescuentoPPR)*($myrow39e['tasaGP']*0.01))*$myrow['cantidad']; 
    $tivaDescuentoPP[0]+=$tivaDescuentoPPD;
    
   }

}else{   
   $c=$myrow['precioUnitario'];
}//CIERRA VALIDACION DE PORCENTAJE PP

    
}else{//NO TRAE DESCUENTOS
 $precioDerivado=$myrow['precioUnitario'];    
}




if($myrow39e['tasaGP']>0){
$iva[0]+=($myrow['precioUnitario']*$myrow['cantidad'])*($myrow39e['tasaGP']*0.01);
}
//CIERRA TOTALES



?>

    <tr bgcolor="#FFFFFF" onMouseOver="bgColor='#CCCCCC'" onMouseOut="bgColor='#ffffff'" >
    




        

        <input name="bandera" type="hidden" id="bandera" value="<?php echo $bandera;?>" />
        
        <td class="normal">
            <?php echo $myrow['keyR'];?>
        </td>
        
        
        <td class="normal">
		<?php 
		echo $myrow['descripcionArticulo']; 
		echo '<br>';
		
		if($myrow['status']=='notaCredito'){
		echo '<span class="codigos">[Nota de Credito]</span>';		
		}
		
		if($myrow39e['descripcionGP']!=NULL){
		echo '<br>';
		echo '<span class="normal">['. 		$myrow39e['descripcionGP']      .']</span>';		
        }
        
        if($myrow['descuentoPorcentaje']>0){
   
		echo '<span class="codigos">Tiene un '.$myrow['descuentoPorcentaje'].'% de descuento</span>';	
        }
		?>
		  <input type="hidden" name="keyR[]"  value="<?php echo $myrow['keyR'];?>" />
          <input type="hidden" name="keyPA[]" value="<?php echo $myrow['keyPA'];?>" /></td>
          
        
       
        
        
        <td  class="normal">
	<input class="normal" name="cantidad[]" type="text" size="3" value="<?php echo $myrow['cantidad']; ?>"  autocomplete="off" <?php  echo 'readonly=""';?>/>		
        </td>
   
        <td  class="normal">
<?php            
$sSQL8ac1e= "
SELECT sum( cantidad) as entrada
FROM
articulosExistencias
WHERE
entidad='".$entidad."'
and
codigo='".$myrow['codigo']."'
    and
      status='ready'
and
almacen='".$centroDistribucion."'
";
$result8ac1e=mysql_db_query($basedatos,$sSQL8ac1e);
$myrow8ac1e = mysql_fetch_array($result8ac1e);
echo mysql_error();
echo $myrow8ac1e['entrada'];
$left[0]+=$myrow['cantidad'];

?>        </td>
        
        
        
<td  class="normal">
<?php            
$sSQL8ac1e= "
SELECT sum( cantidad) as entrada
FROM
articulosExistencias
WHERE
entidad='".$entidad."'
and
codigo='".$myrow['codigo']."'
    and
      status='reqDev'
and
almacen='".$centroDistribucion."'
";
$result8ac1e=mysql_db_query($basedatos,$sSQL8ac1e);
$myrow8ac1e = mysql_fetch_array($result8ac1e);
echo mysql_error();
echo $myrow8ac1e['entrada'];

######SI ME CUADRAN LAS 2 PUEDEN SALIR#########

$right[0]+=$myrow8ac1e['entrada'];
?>        </td>        
        
        
        <td  class="normal">
        <label>
        <input class="normal" name="costo[]" type="text"  size="6" value="<?php echo $myrow['precioUnitario']; ?>" autocomplete="off"  <?php  echo 'readonly=""';?>/>
	</label>
        </td>
        


        
        
        <td bgcolor="<?php echo $color;?>" class="normal">
            <div align="center">
<span class="normal"> 
<?php 
if($myrow['tipoEntrada']!='regalo' and $myrow['tipoEntrada']!='donacion'){

//TOTALES******
$importe[0]+=$myrow['precioUnitario']*$myrow['cantidad'];


echo '$'.number_format($myrow['precioUnitario']*$myrow['cantidad'],2);   
}else{
echo '$'.number_format("0.00",2);    
}

?>
</span></div>
        </td>
        
        
   
        
        
        
      </tr>
<input name="ccodigo[]" type="hidden" value="<?php echo $myrow['codigo']; ?>" />
      <?php } //cierra while
	
	  ?>
    </table>
    
    

<p>&nbsp;</p>
	
	
	    <?php if($ob[0]>0){
                $tipoMensaje='error';
$encabezado='Error';
$texto='ESTE CAMPO ES REQUERIDO...!';
                
                ?>


       <?php
    if($texto!=NULL){
    $mostrarMensajes=new informacion();
    $mostrarMensajes->mostrarMensajes($encabezado,$tipoMensaje,$id,$texto,$basedatos);
    }
    ?>
    


    <?php  }?>
	
	<br>
	<br>
	
	
	
	
	
	
	
	
  <?php 
  if($_GET['id_factura']!=NULL){
 $sSQL17a= "Select * From compras WHERE entidad='".$entidad."' and factura='".$_GET['id_factura']."'
";
$result17a=mysql_db_query($basedatos,$sSQL17a);
$myrow17a = mysql_fetch_array($result17a);
  }
  ?>
	
	 
    
    
    
<table border="1">
<tr>
<td>Total Factura</td>
<td></td>
</tr>
    
<tr>
<td>SubTotal</td>
<td><?php echo '$'.number_format($myrow17a['importe'],2);?></td>
</tr>


<tr>
<td>Iva</td>
<td><?php echo '$'.number_format($myrow17a['iva'],2);?></td>
</tr>


<tr>
<td>Total</td>
<td><?php echo '$'.number_format($myrow17a['importe']+$myrow17a['iva'],2);?></td>
</tr>


<tr>
<td></td>
<td></td>
</tr>


<tr>
<td>Captura</td>
<td></td>
</tr>


<tr>
<td>Importe</td>
<td><?php echo '$'.number_format($importe[0],2);?></td>
</tr>


<tr>
<td>(-)Oferta</td>
<td><?php echo '$'.number_format($oferta[0],2);?></td>
</tr>



<tr>
<td>(-)Descuento</td>
<td><?php echo '$'.number_format($descuento[0],2);?></td>
</tr>

<tr>
<td>(-)Descuento PP</td>
<td><?php echo '$'.number_format($descuentoPP[0],2);?></td>
</tr>







<tr>
<td>+IVA Captura</td>
<td><?php echo '$'.number_format($iva[0],2);?></td>
</tr>





<tr>
<td>-IVA Oferta</td>
<td><?php echo '$'.number_format($tivaOferta[0],2);?></td>
</tr>


<tr>
<td>-IVA Descuento</td>
<td><?php echo '$'.number_format($tivaDescuento[0],2);?></td>
</tr>

<tr>
<td>-IVA Descuento PP</td>
<td><?php echo '$'.number_format($tivaDescuentoPP[0],2);?></td>
</tr>

<tr>
<td>Gasto (no incluye IVA)</td>
<td><?php echo '$'.number_format($myrow17a['gastos'],2);?></td>
</tr>



<tr>
<td>+IVA TOTAL</td>
<?php
if($myrow17a['gastos']>0){
$sSQL39e= "
	SELECT 
*
FROM
TASA
WHERE 

valorTasa>0";
$result39e=mysql_db_query($basedatos,$sSQL39e);
$myrow39e = mysql_fetch_array($result39e);
   $ivaGasto= $myrow17a['gastos']*($myrow39e['valorTasa']*0.01); 
}
$ivaT=$iva[0]-$tivaOferta[0]-$tivaDescuento[0]-$tivaDescuentoPP[0];
?>
<td><?php echo '$'.number_format($iva[0]-$tivaOferta[0]-$tivaDescuento[0]-$tivaDescuentoPP[0],2);?></td>
</tr>

<tr>
<td>Total</td>
<td>
<?php 

 $subTotalCaptura=$importe[0]-($oferta[0]+$descuento[0]+$descuentoPP[0])+$ivaT;




$subTotal=$myrow17a['importe']+$myrow17a['iva'];
$total=$subTotal-$subTotalCaptura;
$TOTAL=$subTotal-$subTotalCaptura;


 if($total>-1 and $total<1){           
     
     if($subTotal>$subTotalCaptura){
$total=$subTotal-$subTotalCaptura;
     $total=$subTotalCaptura-$total;    
     }else{
   $total=$subTotalCaptura-$subTotal;
     $total=$subTotalCaptura-$total;
     }//es menor la cantidad
     }
echo '<br>';
echo '$'.number_format($total,2);    
?>        
</td>
</tr>



</table> 
        
        
        <br></br>        
        
        
        
        
        
        
        
        

    
    <div align="center">
      <label>
 
       <input name="up" type="Submit" value="Solicitar Devolucion"   />
      <br />
      <?php 

      //echo '<br>';
      //echo '<span class="normal">Total Factura: '.'$'.number_format($totalInvoice,2).'</span>';
      //echo '<br>';
      //echo '<span class="normal">Total Captura: '.'$'.number_format($totalCapturado,2).'</span>';
      //echo '<br>';
      //echo '<span class="normal">Diferencia: '.'$'.number_format($totalInvoice-$totalCapturado,2).'</span>';
     
	  if( $left[0]==$right[0]){ ?>
	  <br>
      <input name="devolver" type="Submit" value="Devolver Articulos" onClick="if(confirm('&iquest;Est&aacute;s seguro que deseas devolver estos articulos?') == false){return false;}"  />
       </br>
       <?php } ?>
	  </label>
      <label>
    
      </label>
    </div>
        
        
        
        
        
        
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp;    </p>
  <p><script>
		new Autocomplete("descripcion", function() { 
			this.setValue = function( id ) {
				document.getElementsByName("keyPA")[0].value = id;
			}
			
			// If the user modified the text but doesn't select any new item, then clean the hidden value.
			if ( this.isModified )
				this.setValue("");
			
			// return ; will abort current request, mainly used for validation.
			// For example: require at least 1 char if this request is not fired by search icon click
			if ( this.value.length < 1 && this.isNotClick ) 
				return ;
			
			// Replace .html to .php to get dynamic results.
			// .html is just a sample for you
			return "/sima/cargos/articulosx.php?entidad=<?php echo $entidad;?>&q=" + this.value;
			// return "completeEmpName.php?q=" + this.value;
		});	
	</script>
</p>
</body>
</html>
