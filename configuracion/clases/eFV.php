<?PHP 
require('/Constantes.php');
class desplegarFV{
public function eFV($numero,$FV,$random,$usuario,$entidad,$basedatos){ 
?> 
<script language=javascript> 
function ventanaSecundaria11 (URL){ 
   window.open(URL,"ventanaSecundaria11","width=800,height=600,scrollbars=YES") 
} 
</script> 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<?php
$estilos= new muestraEstilos();
$estilos->styles();
?>
</head>



<?php 
$sSQL7e="SELECT paciente,almacen,fechaCierre
FROM
clientesInternos
WHERE
folioVenta='".$FV."'
";
$result7e=mysql_db_query($basedatos,$sSQL7e);
$myrow7e = mysql_fetch_array($result7e);
?>
<body>
 <h1 align="center">
 <?php echo $numero;
 echo '</br>';
 ?>
  <a href="#" 
onclick="javascript:ventanaSecundaria11('<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/cargos/despliegaCargos.php?numeroE=<?php echo $myrow['numeroE']; ?>&amp;nCuenta=<?php echo $myrow['nCuenta']; ?>&amp;almacen=<?php echo $ALMACEN; ?>&amp;almacenFuente=<?php echo $ALMACEN; ?>&amp;nT=<?php echo $myrow['keyClientesInternos']; ?>&amp;tipoCliente=<?php echo $tipoCliente;?>&amp;tipoMovimiento=<?php echo 'cierreCuenta';?>&amp;tipoPaciente=interno&amp;folioVenta=<?php echo $FV;?>')">
 <?php print $FV.'   '.$myrow7e['paciente']; ?>
 </a>
 </h1>
    <p align="center"><br />
    <?php 

    $sSQL7ea="SELECT descripcion
FROM
almacenes
WHERE
almacen='".$myrow7e['almacen']."'
";
$result7ea=mysql_db_query($basedatos,$sSQL7ea);
$myrow7ea = mysql_fetch_array($result7ea);
echo $myrow7ea['descripcion'];
if($myrow7e['fechaCierre']){
echo '<br>';
echo 'Fecha Cierre: '.cambia_a_normal($myrow7e['fechaCierre']);
}
    ?>
    </p>
<form id="form2" name="form2" method="post" >
  <div align="center">
   
<?php   
$sSQL= "Select gpoProducto From cargosCuentaPaciente where entidad='".$entidad."' and folioVenta='".$FV."' 
and
gpoProducto!=''
group by gpoProducto

";
$result=mysql_db_query($basedatos,$sSQL); 
?>

</div>
  <table width="514" border="0" align="center">
     <tr>
       <th width="75" bgcolor="#660066" scope="col"><div align="left"><span class="blanco">C&oacute;digo GP</span></div></th>
       <th width="251" bgcolor="#660066" scope="col"><div align="left"><span class="blanco">Descripci&oacute;n de Productos </span></div></th>
       <th width="60" bgcolor="#660066" scope="col"><div align="left"><span class="blanco">Ingresos</span></div></th>
       <th width="45" bgcolor="#660066" scope="col"><div align="left"><span class="blanco">IVA</span></div></th>
       <th width="61" bgcolor="#660066" scope="col"><div align="left"><span class="blanco">Detalles</span></div></th>
    </tr>
     <tr>
<?php	
while($myrow = mysql_fetch_array($result)){
	
if($col){
$color = '#FFCCFF';
$col = "";
} else {
$color = '#FFFFFF';
$col = 1;
}



//*******************NORMAL***********************
$sSQL7="SELECT sum(efectivo) as efectivos,sum(efectivo*porcentaje) as ivar
FROM
reportesFinancieros
WHERE
random='".$random."'
and
folioVenta='".$FV."'
and
gpoProducto='".$myrow['gpoProducto']."'
and
naturaleza='C'";
$result7=mysql_db_query($basedatos,$sSQL7);
$myrow7 = mysql_fetch_array($result7);

$sSQL7d="SELECT sum(efectivo) as efectivos,sum(efectivo*porcentaje) as ivar
FROM
reportesFinancieros
WHERE
random='".$random."'
and
folioVenta='".$FV."'
and
gpoProducto='".$myrow['gpoProducto']."'
and
naturaleza='A' ";
$result7d=mysql_db_query($basedatos,$sSQL7d);
$myrow7d = mysql_fetch_array($result7d);

$despliega='reportexGPOAD';
//****************************************************








$efectivo[0]+=$myrow7['efectivos'];
$ivar[0]+=$myrow7['ivar'];

$efectivoD[0]+=$myrow7d['efectivos'];
$ivarD[0]+=$myrow7d['ivar'];



$sSQL7c="SELECT *
FROM
gpoProductos
WHERE
entidad='".$entidad."'
and
codigoGP='".$myrow['gpoProducto']."'   ";
$result7c=mysql_db_query($basedatos,$sSQL7c);
$myrow7c = mysql_fetch_array($result7c);
?>
       <td bgcolor="<?php echo $color?>" class="normalmid"><span class="style7">
       
         <label>
         <?php echo $myrow['gpoProducto'];?>         </label>
       </span></td>
       <td bgcolor="<?php echo $color?>" class="normalmid">
	   <span class="style71">
	   <?php echo $myrow7c['descripcionGP'];?>	   </span>	

          </td>
    <td bgcolor="<?php echo $color?>" class="normalmid"><?php 
	//echo $myrow7['efectivos'].' '.$myrow7d['efectivos'];
	//echo '<br>';
	
	echo "$".number_format($myrow7['efectivos']-$myrow7d['efectivos'],2); 
	 
	   ?> </td>
       <td bgcolor="<?php echo $color?>" class="normalmid">
	   <?php 

	  if($myrow7['ivar']>0){
	  echo "$".number_format($myrow7['ivar']-$myrow7d['ivar'],2); 
	 } else{
	 echo '$'.'0.00';
	 }
	   ?></td>
       <td bgcolor="<?php echo $color?>" class="normalmid"><div align="center">
         <?php if($myrow7['efectivos']){ ?>
<a href="#" 
onclick="javascript:ventanaSecundaria1('<?php echo $despliega;?>.php?fecha=<?php echo $_POST['fecha']; ?>&amp;gpoProducto=<?php echo $myrow['gpoProducto']; ?>&amp;almacen=<?php echo $almacen; ?>&amp;almacenFuente=<?php echo $myrow['almacenSolicitante']; ?>&amp;nT=<?php echo $nT; ?>&amp;tipoCliente=<?php echo $tipoCliente;?>&amp;tipoMovimiento=<?php echo 'cierreCuenta';?>&amp;fechaInicial=<?php echo $fechaInicial;?>&amp;fechaFinal=<?php echo $fechaFinal;?>&folioVenta=<?php echo $FV;?>&random=<?php echo $_GET['random'];?>')"><img src="../../imagenes/btns/detailsbtn.png" width="18" height="18" border="0" /></a>
         <?php } else { 
		echo '---';
		}
		?>
       </div></td>
     </tr>
     
    
    <?php 
	
	}//cierra while?>
     
     
  </table>

  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <th colspan="2" scope="col">Subtotales</th>
    </tr>
    <tr>
      <th width="97" scope="col"><div align="left">SubTotal</div></th>
      <th width="87" scope="col"><div align="left"><?php print '$'.number_format($efectivo[0]-$efectivoD[0],2);?></div></th>
    </tr>
    <tr>
     
    </tr>
    <tr>
      <th scope="col"><div align="left">IVA</div></th>
      <th scope="col"><div align="left"><?php print '$'.number_format($ivar[0]-$ivarD[0],2);?></div></th>
    </tr>
    <tr>
      <td><div align="left">TOTAL</div></td>
      <td><div align="left"><?php 
	  
	  print '$'.number_format(($efectivo[0]-$efectivoD[0])+($ivar[0]-$ivarD[0]),2);?></div></td>
    </tr>
  </table>
  
  

</form>
 <p align="center">&nbsp;</p>
</body>
</html>
<?php 
} 
}
?>