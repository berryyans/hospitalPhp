<?PHP 
require("/Constantes.php");
//require("menuOperaciones.php"); 
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
require(CONSTANT_PATH_CONFIGURACION.'/funciones.php');

$mostrarmenu=new menus();
$mostrarmenu->menuTemplate($_GET['warehouse'],$_GET['datawarehouse'],$rutasalir,$rutapasswd,$usuario,$entidad,$rutamenuprincipal,'principal',$rutaimagen,$basedatos);

?>
<script language=javascript> 
function ventanaSecundaria1 (URL){ 
   window.open(URL,"ventana1","width=900,height=800,scrollbars=YES") 
} 
</script> 
<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana","width=700,height=600,scrollbars=YES") 
} 
</script>


<script language=javascript> 
function ventanaSecundaria511 (URL){ 
   window.open(URL,"ventanaSecundaria511","width=800,height=600,scrollbars=YES") 
} 
</script>

<script language=javascript> 
function ventanaSecundaria511a (URL){ 
   window.open(URL,"ventanaSecundaria511a","width=800,height=600,scrollbars=YES") 
} 
</script>


<script language=javascript> 
function ventanaSecundaria511b(URL){ 
   window.open(URL,"ventanaSecundaria511b","width=800,height=600,scrollbars=YES") 
} 
</script>

<script language=javascript> 
function ventanaSecundaria10 (URL){ 
   window.open(URL,"ventana10","width=700,height=300,scrollbars=YES") 
   
} 
</script>
<script language=javascript> 
function ventanaSecundaria11 (URL){ 
   window.open(URL,"ventana11","width=900,height=600,scrollbars=YES") 
} 
</script>



<script type="text/javascript" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/js/wz_tooltip.js"></script>
<style type="text/css">
<!--
.style7 {font-size: 9px}
.style8 { background-color:#990033;font-size: 9px; color:#FFFFFF; border-bottom-color:#0000FF; display:block}
-->
</style>
<div class="page_right">
<div align="center">

  <!--<p>-->
  <?php //echo $ALMACEN;?>
  <!--
    &nbsp;</p>
  <p>&nbsp;</p>
  -->
  <p>CONSULTAR SALDOS DE ASEGURADORAS CON LIMITE DE CREDITO </p>
  <!--
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  -->
  <!--<table width="37%" border="0" align="center" cellpadding="0" cellspacing="0">-->
  <table width="37%" border="0" align="center" cellpadding="0" cellspacing="0" class="table-template">
    <tr valign="middle">
      <td width="36%"><div align="center"></div></td>
      <td width="46%"><div align="center">
        <input onMouseOver="Tip('&lt;div class=&quot;estilo25&quot;&gt;<?php echo 'Presiona aqu&iacute; para consultar saldos ..';?>&lt;/div&gt;')" onMouseOut="UnTip()" name="nuevo42" type="button" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/btns/new_consulta.png" id="nuevo42" value="Por Persona"
	  onClick="ventanaSecundaria11('<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/cargos/consultarSaldo.php?paquetes=paquetes&amp;almacen=<?php echo $ALMACEN;?>')" /> 
        
        
        
        
         <input onmouseover="Tip('&lt;div class=&quot;estilo25&quot;&gt;<?php echo 'Presiona aqu&iacute; para consultar saldos ..';?>&lt;/div&gt;')" onmouseout="UnTip()" name="nuevo422" type="button" src="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/imagenes/btns/new_consulta.png" id="nuevo422" value="Por Aseguradora"
	  onclick="ventanaSecundaria11('<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/cargos/consultarSaldoxAseguradora.php?paquetes=paquetes&amp;almacen=<?php echo $ALMACEN;?>')" />
      </div></td>
      <td width="18%"><div align="center"></div></td>
    </tr>
  </table>
  
  
  <p> 
</div>
</div>
<?php
$mostrarFooter=new menus();
$mostrarFooter->footerTemplate($usuario,$entidad,$basedatos);
?>