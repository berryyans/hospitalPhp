<?php
require('/Constantes.php');
?>
<style type="text/css">
<!--
.style7 {font-size: 9px}
-->
</style>
<h2 align="center">Operaciones Sistemas </h2>
<form id="form1" name="form1" method="post" action="">
  <table width="291" height="69" border="0" align="center" class="style7">
    <tr>
      <td width="149"><div align="center"><a href="buscarArticulos.php">Art&iacute;culos </a></div></td>
      <td width="160"><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"><a href="<?php echo CONSTANT_PATH_SIMA_RAIZ;?>/movil/buscarExpediente.php">Buscar Expediente </a></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"><a href="../salir.php">Salir</a></div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php 
require('/Constantes.php');
include(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php"); ?>
<?php include(CONSTANT_PATH_CONFIGURACION."/funciones.php"); ?>



