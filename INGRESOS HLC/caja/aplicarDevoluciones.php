<?php 
require("/Constantes.php");
require(CONSTANT_PATH_CONFIGURACION.'/ventanasEmergentes.php');


include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); 
$cargosCia=new acumulados();
$cargosParticularesCC=new  cierraCuenta();
$cargosAseguradoraCC=new cierraCuenta();
?>
<script language=javascript> 
function ventanaSecundaria4 (URL){ 
   window.open(URL,"ventana4","width=800,height=300,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script>
<script language=javascript> 
function ventanaSecundaria2 (URL){ 
   window.open(URL,"ventana2","width=630,height=500,scrollbars=YES,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script> 
<script language=javascript> 
function ventanaSecundaria1 (URL){ 
   window.open(URL,"ventana1","width=530,height=300,scrollbars=YES") 
} 
</script> 

<script language=javascript> 
function ventanaSecundaria5 (URL){ 
   window.open(URL,"ventana5","width=500,height=500,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script>

<script language=javascript> 
function ventanaSecundaria3 (URL){ 
   window.open(URL,"ventana3","width=500,height=400,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script>

<script language=javascript> 
function ventanaSecundaria6 (URL){ 
   window.open(URL,"ventana6","width=500,height=400,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script>
<script language=javascript> 
function ventanaSecundaria7 (URL){ 
   window.open(URL,"ventana7","width=500,height=600,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script>
<script language="javascript" type="text/javascript">   
//Validacion de campos de texto no vacios by Mauricio Escobar   
//   
//Iv�n Nieto P�rez   
//Este script y otros muchos pueden   
//descarse on-line de forma gratuita   
//en El C�digo: www.elcodigo.com   
  
  
//*********************************************************************************   
// Function que valida que un campo contenga un string y no solamente un " "   
// Es tipico que al validar un string se diga   
//    if(campo == "") ? alert(Error)   
// Si el campo contiene " " entonces la validacion anterior no funciona   
//*********************************************************************************   
  
//busca caracteres que no sean espacio en blanco en una cadena   
function vacio(q) {   
        for ( i = 0; i < q.length; i++ ) {   
                if ( q.charAt(i) != " " ) {   
                        return true   
                }   
        }   
        return false   
}   
  
//valida que el campo no este vacio y no tenga solo espacios en blanco   
function valida(F) {   
           
        if( vacio(F.campo.value) == false ) {   
                alert("Introduzca un cadena de texto.")   
                return false   
        } else {   
                alert("OK")   
                //cambiar la linea siguiente por return true para que ejecute la accion del formulario   
                return true   
        }   
           
}   
  
  
  
  
</script> 

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
<script type="text/javascript">
<!-- por carlitos. cualquier duda o pregunta, visita www.forosdelweb.com

var ancho=100
var alto=100
var fin=300
var x=100
var y=100

function inicio()
{
ventana = window.open("cita.php", "_blank", "height=1,width=1,top=x,left=y,screenx=x,screeny=y");
abre();
}
function abre()
{
if (ancho<=fin) {
ventana.moveto(x,y);
ventana.resizeto(ancho,alto);
x+=5
y+=5
ancho+=15
alto+=15
timer= settimeout("abre()",1)
}
else {
cleartimeout(timer)
}
}
// -->
</script>




<?php //************************ACTUALIZO **********************
//********************Llenado de datos
if(!$_GET['nT']){
$_GET['nT']=$nT;
}
if(!$bali){
$bali=$_GET['almacenFuente'];
}

 $sSQL3= "Select * From clientesInternos WHERE entidad='".$entidad."' and folioVenta = '".$_GET['folioVenta']."' ";
$result3=mysql_db_query($basedatos,$sSQL3);
$myrow3 = mysql_fetch_array($result3);
$almacenCierreCuenta=$myrow3['almacen'];
$numeroE=$myrow3['numeroE'];
$nCuenta=$myrow3['nCuenta'];
$cuarto=$myrow3['cuarto'];
//***************aplicar pago**********************

if($_POST['aplicar']){
$keyCAP=$_POST['keyCAP'];
$cantidad=$_POST['cantidad'];


//*********************************************

$sSQL333= "SELECT 
MAX(numSolicitud)+1 as NS
FROM solicitudes
WHERE entidad='".$entidad."'";

$result333=mysql_db_query($basedatos,$sSQL333);
$myrow333 = mysql_fetch_array($result333); 

if(!$myrow333['NS']){
$myrow333['NS']=1;
}

//********************************SE INCREMENTA EN 1*****************************
$agrega = "INSERT INTO solicitudes (
numSolicitud,usuario,fecha,entidad,keyClientesInternos
) values (
'".$myrow333['NS']."','".$usuario."','".$fecha1."','".$entidad."','".$_GET['keyClientesInternos']."'
)";
mysql_db_query($basedatos,$agrega);
echo mysql_error();

//**********************************************


for($i=0;$i<=$_POST['bandera'];$i++){

if($cantidad[$i]>0){


$sSQL1= "Select * From cargosCuentaPaciente WHERE keyCAP='".$keyCAP[$i]."' ";
$result1=mysql_db_query($basedatos,$sSQL1);
$myrow1 = mysql_fetch_array($result1);


if($myrow1['statusDevolucion']!='si'){
$agrega = "UPDATE cargosCuentaPaciente set 
status='devolucion',

statusDevolucion='si',
folioDevolucion='".$keyCAP[$i]."'
where
keyCAP='".$keyCAP[$i]."' 
";
mysql_db_query($basedatos,$agrega);
echo mysql_error();

//*****************************************************************************INSERTAR
//*****************VERIFICA SI ES CARGO DIRECTO***********************
$sSQL3115= "Select cargosDirectos From almacenes WHERE entidad='".$entidad."'
and
almacen='".$myrow1['almacenDestino']."' and almacenPadre='".$myrow1['almacen']."'";
$result3115=mysql_db_query($basedatos,$sSQL3115);
$myrow3115 = mysql_fetch_array($result3115);

if($myrow3115['cargosDirectos']=='si' or $myrow['statusCargo']=='cargadoR'){
$statusCargo='cargado';
}else {
$statusCargo='standby';
}


$agrega = "INSERT INTO cargosCuentaPaciente (
numeroE,nCuenta,status,usuario,fecha1,dia,cantidad,tipoTransaccion,codProcedimiento,hora1,
naturaleza,ejercicio,statusDeposito,almacen,usuarioTraslado,precioVenta,iva,seguro,
statusTraslado,tipoCliente,tipoPaciente,cantidadParticular,cantidadAseguradora,entidad,tipoCobro,statusAuditoria,tipoPago,statusCargo,porcentajeVariable,cargosHospitalarios,
almacenSolicitante,almacenDestino,keyClientesInternos,statusCaja,descripcion,statusFactura,horaSolicitud,fechaSolicitud,codigoTarjeta,ultimosDigitos,codigoAutorizacion,numeroCheque,bancoTransferencia,bancoCheque,numeroTransferencia,banderaPC,statusPC,clientePrincipal,folioVenta,codigoCaja,numRecibo,numCorte,statusDevolucion,keyE,keyPA,numeroConfirmacion,
ivaParticular,ivaAseguradora,tipoVentaArticulos,usuarioFactura,
precioOriginal,ivaOriginal,usuarioDescuento,fechaDescuento,cargoModificable,gpoProducto,folioDevolucion,numSolicitud) 
values 
('".$myrow1['numeroE']."','".$myrow1['nCuenta']."','devolucion',
'".$usuario."','".$fecha1."','".$dia1."','".$cantidad[$i]."','".$myrow1['tipoTransaccion']."','".$myrow1['codProcedimiento']."',
'".$hora1."','A','".$ID_EJERCICIOM."','','".$myrow1['almacen']."','".$usuario."',
'".$myrow1['precioVenta']."','".$myrow1['iva']."','".$myrow1['seguro']."','standby','".$myrow1['tipoCliente']."','".$myrow1['tipoPaciente']."',
'".$myrow1['cantidadParticular']."','".$myrow1['cantidadAseguradora']."','".$myrow1['entidad']."','".$myrow1['tipoCobro']."','".$myrow1['statusAuditoria']."'
,'".$myrow1['tipoPago']."','".$statusCargo."','".$myrow1['porcentajeVariable']."','".$myrow1['cargosHospitalarios']."','".$myrow1['almacenSolicitante']."','".$myrow1['almacenDestino']."','".$myrow1['keyClientesInternos']."','pagado','".$myrow1['descripcion']."','','".$hora1."','".$fecha1."','".$fecha1."','".$myrow1['codigoTarjeta']."','".$myrow1['codigoAutorizacion']."','".$myrow1['numeroCheque']."','".$myrow1['bancoTransferencia']."','".$myrow1['bancoCheque']."',
'".$myrow1['numeroTransferencia']."','".$myrow1['banderaPC']."','".$myrow1['statusPC']."','".$myrow1['clientePrincipal']."','".$myrow1['folioVenta']."','".$myrow1['codigoCaja']."','".$myrow1['numRecibo']."','".$myrow1['numCorte']."','si','".$myrow1['keyE']."','".$myrow1['keyPA']."','".$myrow1['numeroConfirmacion']."','".$myrow1['ivaParticular']."','".$myrow1['ivaAseguradora']."','".$myrow1['tipoVentaArticulos']."','".$myrow1['usuarioFactura']."',
'".$myrow1['precioOriginal']."','".$myrow1['ivaOriginal']."','".$myrow1['usuarioDescuento']."','".$myrow1['fechaDescuento']."','".$myrow1['cargoModificable']."','".$myrow1['gpoProducto']."','".$myrow1['keyCAP']."','".$myrow333['NS']."')";
mysql_db_query($basedatos,$agrega);
echo mysql_error();
//*******************************************************************************
}

}
} //cierra for
} //cierra actualizar






$cargosParticulares=new  acumulados();
$totalxSurtir=new  acumulados();
$cargosAseguradora= new acumulados();
$otros= new acumulados();
?>




























<!-Hoja de estilos del calendario --> 
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/calendario/calendar-tas.css" title="win2k-cold-1" /> 

  <!-- librer�a principal del calendario --> 
<script type="text/javascript" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/calendario/calendar.js"></script> 

 <!-- librer�a para cargar el lenguaje deseado --> 
<script type="text/javascript" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/calendario/lang/calendar-es.js"></script> 

  <!-- librer�a que declara la funci�n Calendar.setup, que ayuda a generar un calendario en unas pocas l�neas de c�digo --> 
<script type="text/javascript" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/calendario/calendar-setup.js"></script> 
  
  
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<html xmlns="http://www.w3.org/1999/xhtml">



<style type="text/css">
.Estilo1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 9px;
}
<!--
-->
</style>
<head>
<?php 
$showStyles=new muestraEstilos();
$showStyles->styles();
?>
</head>



<BODY  >
<?php //ventanasPrototype::links();?>
<h1 align="center" class="titulos">Aplicar Devoluciones</h1>
<p align="center" class="codigos">*Si esta deshabilitada la cantidad es porque el almacen no permite tener stock.</p>
<form id="form1" name="form1" method="post" action="">
  <table width="549" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#990099" class="normal">
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <th bgcolor="#330099" class="blanco" scope="col"><div align="left">Transacci&oacute;n</div></th>
      <th class="normal" scope="col"><div align="left"><?php echo $_GET['folioVenta'];
		  $nCliente=$myrow3['keyClientesInternos'];
		  ?>
          <input name="numeroE" type="hidden" class="normal" id="numeroE" 
		  value="<?php 
		 echo $nCliente=$_POST['numeroE'];
		  ?>" readonly=""/>
</label></div>      </th>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <th width="157" bgcolor="#330099" scope="col"><div align="left" class="blanco"><strong>Paciente</strong></div></th>
      <th width="385" class="normal" scope="col"><div align="left"><strong>
          <label> </label>
      </strong> <?php echo $myrow3['paciente']; ?> </div></th>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <td bgcolor="#330099" class="blanco"><div align="left">Compa&ntilde;&iacute;a</div></td>
<td class="normal"><label> <?php echo $traeSeguro=$myrow3['seguro']; ?>
            <?php
displaySeguro::despliegaSeguro($traeSeguro,$basedatos);


?>
            <input name="seguro2" type="hidden" id="seguro2" value="<?php echo $traeSeguro; ?>" />
      </label></td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <td bgcolor="#330099" class="blanco"><div align="left">N&deg; Credencial</div></td>
      <td class="normal"><?php echo $myrow3['credencial']; ?> </td>
    </tr>
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <th bgcolor="#330099" class="normal" scope="col"><div align="left" class="blanco">
        <div align="left"><strong>M&eacute;dico</strong></div>
      </div></th>
      <th class="normal" scope="col"><div align="left">
          <label> <?php echo $medico=$myrow3['medico']; ?> </label>
          <label> </label>
          <?php 
$sSQL18= "Select * From medicos WHERE entidad='".$entidad."' and numMedico ='".$medico."'";
$result18=mysql_db_query($basedatos,$sSQL18);
$rNombre18 = mysql_fetch_array($result18); 
?>
          <?php  $dr="Dr(a): ".
	  $rNombre18["apellido1"]." ".$rNombre18["apellido2"]
	  ." ".$rNombre18["apellido3"]." ".$rNombre18["nombre1"]." ".$rNombre18["nombre2"];?> </div></th>
    </tr>
  </table>
  <p align="center" class="error"><em>*Introduce la cantidad que deseas devolver...</em> <br />
    <input type="image" src='../imagenes/btns/cargadevolucion.png' name="aplicar" id="button" value="Aplicar Cambios" />
  </p>
  
  
  
  
  
  
  
  
  
  
  <table width="1000" border="0" align="center">
    <tr bgcolor="#330099">
      <th width="40" class="blanco" scope="col"><div align="center"><span class="blanco ">Ref</span></div></th>
     
      <th width="82" height="14" class="blanco" scope="col"><div align="center"><span class="blanco ">Fecha/Hora </span></div></th>
      <th width="264"  scope="col"><div align="center"><span class="blanco ">Descripci&oacute;n/Concepto</span></div></th>
      <th width="68"  scope="col"><div align="center"><span class="blanco ">Almacen</span></div></th>
      <th width="42"  scope="col"><div align="center"><span class="blanco ">Status</span></div></th>
      <th width="28"  scope="col"><div align="center"><span class="blanco ">N </span></div></th>
      <th width="51"  scope="col"><div align="center"><span class="blanco ">Tipo P </span></div></th>
      <th width="21"  scope="col" class="blanco"><div align="center">C</div></th>
      <th width="62"  scope="col"><div align="left" class="blanco">
        <div align="center">Devolver</div>
      </div></th>
      <th width="66"  scope="col"><div align="center"><span class="blanco ">P.Unit</span></div></th>
      <th width="57"  scope="col"><div align="center"><span class="blanco ">CargosP</span></div></th>
      <th width="59"  scope="col"><div align="center"><span class="blanco ">CargosA</span></div></th>
      <th width="52"  scope="col"><div align="center"><span class="blanco ">IVA</span></div></th>
      <th width="50"  scope="col"><div align="center"><span class="blanco ">Abonos</span></div></th>
    </tr>
	
      <?php //traigo agregados
	  

$sSQL81= "
SELECT 
*,cargosCuentaPaciente.descripcion as descripcionGeneral
FROM
cargosCuentaPaciente
 WHERE 
 cargosCuentaPaciente.entidad='".$entidad."'
 and
cargosCuentaPaciente.folioVenta='".$_GET['folioVenta']."'
and 
cargosCuentaPaciente.status!='cancelado'
and
gpoProducto!=''
order by fecha1 DESC
 ";

$result81=mysql_db_query($basedatos,$sSQL81);
while($myrow81 = mysql_fetch_array($result81)){ 



$a+=1;
$art = $myrow81['codProcedimiento'];
$codigo=$proc=$myrow81['codProcedimiento'];
$keyCAP=$myrow81['keyCAP'];



$style='normal';



		$sSQL14a= "
SELECT 
descripcion
FROM
articulos
WHERE 
keyPA='".$myrow81['keyPA']."'
";
$result14a=mysql_db_query($basedatos,$sSQL14a);
$myrow14a = mysql_fetch_array($result14a);




?>	
	
	
	

      
      <tr bgcolor="#FFFFFF" onMouseOver="bgColor='#ffff33'" onMouseOut="bgColor='#ffffff'" >
      <td bgcolor="<?php echo $color;?>" class="<?php echo $style;?>"><?php echo $myrow81['keyCAP'];?>
      <input type="hidden" name="keyCAP[]" id="keyCAP[]" value="<?php echo $myrow81['keyCAP'];?>"/>      </td>






      <td height="21" bgcolor="<?php echo $color;?>" class="<?php echo $style;?>"><div align="center"><span class="<?php echo $estilo;?>">
        <?php echo $myrow81['hora1']." ".cambia_a_normal($myrow81['fecha1']);
	?></span></div></td>
	

	
	
      <td bgcolor="<?php echo $color;?>">
	  <div align="left">
	  
	  <span class="<?php echo $style;?>">
        <?php 
				if($myrow81['descripcionGeneral']){	
					echo $myrow81['descripcionGeneral'];
					}else{
					$descripcion=new articulosDetalles();
					$descripcion->descripcion($entidad,$keyCAP,$numeroE,$nCuenta,$codigo,$basedatos);
if($myrow81['status']!='transaccion'){
				$nombreMed=new nombreMedico();
				
				//echo " ".$myrow81['descripcion'].$nombreMed->nombreMed($myrow81['almacen'],$basedatos);
				}
				}
		?>
		
  
          
          <?php  if($myrow81['gpoProducto']){
		echo '['.$myrow81['gpoProducto'].']';
		} 		  
		?>
	  </span>       <span class="Estilo1">
	  <?php //echo $myrow81['statusCargo'];
	  if($myrow81['statusDevolucion'] and $myrow81['statusDevolucion']!=''){
	  echo '</br>';
	  if($myrow81['statusDevolucion']=='si' and $myrow81['naturaleza']=='C'){
	  echo '   [Hizo el cargo: '.$myrow81['usuario'].']';
	  }else if($myrow81['statusDevolucion']=='si' and $myrow81['naturaleza']=='A'){
	  echo '   [Solicito Devolucion: '.$myrow81['usuario'].', Transaccion: '.$myrow81['folioDevolucion'] .']';
	  }
	  
	  }
	  ?>
	  </span> </div></td>
	   
	   
      <td bgcolor="<?php echo $color;?>" class="<?php echo $style;?>"><div align="center"><?php echo $myrow81['almacenDestino'];?></div></td>
      <td bgcolor="<?php echo $color;?>" class="<?php echo $style;?>">
        
        
        
    
        <div align="center">
          <?php 
if($myrow81['statusCargo']=='standbyR'){
echo 'Sin enviar';
}else if($myrow81['statusCargo']=='standby'){
echo 'pendiente surtir';
} else if($myrow81['statusCargo']=='cargado'){
echo $myrow81['statusCargo'];
}
	?>
          </div></td>
		
      <td bgcolor="<?php echo $color;?>" class="<?php echo $style;?>"> <div align="center"><?php echo $myrow81['naturaleza'];
	?></div></td>
      <td bgcolor="<?php echo $color;?>" class="<?php echo $style;?>"><div align="center"><?php echo $myrow81['tipoCliente'];
	?></div></td>
<td class="<?php echo $style;?>"><div align="center"><?php print $myrow81['cantidad']; ?></div></td>
      <td bgcolor="<?php echo $color;?>" class="<?php echo $style;?>">        <label>
        <div align="center">
  <?php
$sSQL14ab= "
SELECT 
permiteDevoluciones
FROM
almacenes
WHERE 
almacen='".$myrow81['almacenDestino']."'
";
$result14ab=mysql_db_query($basedatos,$sSQL14ab);
$myrow14ab = mysql_fetch_array($result14ab);
//echo $myrow14ab['stock'];		  

?>
            
            
            
  <?php if($myrow81['statusCargo']=='cargado' and $myrow81['naturaleza']=='C' and $myrow81['statusDevolucion']!='si'){ ?>
  <input name="cantidad[]" type="text" id="cantidad[]" size="4" autocomplete="off" />
  <?php }else{ ?>
  <input name="cantidad[]" type="text" id="cantidad[]" size="4" readonly=""/>
  <?php } ?>
        </div>
          </label>      </td>
      <td class="precionormal2" align="right" ><?php //cargos
	  if($myrow81['naturaleza']=='C'){
	  echo '$'.number_format($myrow81['precioVenta'],2);
	  } else {
	  echo '*';
	  }
	  ?></td>
      <td class="precionormal1" align="right">
	  <?php //cargos
	  if($myrow81['naturaleza']=='C'){
	  echo '$'.number_format($myrow81['cantidadParticular']*$myrow81['cantidad'],2);
	  } else {
	  echo '*';
	  }
	  ?></td>
      <td class="precionormal1" align="right" ><?php //cargos
	  if($myrow81['naturaleza']=='C'){
	  echo '$'.number_format($myrow81['cantidadAseguradora']*$myrow81['cantidad'],2);
	  } else {
	  echo '*';
	  }
	  ?></td>
      <td class="normal" align="right">
          <?php 
		  if($myrow81['naturaleza']=='C'){
		  $sumaIVAS[0]+=($myrow81['ivaAseguradora']+$myrow81['ivaParticular'])*$myrow81['cantidad'];
		echo '$'.number_format(($myrow81['ivaAseguradora']+$myrow81['ivaParticular'])*$myrow81['cantidad'],2);
		}else{
   	    echo '*';
		}
		?>
      </span></div></td>
      <td class="precionormal2" >
        <div align="right">
          <?php
	  if($myrow81['naturaleza']=='A'){
	  echo '$'.number_format($myrow81['precioVenta']*$myrow81['cantidad'],2);
	  }
	  ?>
            </div></td>
      </tr>
 
	
	
    <?php }?>
  </table>


  <p>
    <label></label>
    <input name="bandera" type="hidden" id="recibo" value="<?php echo $a;?>" />
  </p>
<div align="center">
            <div align="left">
              <p>&nbsp;</p>
            </div>
            </div>
          <p align="center">
    <input name="keyClientesInternos" type="hidden" id="keyClientesInternos" value="<?php echo $myrow3['keyClientesInternos']; ?>" />
  </p>
</form>

</body>
</html>


