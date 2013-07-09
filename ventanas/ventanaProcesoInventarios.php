<?PHP require("/configuracion/ventanasEmergentes.php"); require("/configuracion/funciones.php");?>


<script language=javascript> 
function ventanaSecundaria2 (URL){ 
   window.open(URL,"ventanaSecundaria2","width=800,height=800,scrollbars=YES") 
} 
</script> 



<script type="text/javascript">
    function setfocus(a_field_id) {
        $(a_field_id).focus()
    }
</script>

<script>
function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "Este campo s�lo acepta n�meros."
        return false
    }
    status = ""
    return true
}
</script>
<?php
   ini_set("memory_limit",'256M');   
$hoy = date("d/m/Y");
$hora = date("g:i a");
$myrow=null;

$sSQL3= "Select * From listas WHERE keylistas='".$_GET['keylistas']."' ";
$result3=mysql_db_query($basedatos,$sSQL3);
$myrow3 = mysql_fetch_array($result3);   
$_POST['almacenDestino']=$myrow3['almacen'];
$_POST['anaquel']=$myrow3['anaquel'];


?>




<?php

$hoy = date("d/m/Y");
$hora = date("g:i a");




if($_POST['vaciar']){
$codigo=$_POST['codigo'];




if($_POST['anaquel'] and  $_POST['anaquel']!='*'){


 $sSQL8a= "
SELECT *
FROM
existencias
WHERE
entidad='".$entidad."'
and

almacen='".$_POST['almacenDestino']."'
and
anaquel='".$_POST['anaquel']."'    
";
$result8a=mysql_db_query($basedatos,$sSQL8a);
while($myrow8a = mysql_fetch_array($result8a)){




  $q = "DELETE FROM articulosExistencias WHERE 
entidad='".$entidad."'
and
codigo='".$myrow8a['codigo']."'  
and
almacen='".$_POST['almacenDestino']."'
";

mysql_db_query($basedatos,$q);
echo mysql_error();
}


}else{
  $q = "DELETE FROM articulosExistencias WHERE 
entidad='".$entidad."'
and
almacen='".$_POST['almacenDestino']."'
";

mysql_db_query($basedatos,$q);
echo mysql_error();

}



?>
<script>
window.alert("Se quitaron articulos de este almacen");
</script>
<?php
$tipoMensaje='registrosAgregados';
$encabezado='Exitoso';
$texto='Almacen/Anaquel Vaciado!';
}





?>














<?php 
$fecha1=date("Y-m-d");
$hora1= date("H:i a");

if($_POST['ajustarExistencias']!=NULL){  
$keyE=$_POST['keyE'];
$gpoProducto=$_POST['gpoProducto'];
$descripcion=$_POST['descripcion'];
$cBarra=$_POST['cBarra'];
$existencia=$_POST['cantidadTotal'];
for($i=0;$i<=$_POST['pasoBandera'];$i++){

if($existencia[$i]>0){
  
$q1 = "UPDATE existencias set 
existencia='".$existencia[$i]."',status='standby'


WHERE keyE='".$keyE[$i]."'";
mysql_db_query($basedatos,$q1);
echo mysql_error();

$agrega = "INSERT INTO logs (
descripcion,almacenSolicitante,almacenDestino,usuario,hora,fecha,entidad,folioVenta,cuartoIngreso,cuartoTransferido,codigo,cantidad)
values
('Ajuste a Existencias','".$_GET['almacen']."','".$_GET['almacen']."',
'".$usuario."','".$hora1."','".$fecha1."','".$entidad."','',
'','','".$keyE[$i]."','".$existencia[$i]."')";
mysql_db_query($basedatos,$agrega);
echo mysql_error();

}
}
$tipoMensaje='registrosAgregados';
$encabezado='Exitoso';
$texto='Se actualizaron datos!';
}?>


<script>

function confirmReset() {
    var r = confirm('Are you sure?');
    
    if (r == true) {
        this.form.submit();
    } else {
        alert('it didnt work');
    }
    return false;                       
}
</script>

        <script type="text/javascript" src="/sima/js/editp/spec/support/jquery.js"></script>
        <script type="text/javascript" src="/sima/js/editp/spec/support/jquery.ui.js"></script>
        <script type="text/javascript" src="/sima/js/editp/lib/jquery.editinplace.js"></script>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php

$estilos= new muestraEstilos();
$estilos-> styles();

?>

</head>
    <br>
   
<h1 align="center" >
    <br />
    

CONFIGURACION DE EXISTENCIAS

<br />
 <h2>
        <?php echo $_GET['descripcionAlmacen'];?>
    </h2>
   <label>
   <?php
    if($texto!=NULL){
    $mostrarMensajes=new informacion();
    $mostrarMensajes->mostrarMensajes($encabezado,$tipoMensaje,$id,$texto,$basedatos);
    }
    ?>
  </label>




</h1>
    
    
    
    
<form name="form10" method="post" >
 
  



<div id="divContainer">
  <table width="400" class="formatHTML5" >

      
      
    <tr >
<th width="10"  align="left"><font size="1" face="Comic Sans MS,arial,verdana">#</font></th>
      <th width="100"  align="left"><font size="1" face="Comic Sans MS,arial,verdana">Descripcion</font></th>
            <th width="150"  align="left"><font size="1" face="Comic Sans MS,arial,verdana">Cantidad</font></th>
 
      

      <th width="10"  align="left"></th>
    </tr>
      
      
      
    
        
        
        
        
     
        
        

	 
        
        
      
      
      
      
      
<?php	
$sSQL3= "Select * From listas WHERE keylistas='".$_GET['keylistas']."' ";
$result3=mysql_db_query($basedatos,$sSQL3);
$myrow3 = mysql_fetch_array($result3);   



    
    //filtrar por anaquel
if($myrow3['anaquel']=='*'){
    
    
    
$sSQL1= "SELECT 
*
FROM 

existencias
WHERE
entidad='".$entidad."' 
and
almacen='".$myrow3['almacen']."'


order by descripcion ASC
";

    
    
}   else{ 

$sSQL1= "SELECT 
*
FROM 

existencias
WHERE
entidad='".$entidad."' 
and
almacen='".$myrow3['almacen']."'
and
anaquel='".$myrow3['anaquel']."'
and
descripcion!=''

order by descripcion ASC
";

}










$result1=mysql_db_query($basedatos,$sSQL1);
while($myrow1 = mysql_fetch_array($result1)){

$a+=1;










    $sSQL8ac= "
SELECT * 
FROM
articulos
WHERE
entidad='".$entidad."'
and
codigo='".$myrow1['codigo']."'
";
$result8ac=mysql_db_query($basedatos,$sSQL8ac);
$myrow8ac = mysql_fetch_array($result8ac);




//SOLO DEBE MOSTRAR LOS ARTICULOS ACTIVOS
if($myrow8ac['activo']=='A'){
?>
 <input name="keyE[]" type="hidden"  value="<?php echo $myrow1['keyE']; ?>" />      
      
      
      
<?php if($myrow['cbarra']){ echo ltrim($myrow['cbarra']);} ?>
    <tr >
      
        <td ><font size="1" face="Comic Sans MS,arial,verdana"><?php echo $a;?></font></td>
        
        


      <input name="keyPA[]" type="hidden"  value="<?php echo $myrow1['keyPA']; ?>" />

<td >
<font size="1" face="Comic Sans MS,arial,verdana">
    <?php 

echo $myrow8ac['descripcion'].', '.$myrow8ac['descripcion1'].','.$myrow8ac['sustancia'].'
    '.'<span class="precio1">'.$myrow8ac['gpoProducto'].'</span>';
if($myrow1['anaquel']!=null){
echo     '<span >, Anaquel: '.$myrow1['anaquel'].'</span>';
}
          
/*          
          
<a  href="javascript:ventanaSecundaria2('/sima/cargos/listaAlmacenesTodos.php?codigo=<?php echo $codigo; ?>&amp;seguro=<?php echo $_GET['seguro']; ?>&amp;medico=<?php echo $_GET['medico']; ?>&amp;usuario=<?php echo $usuario; ?>&amp;keyPA=<?php echo $myrow1['keyPA']; ?>&amp;gpoProducto=<?php echo $myrow8ac['gpoProducto'];?>')" onMouseover="showhint('Presiona aqui para asignar almacenes a este articulo...', this, event, '150px')">
Editar
</a>     	*/	?>     
</font>

      </td>
        
     
<td id="<?php echo $myrow1['keyE']; ?>"><font size="1" face="Comic Sans MS,arial,verdana">


    <script type="text/javascript">




	// A select input field so we can limit our options
	$("#<?php echo $myrow1['keyE']; ?>").editInPlace({
		//callback: function(unused, enteredText) { return enteredText; },
                url: "/sima/cargos/server2.php",
		field_type: "text"});
	
</script>
    <div align="left">
<?php 
if($myrow1['existencia']>0){
echo (int) $myrow1['existencia'];
}else{
    echo 'Editar';
}
?>
    </div>
    </font>
</td>

      
        
        
        
        
      <td ><font size="1" face="Comic Sans MS,arial,verdana">
 <?php //echo $myrow2['cantidadTotal'];?>
      </font></td>
       
        
        
        
        
        
        
        
        


     
    </tr>
<?php  }}?>
    <tr>
     
    </tr>
  </table>
</div>    
<br>
    <br>
<p align="center">&nbsp;</p>
  <div align="center" class="informativo"><strong>
   
	<?php if($a>0){
	//echo "Se encontraron $a registros..!"; 
	}
	?>
	</strong></div>
  <p align="center">
    <label>

    <input name="pasoBandera" type="hidden" id="pasoBandera" value="<?php echo $a; ?>"  />

    
   
    <?php /*if($a>0){?>
 <font size="1" face="Comic Sans MS,arial,verdana">
<input  name="ajustarExistencias" type="submit" value="Ajustar Existencias"	/>


</font>
    <?php }*/
	?>

    </label>
    <input name="almacenes" type="hidden" id="almacen" value="<?php echo $ali; ?>" />
    <input name="anaquel1" type="hidden" id="anaquel1" value="<?php echo $_POST['anaquel']; ?>" />
  </p>
</form>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
</body>
</html>
