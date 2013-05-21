<?php require("/configuracion/ventanasEmergentes.php");?>
<script language=javascript> 
function ventanaSecundaria6 (URL){ 
   window.open(URL,"ventana6","width=600,height=600,scrollbars=YES") 
} 
</script> 

<script language=javascript> 
function ventanaSecundaria5 (URL){ 
   window.open(URL,"ventana5","width=430,height=700,scrollbars=YES") 
} 
</script> 



<script language=javascript> 
function ventanaSecundaria10 (URL){ 
   window.open(URL,"ventana10","width=430,height=700,scrollbars=YES") 
} 
</script> 


<?php



if($_POST['grabar'] AND $_POST['codigoPaquete']  and $_POST['descripcionPaquete']){
$sSQL1= "Select * From paquetes WHERE entidad='".$entidad."' and codigoPaquete = '".$_POST['codigoPaquete']."'  ";
$result1=mysql_db_query($basedatos,$sSQL1);
$myrow1 = mysql_fetch_array($result1);
echo mysql_error();


if(!$myrow1['codigoPaquete']){

$agrega = "INSERT INTO paquetes (
codigoPaquete,descripcionPaquete,usuario,fecha,hora,entidad,seguro) 
values ('".$_POST['codigoPaquete']."','".$_POST['descripcionPaquete']."','".$usuario."','".fecha1."','".$hora1."',
'".$entidad."','".$_POST['seguro']."')";
mysql_db_query($basedatos,$agrega);
echo mysql_error();

echo 'Se agrego el artículo al paquete';
echo '<script type="text/vbscript">
msgbox "SE AGREGO EL ARTICULO AL PAQUETE... "
</script>';
echo '<script language="JavaScript" type="text/javascript">
  <!--
    opener.location.reload(true);
self.close();
  // -->
</script>';
} else {

$sql="UPDATE paquetes
set
descripcionPaquete='".$_POST['descripcionPaquete']."',
seguro='".$_POST['seguro']."',
usuario='".$usuario."',
fecha='".$fecha1."',

hora='".$hora1."'
where 
entidad='".$entidad."' and codigoPaquete = '".$_POST['codigoPaquete']."'  ";
mysql_db_query($basedatos,$sql);
echo mysql_error();
echo '<script language="JavaScript" type="text/javascript">
  <!--
    opener.location.reload(true);

  // -->
</script>';
echo 'YA EXISTE ESTE PAQUETE, SE ACTUALIZO';
echo '<script type="text/vbscript">
msgbox "YA EXISTE ESTE PAQUETE, SE ACTUALIZO"
</script>';

}
}
?>

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
<form id="form1" name="form1" method="post" action="">
<h1 align="center" class="style11">NUEVO/MODIFICAR PAQUETE	   </h1>
   <table width="396" class="table-forma">

     <tr>
       <td width="13"  scope="col">&nbsp;</td>
       <td width="75"  scope="col"><div align="left">C&oacute;digo </div>         
       <label></label></td>
	   
	   
<?php   
$sSQL= "Select * From paquetes where keyPAQ='".$_GET['keyPAQ']."'";
$result=mysql_db_query($basedatos,$sSQL); 
$myrow2 = mysql_fetch_array($result);
?>
	   
       <td width="386"  scope="col"><div align="left">
         <input name="codigoPaquete" type="text"  id="codigoPaquete" 
		 value="<?php echo $myrow2['codigoPaquete']; ?>"/>
       </div></td>
     </tr>
     <tr>
       <td width="13"  scope="col">&nbsp;</td>
       <td  ><div align="left">Descripci&oacute;n  </div></td>
       <td  >
	   <input name="descripcionPaquete" type="text"  id="descripcionPaquete" 
	   value ="<?php echo $myrow2['descripcionPaquete']; ?>" size="70"/></td>
     </tr>
     <tr>
       <td  scope="col">&nbsp;</td>
       <td >&nbsp;</td>
       <td >&nbsp;</td>
     </tr>
     <tr>
       <td width="13"  scope="col">&nbsp;</td>
       <td >&nbsp;</td>
       <td ><input name="grabar" type="submit"  id="grabar" value="Agregar Paquete" /></td>
     </tr>
   </table>
   <p>&nbsp;</p>
</form>
</body>
</html>
