<?php
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$hoy = date("d/m/Y");
$hora = date("g:i a");

$sSQL31= "Select  * From articulos WHERE entidad='".$entidad."' and keyPA = '".$_GET['keyPA']."'";
$result31=mysql_db_query($basedatos,$sSQL31);
$myrow31 = mysql_fetch_array($result31);

if(!$_GET['codigo']){
 $_GET['codigo']=$myrow31['codigo'];   
}


if($_POST['actualizar'] AND $_GET['codigo'] and $_POST['costo']>0){



//*********************SECCION DE COSTOS***********************************


////***compruebo si existe en la DB
//
//$agregaSaldo = "INSERT INTO precioArticulos ( codigo,usuario,fecha,hora,ID_EJERCICIO,costo,entidad,status
//) values ('".$_POST['codigo']."',
//'".$usuario."','".$fecha1."','".$hora1."','".$ID_EJERCICIOM."','".$_POST['costo']."','".$entidad."')";
//mysql_db_query($basedatos,$agregaSaldo);

//*****************************CIERRA SECCION DE COSTOS***********************

//$sSQL6t="SELECT *
//FROM
//  almacenes
//WHERE
//entidad='".$entidad."'
//    and
//almacen = '".$agregar[$i]."'
//  ";
//  $result6t=mysql_db_query($basedatos,$sSQL6t);
//  $myrow6t = mysql_fetch_array($result6t);
//
//if($myrow6t['porcentajeparticular']>0){
//$nivel1=$_POST['costo']+($_POST['costo']*($myrow6t['porcentajeparticular']/100));
//}
//
//if($myrow6t['porcentajeaseguradora']>0){
//$nivel3=$_POST['costo']+($_POST['costo']*($myrow6t['porcentajeaseguradora']/100));
//}


$sSQL39e= "
	SELECT 
*
FROM
gpoProductos
WHERE 

codigoGP='".$myrow31['gpoProducto']."'";
$result39e=mysql_db_query($basedatos,$sSQL39e);
$myrow39e = mysql_fetch_array($result39e);


if($myrow39e['politicaPrecios']=='si'){
	if($_POST['precioSugerido']>0){
		
$q = "insert into precioArticulos
(
codigo, costo,usuario,fecha,hora,entidad,keyPA,	status,almacen,descripcion,descripcionalmacen,precioSugerido
)
values
('".$_GET['codigo']."','".$_POST['costo']."','".$usuario."','".$fecha1."',
'".$hora1."','".$entidad."','".$_POST['keyPA']."','request',
'".$agregar[$i]."','".$myrow6['descripcion']."','".$myrow6t['descripcion']."','".$_POST['precioSugerido']."')";
mysql_db_query($basedatos,$q);
echo mysql_error();		
		$tipoMensaje='registrosAgregados';
$encabezado='Exitoso';
$texto='SE AGREGO EL COSTO...';
		
}else{
$tipoMensaje='error';
$encabezado='ERROR!!!';
$texto='ESTE ARTICULO REQUIERE EL PRECIO SUGERIDO...!';
}





}else{
$q = "insert into precioArticulos
(
codigo, costo,usuario,fecha,hora,entidad,keyPA,	status,almacen,descripcion,descripcionalmacen,precioSugerido
)
values
('".$_GET['codigo']."','".$_POST['costo']."','".$usuario."','".$fecha1."',
'".$hora1."','".$entidad."','".$_POST['keyPA']."','request',
'".$agregar[$i]."','".$myrow6['descripcion']."','".$myrow6t['descripcion']."','".$_POST['precioSugerido']."')";
mysql_db_query($basedatos,$q);
echo mysql_error();
		$tipoMensaje='registrosAgregados';
$encabezado='Exitoso';
$texto='SE AGREGO EL COSTO...';
}




}





?>



















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<?php
$showStyles=new muestraEstilos();
$showStyles->styles();
?>

	

</head>

<h1>
	   <label>
   <?php
    if($texto!=NULL){
    $mostrarMensajes=new informacion();
    $mostrarMensajes->mostrarMensajes($encabezado,$tipoMensaje,$id,$texto,$basedatos);
    }
    ?>
  </label>   
</h1>

<body>

<form id="form2" name="form2" method="POST" >
  <table width="260" class="table-forma">
    <tr>
	<?php 

	
$sSQL15="SELECT descripcion
FROM
`articulos`
WHERE
entidad='".$entidad."' AND
codigo = '".$_GET['codigo']."'";
  $result15=mysql_db_query($basedatos,$sSQL15);
  $myrow15 = mysql_fetch_array($result15);


  $sSQL5="SELECT *
FROM
  `precioArticulos`
WHERE entidad='".$entidad."' AND
codigo = '".$_GET['codigo']."'   order by keyC DESC
  ";
  $result5=mysql_db_query($basedatos,$sSQL5);
  $myrow5 = mysql_fetch_array($result5);
  ?>
      <td colspan="20"><span ><?php echo $myrow15['descripcion'];?></span></td>
    </tr>
    <tr>
      <td width="87">Ultimo Costo</td>
      <td width="163">
      <input name="costo" type="text"  id="costo" value="<?php echo $myrow5['costo'];?>"></input>
      </td>
    </tr>
      
          <tr>
      <td width="87">Precio Sugerido *(Opcional)</td>
      
      
      
      

    
 	  
 	  
 	  <td width="163">			
      <input name="precioSugerido" type="text"  id="costo" value="<?php echo $myrow5['precioSugerido'];?>"></input>
     </td>
   
    </tr>
      
                <tr>
      <td width="87">Ultima Actualizacion</td>
      <td width="163">
      	<div align="left" >
      <?php echo cambia_a_normal($myrow5['fecha']).' a las: '.$myrow5['hora'].', por: '.$myrow5['usuario'];?>
      </div>
      </td>
    </tr>
      
      
  </table>
  <p align="center">
    <label>
        <?php if($tipoUsuario=='administrador'){?>        
    <input name="actualizar" type="submit"  id="actualizar" value="Ajustar"></input>
        <?php }else{ ?>
          <div align="center" >
              <blink>Solo Administrador puede hacer cambios...</blink>    
          </div>
              <?php }?>
    
    
    </label>

   
        	        <input name="opcion" type="hidden"  id="opcion" value="<?php echo $_POST['opcion'];?>" />
      <input name="keyPA" type="hidden"  id="actualizar" value="<?php echo $_GET['keyPA'];?>" />
  </p>
</form>
 <p align="center">&nbsp;</p>
</body>
</html>