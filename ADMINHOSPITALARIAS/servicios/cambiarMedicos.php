<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php'); require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');



if($_POST['actualizar'] AND $_POST['particular']>-1 AND $_POST['aseguradora']>-1){





if($_GET['keyAPN']){


  


$q = "UPDATE articulosPrecioNivel set 
nivel1='".$_POST['particular']."', 
nivel3='".$_POST['aseguradora']."', 
usuario='".$usuario."'
WHERE 
keyAPN='".$_GET['keyAPN']."'";
mysql_db_query($basedatos,$q);
echo mysql_error();
} 

echo $leyenda="Se actualizaron precios";
?>
<script language="JavaScript" type="text/javascript">
  <!--
window.opener.document.forms["form2"].submit();
window.alert("Se cambio el precio");
    window.close();
  // -->
</script>



<?php
}





?>
<?php
$estilos= new muestraEstilos();
$estilos->styles();

?>


</head>
<form name="form1" method="post" >
  <img src="../../imagenes/bordestablas/borde1.png" width="279" height="24" />
  <table width="279" border="0" align="center" cellpadding="3" cellspacing="0" class="style7">
    <tr>
	<?php 
	if($_POST['codigo']){
	$code=$_POST['codigo'];
	} else {
	$code=$_GET['codigo'];
	}
	
$sSQL15="SELECT descripcion,generico
FROM
articulos
WHERE
codigo = '".$_GET['codigo']."'";
  $result15=mysql_db_query($basedatos,$sSQL15);
  $myrow15 = mysql_fetch_array($result15);

$sSQL6="SELECT nivel1,nivel3
FROM
`articulosPrecioNivel`
WHERE
keyPA = '".$_GET['keyAPN']."' order by keyAPN DESC ";
  $result6=mysql_db_query($basedatos,$sSQL6);
  $myrow6 = mysql_fetch_array($result6);

  $nivel1=$myrow6['nivel1'];
  $nivel3=$myrow6['nivel3'];
  
$sSQL6a="SELECT nivel1,nivel3
FROM
`articulosPrecioNivel`
WHERE
keyAPN = '".$_GET['keyAPN']."'  ";
  $result6a=mysql_db_query($basedatos,$sSQL6a);
  $myrow6a = mysql_fetch_array($result6a);
  
  if($myrow6a['nivel1'] and $myrow6a['nivel3']){
  $nivel1=$myrow6a['nivel1'];
  $nivel3=$myrow6a['nivel3'];
  }
  
  
  ?>
      <td colspan="3" bgcolor="#FFFF00"><div align="center" class="none"><?php 

	  
	  echo $myrow15['descripcion']?></div></td>
    </tr>
	
	
	
<tr>
      <td width="6" bgcolor="#CCCCCC">&nbsp;</td>
      <td width="166" bgcolor="#CCCCCC"><div align="left" class="normalmid">Particular</div></td>
      <td width="90" bgcolor="#CCCCCC"><input name="particular" type="text" class="camposmid" value="<?php echo $nivel1;?>" size="15" /></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="left"></div></td>
      <td bgcolor="#CCCCCC"><div align="left" class="normalmid">Compa&ntilde;&iacute;a / Aseguradora </div></td>
      <td bgcolor="#CCCCCC"><input name="aseguradora" type="text" class="camposmid"  value="<?php echo $nivel3;?>" size="15">        &nbsp;</td>
    </tr>
  </table>
  <img src="../../imagenes/bordestablas/borde2.png" width="279" height="24" />
  <p align="center">
    <label>
    <input name="actualizar" type="submit" src="../../imagenes/btns/refresh.png" id="actualizar" value="Ajustar">
    </label>


  </p>
</form>
