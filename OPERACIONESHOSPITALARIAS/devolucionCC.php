<?php 
require("/Constantes.php");
//require("menuOperaciones.php");
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');
$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);
$estilos=new muestraEstilos();
$estilos->styles();
?>
<script language="JavaScript" type="text/javascript">
    /**
    * funcion demo del evento onclick en la tabla
    */
    function envia()
    {
      document.forms[0].submit();
    }
    /**
    * funcion de captura de pulsaci�n de tecla en Internet Explorer
    */ 
    var tecla;
    function capturaTecla(e) 
    {
        if(document.all)
            tecla=event.keyCode;
        else
        {
            tecla=e.which; 
        }
     if(tecla==13)
        {
            document.forms[0].submit();
        }
    }  
    document.onkeydown = capturaTecla;
</script>


<script language=javascript> 
function ventanaSecundaria1 (URL){ 
   window.open(URL,"ventanaSecundaria1","width=800,height=600,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script> 

<script language=javascript> 
function ventanaSecundaria2 (URL){ 
   window.open(URL,"ventana1","width=700,height=600,scrollbars=YES,resizable=YES, maximizable=YES") 
} 
</script> 


<script type="text/javascript">
<!--
function comprueba()
{
if (confirm('Estas seguro que deseas enviar la cuenta de este paciente a admisiones? ya no podras hacer cargos, y la operaci�n es irreversible')) return true;
return false;
}
-->
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
    <!--<div class="contenido_pagina">-->
    <div class="page_right">
<form id="form1" name="form1" method="post" >
  <h1 align="center" class="titulos">Devolucion de Cargos de Cuentas Cerradas (Px. Internos Solamente) </h1>
  <p align="center" class="titulos">&nbsp;</p>
  <p align="center" class="titulos">
    <label>Introduce el folio de Venta
    <input name="folioVenta" type="text" id="folioVenta" size="10" />
    </label>
    <label>
    <input type="submit" name="buscar" id="buscar" value="Buscar" />
    </label>
</p>
 <?php

  if($_POST['folioVenta'] and $_POST['buscar']){   ?>
  <p align="center" class="titulos"><?php print 'Folio: '. $_POST['folioVenta'];?></p>
  <span ></span>
  
  

  <table width="598" >
    <tr >

      <th   scope="col"><div align="left" >
        <div align="left">Nombre del paciente</span></div>
      </div></th>
      <th   scope="col"><div align="left" >
        <div align="left">Seguro</div>
      </div></th>
      <th   scope="col"><div align="center" >
        <div align="left">Usuario</div>
      </div></th>
      <th   scope="col"><div align="center" >
        <div align="left">Cargar</div>
      </div></th>
    </tr>
    <tr>
<?php	
$sSQL= "SELECT *
FROM
clientesInternos 
WHERE 
entidad='".$entidad."'
and
folioVenta='".$_POST['folioVenta']."'
and
(tipoPaciente='interno' or tipoPaciente='urgencias')
and
statusCuenta='cerrada'
and
status='cerrada'

";

if($result=mysql_db_query($basedatos,$sSQL)){
while($myrow = mysql_fetch_array($result)){ 

$sSQL31= "SELECT status FROM
clientesInternos
WHERE 
keyClientesInternos='".$myrow['keyClientesInternos']."'";
$result31=mysql_db_query($basedatos,$sSQL31);
$myrow31 = mysql_fetch_array($result31);






$sSQL31c= "SELECT keyCAP FROM
cargosCuentaPaciente
WHERE 
keyClientesInternos='".$myrow['keyClientesInternos']."'
and
statusCargo!='cargado'
";
$result31c=mysql_db_query($basedatos,$sSQL31c);
$myrow31c = mysql_fetch_array($result31c);

$sSQL31cd= "SELECT 
nomCliente
FROM
clientes
WHERE 
entidad='".$entidad."'
and
numCliente='".$myrow['seguro']."' 
";
$result31cd=mysql_db_query($basedatos,$sSQL31cd);
$myrow31cd = mysql_fetch_array($result31cd);
?>



      <td width="235" bgcolor="<?php echo $color?>" >

	  <?php echo $myrow['paciente'];
	  if($myrow['status']=='ontransfer'){
	  echo '   [Se solicit� la transferencia de �ste paciente]';
	  }
	  ?>
      </span></td>
      <td width="205" bgcolor="<?php echo $color?>" ><?php 
	  if($myrow31cd['nomCliente']){
	  echo $myrow31cd['nomCliente'];
	  } else {
	  echo 'particular';
	  }
?></td>
      <td width="70" bgcolor="<?php echo $color?>" ><?php echo $myrow['usuario'];?></td>
      <td width="70" bgcolor="<?php echo $color?>" ><div align="left">


<?php if($myrow['statusCaja']=='pagado' and $myrow['statusCargoDevolucion']==''){ ?>
      <a href="#" onClick="javascript:ventanaSecundaria1('<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/cargos/devolucionesCC.php?numeroE=<?php echo $myrow['numeroE']; ?>&amp;nCuenta=<?php echo $myrow['nCuenta']; ?>&amp;almacen=<?php echo $ALMACEN; ?>&amp;almacenFuente=<?php echo $ALMACEN; ?>&amp;nT=<?php echo $nT; ?>&amp;tipoCliente=<?php echo $tipoCliente;?>&amp;tipoMovimiento=<?php echo 'cierreCuenta';?>&amp;tipoPaciente=interno&amp;folioVenta=<?php echo $myrow['folioVenta'];?>')">
        <img src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/btns/addbtn.png" alt="Pacientes Activos" width="22" height="22" border="0" />        </a>
        <?php } else { 
        
        print 'aplicado';
		
		}
		?>
		
      </div></td>
    </tr>
    <?php  }}}?>
    <input name="nombres" type="hidden" value="<?php echo $nombrePaciente; ?>" />
  </table>
  <span ><span class="style7">
  <input name="nombrePaciente" type="hidden" id="nombrePaciente" value="<?php echo $nombrePaciente; ?>" />
  <input name="nombrePaciente2" type="hidden" id="nombrePaciente2" value="<?php echo $nombrePaciente; ?>"/>
  <input name="tipoSeguro" type="hidden" id="tipoSeguro" value="<?php echo $myrow['seguro']; ?>"/>
  </span></span>

</form>
    </div>
    <?php
    $mostrarFooter = new menus();
    $mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
    ?>
</body>
</html>