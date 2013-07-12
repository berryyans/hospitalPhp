<?php include("/configuracion/ventanasEmergentes.php"); ?>

<?php
$campo=$_GET['campoSeguro'];
$forma=$_GET['forma'];
$campoDespliega=$_GET['campoDespliega'];



?>
<script type="text/javascript">
	function regresar(strCuenta,seguro){
		self.opener.document.<?php echo $forma;?>.<?php echo $campo;?>.value = strCuenta;
				self.opener.document.<?php echo $forma;?>.<?php echo $campoDespliega;?>.value = seguro;
				
		close();
	}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php 
$estilos= new muestraEstilos();
$estilos->styles();

?>

</head>

<body>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
    
    
    <div id="divContainer">
    <table width="200"  class="formatHTML5">    

    <tr>
        
<th width="5"   scope="col"><div align="left" >
        <div align="left">#</div>
      </div></th>        
        
      <th width="150"   scope="col"><div align="left" >
        <div align="left">Descripcion del Paquete</div>
      </div></th>

      <th width="50"  scope="col"><div align="left" >
        <div align="left">Status</div>
      </div></th>
    </tr>

      <?php 

	 
$sSQL11= "Select * from paquetes where entidad='".$entidad."'
    
ORDER BY descripcionPaquete ASC ";



$result11=mysql_db_query($basedatos,$sSQL11);
	

while($myrow11 = mysql_fetch_array($result11)){ 
$a+=1;



##VALIDACION DE PAQUETES
     if($myrow11['fechaInicial']!=null or $myrow11['fechaFinal']!=null or $myrow11['infinito']=='si'){
         
         #POR INFINTIO
         if($myrow11['infinito']=='si'){
             $on=TRUE;
         }else{
          
          #POR FECHAS
          if($fecha1>=$myrow11['fechaInicial']   and $myrow11['fechaFinal']>=$fecha1){
              $on=TRUE;
          }else{
              $on=FALSE;
          }
             
             
         }
         
         
         
     }else{
         $on=FALSE;
     }



?>
<tr  >
    
    
    <td><?php echo $a;?></td>    
    
    
    
      <td  >
        <label>
            
            
        </label>
<?php if($on===TRUE){          ?>
<a href="javascript:regresar('<?php echo $myrow11['codigoPaquete'];  ?>','<?php echo $myrow11['descripcionPaquete']; ?>');">
    <?php echo $myrow11['descripcionPaquete'];  ?>
</a>
<?php }else{
     echo $myrow11['descripcionPaquete'];  
}?>
      </td>
    
    
          <td   >
        <label></label>

 <?php if($on===TRUE){        
     echo 'Activo';
 } else{
     echo '---';
 }
 
 ?>

      </td>
    
    
    </tr>
    <?php }?>
  </table>
    </div>
  <tr>
    <td>
</form>
<p>&nbsp; </p>
</body>
</html>
