<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/operacioneshospitalariasmenu/compras/menucompras.php"); require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');?>
<?php  
if($_GET['codigo'] AND ($_GET['inactiva'] or $_GET['activa'])){

	if($_GET['inactiva']=="inactiva"){
$q = "UPDATE articulos set 

		activo='I'
		WHERE keyPA='".$_GET['keyPA']."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();
	} else if($_GET['activa']=="activa"){
 $q = "UPDATE articulos set 

		activo='A'
		WHERE keyPA='".$_GET['keyPA']."'";
		mysql_db_query($basedatos,$q);
		echo mysql_error();
	}



}
?>

<SCRIPT LANGUAGE="JavaScript">
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
</SCRIPT>

<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana","width=350,height=189,scrollbars=YES") 
} 
</script> 
<script language=javascript> 
function ventanaSecundaria2 (URL){ 
   window.open(URL,"ventana2","width=660,height=800,scrollbars=YES") 
} 
</script> 


<script language=javascript> 
function ventanaSecundaria6 (URL){ 
   window.open(URL,"ventana6","width=450,height=170,scrollbars=YES") 
} 
</script> 

<script language=javascript> 
function ventanaSecundaria7 (URL){ 
   window.open(URL,"ventana7","width=450,height=170,scrollbars=YES") 
} 
</script> 

<script language=javascript> 
function ventanaDetalles (URL){ 
   window.open(URL,"ventanaDetalles","width=450,height=170,scrollbars=YES") 
} 
</script> 

<?php 
$fecha1=date("Y-m-d");
$hora1= date("H:i a");

if($_GET['actualizar']){
$keyPA=$_GET['keyPA'];
$gpoProducto=$_GET['gpoProducto'];
$descripcion=$_GET['descripcion'];
$cBarra=$_GET['cBarra'];
for($i=0;$i<=$_GET['bandera'];$i++){
if($keyPA[$i]!=NULL){
$q1 = "UPDATE articulos set 
descripcion='".$descripcion[$i]."',

cbarra='".$cBarra[$i]."',
fechaActualizacion='".$fecha1."',

hora='".$hora1."'


WHERE keyPA='".$keyPA[$i]."'";
mysql_db_query($basedatos,$q1);
echo mysql_error();
}
}?>

<script language="JavaScript1.2">

/*
Nudging text by Matthias (info@freejavascripts.f2s.com)
Modified by Dynamic Drive to function in NS6
For this script and more, visit http://www.dynamicdrive.com
*/

//configure message
message="Se actualizaron datos!"
//animate text in NS6? (0 will turn it off)
ns6switch=1

var ns6=document.getElementById&&!document.all
mes=new Array();
mes[0]=-1;
mes[1]=-4;
mes[2]=-7;mes[3]=-10;
mes[4]=-7;
mes[5]=-4;
mes[6]=-1;
num=0;
num2=0;
txt="";
function jump0(){
if (ns6&&!ns6switch){
jump.innerHTML=message
return
}
if(message.length > 6){
for(i=0; i != message.length;i++){
txt=txt+"<span style='position:relative;' id='n"+i+"'>"+message.charAt(i)+"</span>"};
jump.innerHTML=txt;
txt="";
jump1a()
}
else{
alert("Your message is to short")
}
}

function jump1a(){
nfinal=(document.getElementById)? document.getElementById("n0") : document.all.n0
nfinal.style.left=-num2;
if(num2 != 9){
num2=num2+3;
setTimeout("jump1a()",50)
}
else{
jump1b()
}
}

function jump1b(){
nfinal.style.left=-num2;
if(num2 != 0){num2=num2-3;
setTimeout("jump1b()",50)
}
else{
jump2()
}
}

function jump2(){
txt="";
for(i=0;i != message.length;i++){
if(i+num > -1 && i+num < 7){
txt=txt+"<span style='position:relative;top:"+mes[i+num]+"'>"+message.charAt(i)+"</span>"
}
else{txt=txt+"<span>"+message.charAt(i)+"</span>"}
}
jump.innerHTML=txt;
txt="";
if(num != (-message.length)){
num--;
setTimeout("jump2()",50)}
else{num=0;
setTimeout("jump0()",50)}}
</script>
<?php 
}
?>


<script src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/js/prototype.js" type="text/javascript"></script>
<!-- set focus to a field with the name "searchcontent" in my form -->


<script language="JavaScript1.2">

//Highlight form element- � Dynamic Drive (www.dynamicdrive.com)
//For full source code, 100's more DHTML scripts, and TOS,
//visit http://www.dynamicdrive.com

var highlightcolor="lightyellow"

var ns6=document.getElementById&&!document.all
var previous=''
var eventobj

//Regular expression to highlight only form elements
var intended=/INPUT|TEXTAREA|SELECT|OPTION/

//Function to check whether element clicked is form element
function checkel(which){
if (which.style&&intended.test(which.tagName)){
if (ns6&&eventobj.nodeType==3)
eventobj=eventobj.parentNode.parentNode
return true
}
else
return false
}

//Function to highlight form element
function highlight(e){
eventobj=ns6? e.target : event.srcElement
if (previous!=''){
if (checkel(previous))
previous.style.backgroundColor=''
previous=eventobj
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor
}
else{
if (checkel(eventobj))
eventobj.style.backgroundColor=highlightcolor
previous=eventobj
}
}

</script>
<?php
echo $_GET['buscar'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
$estilos= new muestraEstilos();
$estilos->styles();
?>
<?php if(!$_GET['criterio']){ ?>
<script>

function stopRKey(evt) {
var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if ((evt.keyCode == 13) && (node.type=="text")) {return false;}
}
document.onkeypress = stopRKey;
</script>
<?php } ?>


</head>

<body>

<h1 align="center" class="titulos">Ajustar Inventario</h1>
<?php 


if(!$_GET['criterio']){
$_GET['criterio']=$_GET['criterios'];
}
?>







</head>


<h2><div id="jumpx" style="color:green"></div></h2>
<script>
if (document.all||document.getElementById){
jump=(document.getElementById)? document.getElementById("jumpx") : document.all.jumpx
jump0()
}
else
document.write(message)
</script>
<form method="get" name="Form2"  onKeyUp="highlight(event)" onClick="highlight(event)">

  <p align="center" class="negro">
    <label></label>
  </p>
  <table width="684" border="0" align="center">
    <tr>
      <td width="169"><span class="negro">Introduce el texto a buscar</span></td>
      <td width="142"><span class="negro">
        <input name="criterio" type="text" class="campos" size="22" maxlength="150"  onChange="stopRKey()"/>
        <script>
document.Form2.criterio.focus();
</script>
      </span></td>
      <td width="95"><span class="negro">
        <input type="image" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/btns/searcharticles.png"  value="Buscar" />
      </span></td>
      <td width="113"><span class="negro">Mostrar Registros</span></td>
      <td width="143"><span class="negro">
        <label>
        <input name="registros" type="text" class="campos" id="registros" value="<?php if($_GET['registros']==NULL){ echo '30';} else { echo $_GET['registros'];}?>" size="3" maxlength="3" onKeyPress="return checkIt(event)"/>
        </label>
      </span></td>
    </tr>
  </table>
  <p align="center" class="negro">&nbsp;</p>
  <table width="814" border="2" align="center" cellpadding="1" cellspacing="1" bordercolor="#FFFF00" bgcolor="#0000FF">
    <tr>

      <th width="356" bgcolor="#660066" scope="col"><div align="left" class="blanco">
        <div align="left">Descripci&oacute;n</div>
      </div></th>
      <th width="81" bgcolor="#660066" scope="col"><div align="left" class="blanco">
        <div align="left">Grupo</div>
      </div>      </th>
      <th width="79" bgcolor="#660066" scope="col"><div align="left">Particular</div></th>
      <th width="91" bgcolor="#660066" scope="col"><div align="left">Aseguradora</div></th>
      <th width="74" bgcolor="#660066" scope="col"><div align="left" class="blanco">
        <div align="left">Almacenes</div>
      </div></th>
      <th width="98" bgcolor="#660066" scope="col"><div align="left" class="blanco">
        <div align="left">Ajustar Precio</div>
      </div></th>
    </tr>
	
<?php 	
//inicializo el criterio y recibo cualquier cadena que se desee buscar
$criterio = "";
if ($_GET["criterio"]!="" and $_GET["criterio"]!='*'){
	$txt_criterio = $_GET["criterio"];
	if(is_numeric($_GET["criterio"])){
	$criterio = " where cbarra= '".$txt_criterio."'";
	}else {
	$criterio = " where (descripcion like '%" . $txt_criterio . "%' or descripcion1 like '%" . $txt_criterio . "%') order by descripcion ASC";
	}
} else if($_GET["criterio"]=='*'){
$criterio = "order by descripcion ASC";
}



if($_GET['criterio']){
$ssql = "select * from articulos " . $criterio;
} else {
$ssql = "select * from articulos 
where
entidad='".$entidad."'
order by descripcion ASC";
}

$result = mysql_db_query($basedatos,$ssql);
$num_total_registros = mysql_num_rows($result);

//Limito la busqueda
if($_GET['registros']==NULL){
$TAMANO_PAGINA = 30;
} else {
$TAMANO_PAGINA=$_GET['registros'];
}
//examino la p�gina a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
		$inicio = 0;
		$pagina=1;
}
else {
	$inicio = ($pagina - 1) * $TAMANO_PAGINA;
}

//miro a ver el n�mero total de campos que hay en la tabla con esa b�squeda

//calculo el total de p�ginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

if($_GET['criterio']){
 $ssql = "select * from articulos " . $criterio . "  limit " . $inicio . "," . $TAMANO_PAGINA;
} else {
  $ssql = "select * from articulos where descripcion !=''  order by descripcion ASC limit " . $inicio . "," . $TAMANO_PAGINA;
}

$result = mysql_db_query($basedatos,$ssql);
?>
	
	
    <tr>
      <?php

while($myrow = mysql_fetch_array($result)){

$totalRegistros+=1;

$codigo=$code = $myrow['codigo'];
$sSQL52="SELECT count(*) as totalRegedit
FROM
existencias
WHERE entidad='".$entidad."' AND
codigo = '".$code."'  
  ";
  $result52=mysql_db_query($basedatos,$sSQL52);
  $myrow52 = mysql_fetch_array($result52);
  
$i=$myrow52['totalRegedit'];
 $sSQL5="SELECT *
FROM
  `precioArticulos`
WHERE entidad='".$entidad."' AND
codigo = '".$code."'  
  ";
  $result5=mysql_db_query($basedatos,$sSQL5);
  $myrow5 = mysql_fetch_array($result5);

$sSQL51="SELECT *
FROM
existencias
WHERE entidad='".$entidad."' AND
codigo = '".$code."'  
  ";
  $result51=mysql_db_query($basedatos,$sSQL51);
  $myrow51 = mysql_fetch_array($result51);
$bali=$myrow51['almacen'];

  
  $sSQL6="SELECT *
FROM
  `articulosPrecioNivel`
WHERE entidad='".$entidad."' AND
codigo = '".$code."'  
  ";
  $result6=mysql_db_query($basedatos,$sSQL6);
  $myrow6 = mysql_fetch_array($result6);
if($col){
$color = '#FFCCFF';
$col = "";
} else {
$color = '#FFFFFF';
$col = 1;
} 
$color1='#FF3300';

$C=$myrow['codigo'];
$sSQL7="SELECT *
FROM
articulosPrecioNivel
WHERE entidad='".$entidad."' AND
codigo = '".$code."' 
  ";
  $result7=mysql_db_query($basedatos,$sSQL7);
  $myrow7 = mysql_fetch_array($result7);
  
$gpoProducto=$myrow['gpoProducto'];
$sSQL39= "
	SELECT 
prefijo,rutaModifica
FROM
gpoProductos
WHERE codigoGP='".ltrim($gpoProducto)."'";
$result39=mysql_db_query($basedatos,$sSQL39);
$myrow39 = mysql_fetch_array($result39);

?>

      <td bgcolor="<?php echo $color;?>" class="normal"><span class="codigos">
        <input name="keyPA[]" type="hidden" id="codigo" value="<?php echo $myrow['keyPA'];?>" />
        

      </span>
	  
      

      
	  <label>
        <textarea name="descripcion[]" cols="40" rows="1" wrap="physical" class="normalmid" id="descripcion[]"><?php 
		if($myrow['descripcion']){
		echo ltrim($myrow['descripcion']);
		} else  {
		echo ltrim($myrow['descripcion1']);
		}
		?></textarea>
	  </label>
			









            
            
			<label>
			<?php 
	  if(!$bali){
	   echo '<img src="'.CONSTANT_PATH_SIMA_RAIZ.'/imagenes/stop.png" alt="NO TIENE ASIGNADO NINGUN PRECIO O ALMACEN" width="13" height="13" border="0" />';
	   }
	  ?>
            <?php if($myrow['generico']=='si'){?>
            <blink> <img src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/g.jpg" alt="MEDICAMENTO GENERICO..." width="12" height="12" border="0" /> </blink>
            <?php } else { echo '';}?>   
            </label>      </td>
            
      <td bgcolor="<?php echo $color;?>" class="normal">
	  <?php 
	 $sSQL6="SELECT nivel1,nivel3
FROM
`articulosPrecioNivel`
WHERE
keyPA = '".$myrow['keyPA']."' order by keyAPN DESC";
  $result6=mysql_db_query($basedatos,$sSQL6);
  $myrow6 = mysql_fetch_array($result6);
 
	  ?>
<?php echo $myrow['gpoProducto']; ?>	    </td>
      <td bgcolor="<?php echo $color;?>" class="style71" ><?php echo '$'.number_format($myrow6['nivel1'],2);?></td>
      <td bgcolor="<?php echo $color;?>" class="style71" ><?php echo '$'.number_format($myrow6['nivel3'],2);?></td>
      <td bgcolor="<?php echo $color;?>" class="style71" ><div align="center"><span class=""> <a  href="javascript:ventanaSecundaria2('<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/cargos/listaAlmacenes.php?codigo=<?php echo $code; ?>&amp;seguro=<?php echo $_GET['seguro']; ?>&amp;medico=<?php echo $_GET['medico']; ?>&amp;usuario=<?php echo $usuario; ?>&amp;keyPA=<?php echo $myrow['keyPA']; ?>')"> <img src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/almacen.jpeg" alt="Almacenes" width="20" height="20" border="0" /></a> </span></div></td>
      <td bgcolor="<?php echo $color;?>" class="style71" ><div align="center"><span class=""><a  href="javascript:ventanaSecundaria('<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/ADMINHOSPITALARIAS/inventarios/ventanitaCambiaPrecio.php?codigo=<?php echo $code; ?>&seguro=<?php echo $_GET['seguro']; ?>&medico=<?php echo $_GET['medico']; ?>&usuario=<?php echo $usuario; ?>&keyPA=<?php echo $myrow['keyPA']; ?>')"><img src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/btns/precio.png" alt="Almacenes" width="20" height="20" border="0" /></a></span></div></td>
    </tr>
    <?php }?>
  </table>
  <p align="center">
    <input name="bandera" type="hidden" id="bandera" value="<?php echo $totalRegistros; ?>" />
    <label>
    <input name="actualizar" type="image" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/btns/refresh.png"  id="actualizar" value="Actualizar" />
    <input name="criterios" type="hidden" value="<?php echo $_GET["criterio"];?>" />
    
    </label>
    <input name="gpoProducto1" type="hidden" id="gpoProducto1" value="<?php echo $_GET['gpoProducto1']; ?>" />
</p>
</form>


<div align="center" class="normal"><?php


//pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
echo "N�mero de registros encontrados: " . $num_total_registros . "<br>";
echo "Se muestran p�ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
echo "Mostrando la p�gina " . $pagina . " de " . $total_paginas . "<p>";


//construyo la sentencia SQL
/* $ssql = "select * from articulos " . $criterio . " limit " . $inicio . "," . $TAMANO_PAGINA;
echo $ssql . "<p>"; */

/*
$rs = mysql_query($ssql);

 while ($fila = mysql_fetch_object($rs)){
	echo $fila->descripcion . "<br>";
} */

//cerramos el conjunto de resultados y la conexi�n con la base de datos
/* mysql_free_result($rs);
mysql_close($conn); 
 */
//echo "<p>";

//muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas
//echo $res=$i/$total_paginas;
$palabrasABC=32;

if ($total_paginas > 1){
	for ($i=1;$i<=$total_paginas;$i++){
		if ($pagina == $i) 
			//si muestro el �ndice de la p�gina actual, no coloco enlace
			echo $pagina . "  ";
		else
			//si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina
			echo "<a href='precios.php?pagina=" . $i . "&criterio=" . $txt_criterio . "&registros=" . $_GET['registros'] . "'>" . $i . "</a> ";
	}
}

?></div>

<?php 
if($_POST['actualizar'] AND $_POST['keyPA'] AND $_POST['descripcion']  ){

$q1 = "UPDATE articulos set 

descripcion='".$_POST['descripcion']."',

fechaActualizacion='".$fecha1."',

hora='".$hora1."',
usuario='".$usuario."'

WHERE keyPA='".$_POST['keyPA']."'";
mysql_db_query($basedatos,$q1);
echo mysql_error();
}
?>



</body>
</html>
