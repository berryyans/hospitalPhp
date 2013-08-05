<?php
class MYSQL{
static public function conecta(){

$usuario='desarrollo';
$passwd='desarrollo';
$servidor='localhost';
/*    
$usuario='omorales';
$passwd='wolf3333';
$servidor='localhost';
*/
/*
$usuario='omorales';
$passwd='wolf3333';
$servidor='10.2.2.32';
*/

mysql_connect($servidor,$usuario,$passwd); 
//mysql_query ("SET NAMES 'utf8'");
} //cierra funcion 



static public function basedatos(){
return $basedatos='sima';
}//cierra funcino
}
//$link = pg_Connect("host=10.2.1.250 dbname=carlota user=postgres password=postgres port=5432");
?>
