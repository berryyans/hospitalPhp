<?php require('/configuracion/ventanasEmergentes.php');require('/configuracion/funciones.php');?>
<?php  
if($_GET['keyR']>0 AND ($_GET['inactiva'] or $_GET['activa'])){

    
    
    
$sSQL12= "
	SELECT *
FROM
    OC

WHERE keyR='".$_GET['keyR']."'";


$result12=mysql_db_query($basedatos,$sSQL12);
$myrow12 = mysql_fetch_array($result12);    
    
	if($_GET['inactiva']=="inactiva"){
if($myrow12['keyR']!=NULL){            
$q = "delete from OC

		WHERE keyR='".$_GET['keyR']."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();
	}

        }

}
?>







<?php  
if(($_GET['notaCredito']=='si' or $_GET['notaCredito']=='no') and $_GET['keyR'] AND ($_GET['inactiva'] or $_GET['activa'])){
//****ACTUALIZAR NC*******





	if($_GET['notaCredito']=="no"){
$q = "UPDATE OC set 
notaCredito=''
		WHERE keyR='".$_GET['keyR']."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();   
	} else if($_GET['notaCredito']=="si"){
$q = "UPDATE OC set 
notaCredito='si'
		WHERE keyR='".$_GET['keyR']."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();   
	}



}
?>


















<?php 
function noRound($val, $pre = 0) {
    $val = (string) $val;
    if (strpos($val, ".") !== false) {
        $tmp = explode(".", $val);
        $val = $tmp[0] .".". substr($tmp[1], 0, $pre);
    }
    return (float) $val;
} 
/*
echo round(0.164654651, 2); // 0.165
echo "\n";
echo noRound(0.164654651, 2); // 0.164
*/
?>








<?php 

if($_POST['update'] ){ 
$precioSugerido=$_POST['precioSugerido'];$costo=$_POST['costo'];
$keyR=$_POST['keyR'];$cantidad=$_POST['cantidad'];$notaCredito=$_POST['notaCredito'];$tipoEntrada=$_POST['tipoEntrada'];
$descuentoPorcentaje=$_POST['descuentoPorcentaje'];$descuentoPP=$_POST['descuentoPP'];$porcentajeOferta=$_POST['porcentajeOferta'];
$ivaDescuentoPP=$_POST['ivaDescuentoPP'];


$q1 = "UPDATE compras
    set 
descuentoPP='".$descuentoPP."',
    ivaDescuentoPP='".$ivaDescuentoPP."'
WHERE 
entidad='".$entidad."'
    and
factura='".$_GET['id_factura']."'
    and
    proveedor='".$_GET['proveedor']."'
        
";
mysql_db_query($basedatos,$q1);
echo mysql_error();


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





$q1 = "UPDATE compras
    set 
status='sent'
WHERE 
entidad='".$entidad."'
    and
factura='".$_GET['id_factura']."'
    and
    proveedor='".$_GET['proveedor']."'
        
";
mysql_db_query($basedatos,$q1);
echo mysql_error();


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
id_proveedor='".$_GET['proveedor']."'
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
    //$ct=$cantidad[$i]*$myrow8ac['cajaCon'];
}else{
    //$ct=$cantidad[$i];
}

$ct=$cantidad[$i];
//****************************************************************





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




//DEPRECATED
//$karticulos=new kardex();
//$karticulos-> movimientoskardex('entrada',$ct,'ENTRADA POR COMPRAS',$tipoEntrada[$i],$usuario,$fecha1,$hora1,$myrow3ae['almacen'],$_GET['departamento'],$keyPA[$i],$myrow3a['codigo'],$entidad,$basedatos);











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
('".$myrow3a['codigo']."','".$myrow8acd['evento']."',
    '".$myrow8acd['tipoMovimiento']."',
    '".$myrow8acd['descripcion']."','".$myrow8acd['naturaleza']."',
        '".$usuario."','".$fecha1."',
        '".$hora1."',
    '".$entidad."','".$myrow8ac['keyPA']."','".$_POST['almacenDestino1']."',
        '".$_POST['almacenDestino1']."',
        '".$myrow8acb['costo']."',
        '".$ca."','".$ca."','".$myrow8ac['descripcion']."','".$myrow8ac1e['entrada']."',
            '".$myrow8ac1e['entrada']."',
        '".$myrow8acd['otro']."','".$myrow8acd['descripcion']."',
            '".$myrow8acd['tipoMovimiento']."',
            '".$myrowk['almacenConsumo']."','ENTRADA',
                '".$myrow8ac['cajaCon']."','final','".$myrow8ac['cbarra']."',
                '".$numSolicitud."'
         )";

mysql_db_query($basedatos,$q1ab);
echo mysql_error();
//CIERRO AFECTACION DE KARDEX*******















if($myrowrd['notaCredito']!='si'){
$agrega = "INSERT INTO entradaArticulos (
codigo,keyPA,gpoProducto,cantidad,tipoVenta,entidad,tipoMov,fecha,hora,usuario,almacen,factura,tipo,status,costo)
values
('".$myrow8ac['codigo']."','".$myrow8ac['keyPA']."','".$myrow8ac['gpoProducto']."','".$ct."','".$myrow['tipoVenta']."','".$entidad."','entrada',
    '".$fecha1."','".$hora1."','".$usuario."','".$myrow3ae['almacen']."','".$_GET['id_factura']."','".$tipoEntrada[$i]."','standby','".$costo[$i]."')";
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











}


//**********conversion a unidades***********
$entrance=new entradas();
$entrance=$entrance->entradaInventarios($costo,$numSolicitud,'01','si',$almacen,$fecha1,$hora1,$_GET['id_factura'],$usuario,$entidad,$basedatos);
//******************************************
} 


//DEPRECATED
//**********ACTUALIZA KARDEX**************
//$actualizaK=new ActualizaKardex();
//$actualizaK=$actualizaK-> updateKardex($usuario,$entidad,$basedatos);
//*******CIERRA ACTUALIZAR KARDEX*********









#ACTUALIZAR PRECIOS EN TIEMPO REAL
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



        
        
$porcentajePS=1-round(($myrow7a['nivel1']/$myrow7a['nivel3']),2);
$nivel1=($myrow1['costo']+($myrow1['costo']*$myrow1bd['porcentaje'])/100);
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













echo '
<script>
window.alert("Factura Enviada");
window.opener.document.forms["form1"].submit();
window.close();
</script>';

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
<h1><br />

    <?php echo 'Proveedor: '.$_GET['descripcionProveedor'];?>

</h1>

  <form id="form1" name="form1" method="post" >
    <p align="center"><span ><a href="javascript:ventanaSecundaria7('catalogoPatente.php')">PAT
	</a>
	</span>
	---
	    
	<span ><a href="javascript:ventanaSecundaria7('catalogoGenericos.php')">GEN
	</a>	</span>
	---

    <span ><a href="javascript:ventanaSecundaria7('catalogoMateriales.php')">MAT
	</a>	</span>
	---

    <span ><a href="javascript:ventanaSecundaria7('catalogoVarios.php')">VARIOS
	</a>	</span>
	---

    <span ><a href="javascript:ventanaSecundaria7('catalogoControlados.php')">CONT
	</a>	</span>	</p>
    <p align="center" >
        <a href="javascript:ventanaSecundaria17('ventanaAgregarArticulos.php?descripcionProveedor=<?php echo $_GET['descripcionProveedor'];?>&proveedor=<?php echo $_GET['proveedor'];?>&id_factura=<?php echo $_GET['id_factura'];?>&departamento=<?php echo $_GET['departamento'];?>&req=<?php echo $_GET['req'];?>')">CARGAR ARTICULOS </a></p>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <table width="950" class="table table-striped">
      <tr >
        

                <th width="68"   scope="col">
              <p>#</p>
         
        </th>
          
          
          
          <th width="68"   scope="col">
           
                   <p> keyPA     </p>       
            
       </th>
          
        
        <th width="283"  scope="col">
           
              <p>Descripcion</p>
           
       </th>
        
                <th width="91"  scope="col"> 
          
              <p>TipoEntrada</p>
        
        </th>
        
        
        <th width="80"  scope="col"><p><span >Cantidad</span></p></th>
    <th width="91"  scope="col"> 
      
              <p> Costo</p>
       
    </th>
        
                <th width="91"  scope="col"> 
           
              <p> SubTotal</p>
     
       </th>
      
        
                <th width="86"  scope="col">
         
            <p>Sugerido</p>
      
        </th>
        
                <th width="86"  scope="col">
          
            <p> Oferta %</p>
  
        </th>

        
        
        <th width="56"  scope="col">
          
            <p> Desc %</p>
      
        </th>
        
                <!--td width="86"  scope="col"><div align="left" >
          <div align="left">
            <p> Desc % PP</p>
          </div>
        </div></td-->
        
                <th width="126"  scope="col">
          
            <p> Desc Cant</p>
        
        </th>
        
        
        <th width="35"  scope="col">
            <p><span >Total</span>
        </p></th>
    
    
        <th width="48"  scope="col">
           
              <p>NC</p>
    
        </th>

    
    
    
        
    <th width="48"  scope="col">
           
              <p>Eliminar</p>
    
        </th>
        
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
<?php	
/*
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
*/

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
echo mysql_error();
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
   
   
$oferta[0]+=$ofertaD*$myrow['cantidad'];//este multiplica cantidades


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
   }else{
       $tivaDescuentoD=NULL;
   }


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



        
        
$porcentajePS=1-round(($myrow7a['nivel1']/$myrow7a['nivel3']),2);
$nivel1=($myrow1['costo']+($myrow1['costo']*$myrow1bd['porcentaje'])/100);
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
if($myrow['notaCredito']=='si'){
$ivaNC=($precioDerivado*$myrow['cantidad'])*($myrow39e['tasaGP']*0.01);
}//cierra nota de credito
}
//CIERRA TOTALES




if($myrow['notaCredito']=='si'){
$nCT[0]+= ($precioDerivado*$myrow['cantidad'])+$ivaNC;
    $notaCredito[0]+=($myrow['precioUnitario']*$myrow['cantidad'])+$ivaNC;
}
?>

    <tr  >
    




        

        <input name="bandera" type="hidden" id="bandera" value="<?php echo $bandera;?>" />
          <td height="21" bgcolor="<?php echo $color;?>" ><?php echo $bandera;?></td>
        
        <td height="21" bgcolor="<?php echo $color;?>" ><?php echo $myrow['keyPA'];?></td>
        <td bgcolor="<?php echo $color;?>" >
		<?php 
		echo $myrow['descripcionArticulo']; 
		echo '<br>';
		
		if($myrow['notaCredito']=='si'){
		echo '<span class="codigos">[Nota de Credito]</span>';		
		}
		
		if($myrow39e['descripcionGP']!=NULL){
		echo '<br>';
		echo '<span >['. 		$myrow39e['descripcionGP']      .']</span>';		
        }
        
        
if($myrow39e['tasaGP']>0){
    echo  '<br>';
    echo '<span class="success"><blink>IVA</blink></span>';
    
}
		?>
		  <input type="hidden" name="keyR[]"  value="<?php echo $myrow['keyR'];?>" />
          <input type="hidden" name="keyPA[]" value="<?php echo $myrow['keyPA'];?>" /></td>
          
        
        <td bgcolor="<?php echo $color;?>" >


            
<select name="tipoEntrada[]"   />        
<option
      <?php if($myrow['tipoEntrada']=='compra'){echo 'selected=""';}?>
      value="compra" >Normal</option>

  <option
      <?php if($myrow['tipoEntrada']=='donacion'){echo 'selected=""';}?>
      value="donacion" >Donado</option>      
      
  <option
      <?php if($myrow['tipoEntrada']=='regalo'){echo 'selected=""';}?>
      value="regalo" >Regalo</option>
 
  <option
      <?php if($myrow['tipoEntrada']=='consignacion'){echo 'selected=""';}?>
      value="consignacion" >Consignacion</option>
      
        </select>
        </td>  

        
        
        <td bgcolor="<?php echo $color;?>" >
	<input  name="cantidad[]" type="text" size="3" value="<?php echo $myrow['cantidad']; ?>"  autocomplete="off" <?php  if($myrow['status']=='notaCredito')echo 'readonly=""';?>/>		
        </td>
        
        <td bgcolor="<?php echo $color;?>" >
        <label>
        <input  name="costo[]" type="text"  size="6" value="<?php echo $myrow['precioUnitario']; ?>" autocomplete="off"  <?php  if($myrow['status']=='notaCredito')echo 'readonly=""';?>/>
	</label>
        </td>
        

<td bgcolor="<?php echo $color;?>" >
<?php //aqui va el subtotal

echo '$'.number_format($myrow['precioUnitario']*$myrow['cantidad'],2);
?>	

        </td>

                
                

        <td bgcolor="<?php echo $color;?>" >


		<?php if($myrow39e['politicaPrecios']=='si' and $myrow['precioSugerido']<1){
			$ob[0]+=1;
			 echo $ed='<div id="subDiv2" name="subDiv2" title="Subdivision Div Element" style="color: #FF00FF;border: 1px dashed red;">';
		}else{
			echo  $ed='<div >';
			
		}
			?>
			
            		
            
            
            
     <?php if($myrow39e['afectaPS']){?>       
<input name="precioSugerido[]"  type="text"  size="6" value="<?php echo $myrow['precioSugerido']; ?>" autocomplete="off" <?php  if($myrow['status']=='notaCredito')echo 'readonly=""';?>/>		
<?php }else{?>
<div class="success">N/A</div>
<input name="precioSugerido[]"  type="hidden"  size="6" value="<?php echo $myrow['precioSugerido']; ?>" />		
    
<?php }?>
</td>















<td bgcolor="<?php echo $color;?>" >
	
<input name="porcentajeOferta[]"  type="text"  size="6" value="<?php echo $myrow['porcentajeOferta']; ?>" autocomplete="off" <?php  if($myrow['status']=='notaCredito')echo 'readonly=""';?>/>		
        
<?php //aqui va la oferta

if($myrow['porcentajeOferta']>0){

echo number_format($ofertaD,2); 
echo '<br>';
echo number_format($ivaOfertaD,2);    
}
?>

</td>



                
<td bgcolor="<?php echo $color;?>" >

            
<input name="descuentoPorcentaje[]"  type="text"  size="6" value="<?php echo $myrow['descuentoPorcentaje']; ?>" autocomplete="off" <?php  if($myrow['status']=='notaCredito')echo 'readonly=""';?>/>		


<?php 
//DESCUENTO PORCENTAJE
if($myrow['descuentoPorcentaje']>0){
echo number_format($descuentoD,2); 
echo '<br>';
echo number_format($tivaDescuentoD,2); 
}
?>
        </td>
        
        
        
                <!--td bgcolor="<?php echo $color;?>" >

<input name="descuentoPorcentajePP[]"  type="text"  size="6" value="<?php echo $myrow['descuentoPorcentajePP']; ?>" autocomplete="off" <?php  if($myrow['status']=='notaCredito')echo 'readonly=""';?>/>		

<?php
//DESCUENTO PORCENTAJE PP
if($myrow['descuentoPorcentajePP']>0){
echo number_format($descuentoPPD+$ivaDescuentoPPD,2); 
}

?>
</td-->
        
        
        
        
                <td bgcolor="<?php echo $color;?>" >
<?php //aqui va el descuento en cantidad
echo '$'.number_format($precioDerivado,2); 
?>	

        </td>
        
        
        <td bgcolor="<?php echo $color;?>" >
            <div align="center">
                <span > 
<?php 
if($myrow['tipoEntrada']!='regalo' and $myrow['tipoEntrada']!='donacion'){

//TOTALES******
$importe[0]+=$myrow['precioUnitario']*$myrow['cantidad'];

$st[0]+=$precioDerivado*$myrow['cantidad'];
echo '$'.number_format($precioDerivado*$myrow['cantidad'],2);   
}else{
echo '$'.number_format("0.00",2);    
}

?>
                </span></div>
        </td>
        
       
        
        
      <td bgcolor="<?php echo $color;?>" ><div align="center">
          <?php if($myrow['notaCredito']=='si'){ ?>
        <span class="Estilo24"> <a   href="enviarSolicitud1.php?proveedor=<?php echo $_GET['proveedor'];?>&id_factura=<?php echo $_GET['id_factura'];?>&descripcionProveedor=<?php echo $_GET['descripcionProveedor'];?>&keyR=<?php echo $myrow['keyR'];?>&inactiva=si&notaCredito=no"> 
                <img src="../imagenes/btns/checkbtn.png" alt="Almac&eacute;n &oacute; M&eacute;dico Activo" width="18" height="18" border="0" onMouseover="showhint('Presiona aqui para cambiar el status del articulo..', this, event, '150px')" onClick="if(confirm('&iquest;Est&aacute;s seguro que deseas inactivar este registro?') == false){return false;}" /></a>
        <?php } else { ?>
        <a href="enviarSolicitud1.php?proveedor=<?php echo $_GET['proveedor'];?>&id_factura=<?php echo $_GET['id_factura'];?>&descripcionProveedor=<?php echo $_GET['descripcionProveedor'];?>&keyR=<?php echo $myrow['keyR'];?>&inactiva=si&notaCredito=si"> <img src="../imagenes/btns/lockbtn.png" alt="INACTIVO" width="18" height="18" border="0"  onclick="if(confirm('Esta seguro que deseas activar este registro?') == false){return false;}" /></a>
        <?php } ?>
        </span>
          </div>
      </td>
        
        
        <td bgcolor="<?php echo $color;?>" ><div align="center">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>?keyClientesInternos=<?php echo $myrow112['keyClientesInternos']; ?>&amp;seguro=<?php echo $_POST['seguro']; ?>&amp;inactiva=<?php echo'inactiva'; ?>&amp;tipoAlmacen=<?php echo $_POST['tipoAlmacen']; ?>&amp;codigo=<?php echo $C; ?>&amp;almacenDestino1=<?php echo $_GET['almacenDestino1'];?>&amp;keyR=<?php echo $myrow['keyR'];?>&id_factura=<?php echo $_GET['id_factura'];?>&proveedor=<?php echo $_GET['proveedor'];?>&departamento=<?php echo $_GET['departamento'];?>&req=<?php echo $_GET['req'];?>&id_proveedor=<?php echo $_GET['proveedor'];?>&importeFactura=<?php echo $_GET['importeFactura'];?>&ivaFactura=<?php echo $_GET['ivaFactura'];?>&keyc=<?php echo $_GET['keyc'];?>&descripcionProveedor=<?php echo $_GET['descripcionProveedor'];?>"> <img src="/sima/imagenes/btns/cancelabtn.png" alt="Almac&eacute;n &oacute; M&eacute;dico Activo" width="16" height="16" border="0" onClick="if(confirm('&iquest;Est&aacute;s seguro que deseas activar la nota de credito?') == false){return false;}" /></a></div>
        </td>
        
        
        
      </tr>
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
 $sSQL17a= "Select * From compras WHERE entidad='".$entidad."' and  proveedor='".$_GET['proveedor']."' and factura='".$_GET['id_factura']."'
";
$result17a=mysql_db_query($basedatos,$sSQL17a);
$myrow17a = mysql_fetch_array($result17a);
  }
  ?>
	
	 
<div id="conterprin">    
<div id="cont1"> 
 
    
<table class="table-forma">

    
<tr>
<th>Total Factura</th>
<td><?php echo '$'.number_format($myrow17a['importe'],2);?></td>
</tr>

</table>
<br />
<table class="table-forma">
<tr>
<th>Iva facturado</th>
<td><?php echo '$'.number_format($myrow17a['iva'],2);?></td>
</tr>




</table>

<div id="cont2">
<table class="table-forma">
<tr>
<th>Captura</th>
<th></th>
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
<td><b>(-)Capturar Descuento PP</b></td>
<td>
    <input  size="5" name="descuentoPP" value="<?php echo $myrow17a['descuentoPP'];?>"></input>
</td>
</tr>







<tr>
<td>(+)IVA </td>
<td><?php echo '$'.number_format($iva[0],2);?></td>
</tr>





<tr>
<td>(-)IVA Oferta</td>
<td><?php echo '$'.number_format($tivaOferta[0],2);?></td>
</tr>


<tr>
<td>(-)IVA Descuento</td>
<td><?php echo '$'.number_format($tivaDescuento[0],2);?></td>
</tr>

<tr>
<td><b>(-) Capturar IVA Descuento PP</b></td>
<td>
  <input  size="5" name="ivaDescuentoPP" value="<?php echo $myrow17a['ivaDescuentoPP'];?>"></input>
</td>
</tr>

<tr>
<td>Gasto (no incluye IVA)</td>
<td><?php echo '$'.number_format($myrow17a['gastos'],2);?></td>
</tr>


<tr>
<td>(=)IVA TOTAL</td>
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
$ivaT=($iva[0]+$ivaGasto)-($tivaOferta[0]+$tivaDescuento[0]+$myrow17a['ivaDescuentoPP']);
?>
<td>
<?php 
echo '$'.number_format($ivaT,2);

?>

</td>
</tr>


<tr>
<td>(-) Nota de Credito</td>
<td><?php echo '$'.number_format($nCT[0],2);?></td>
</tr>

<tr>
<td>TOTAL IMPORTE</td>
<td>
<?php 

$subTotalCaptura=($importe[0]+$iva[0]+$myrow17a['gastos']);
$subTotalCaptura=$subTotalCaptura-($oferta[0]+$descuento[0]+$myrow17a['descuentoPP']);

$subTotal=$myrow17a['importe']+$myrow17a['gastos'];
$total=$subTotal-($subTotalCaptura);
$TOTAL=$subTotal-$subTotalCaptura;

/*
 if($total>-1 and $total<1){           
     
     if($subTotal>$subTotalCaptura){
$total=$subTotal-$subTotalCaptura;
     $total=$subTotalCaptura-$total;    
     }else{
   $total=$subTotalCaptura-$subTotal;
     $total=$subTotalCaptura-$total;
     }//es menor la cantidad
     }*/





$tt=($myrow17a['importe']+$myrow17a['gastos'])-$t;

//echo '$'.number_format(($subTotalCaptura),2);
$tare=  noRound(($importe[0]+$myrow17a['gastos']+($iva[0]+$ivaGasto-($tivaOferta[0]+$tivaDescuento[0]+$myrow17a['ivaDescuentoPP'])))-($oferta[0]+$descuento[0]+$myrow17a['descuentoPP']),2);


$c= (float) ($myrow17a['importe']-$tare);
if(($c>=-0.96 and $c<=0.03 )or ($c>0 and $c<=0.30)){
    $subt=($myrow17a['importe']-$tare);
    $total=$myrow17a['importe'];
}else{
    $total=(float) $tare;
}

print '$'. noRound($total,2);
//echo '$'.$total;
?>        
</td>

</tr>


</table>

</div>
</div>
 </div> 
<br /><br />
<div id="cont3">
<table class="table-forma">
<tr>
<th>Redondeo/Diferencia</th>
<td>
<?php 


//////************************



print '$'.noRound($subt,2);    

//echo '$'. noRound($a,2);





//echo '$'.noRound( $tare);
?>        
</td>
</tr>

</table> 
       
        <br></br>        


    
    <div align="center">
      <label>
      <input name="update" type="submit" id="update" value="Actualizar Datos" />
      
      <br />
      <?php 

      //echo '<br>';
      //echo '<span >Total Factura: '.'$'.number_format($totalInvoice,2).'</span>';
      //echo '<br>';
      //echo '<span >Total Captura: '.'$'.number_format($totalCapturado,2).'</span>';
      //echo '<br>';
      //echo '<span >Diferencia: '.'$'.number_format($totalInvoice-$totalCapturado,2).'</span>';
      $total= noRound($myrow17a['importe'],2)-noRound($tare+$subt+$myrow17a['notaCredito'],2);
	  if( $total==0){ ?>
	  <br>
      <input name="send" type="submit" src="../imagenes/btns/sendsolicitud.png" id="send" value="Enviar Solicitud" onClick="if(confirm('&iquest;Est&aacute;s seguro que deseas enviar la solicitud?') == false){return false;}"  <?php if($total>1 ){ echo 'disabled=""';}?>/>
       </br>
       <?php } ?>
	  </label>
      <label>
    
      </label>
    </div>
        
        
     </div>    
        

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