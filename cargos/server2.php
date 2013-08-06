<?php 
require('/Constantes.php');
require(CONSTANT_PATH_CONFIGURACION."/ventanasEmergentes.php");
/*
 * Another In Place Editor - a jQuery edit in place plugin
 *
 * Copyright (c) 2009 Dave Hauenstein
 *
 * License:
 * This source file is subject to the BSD license bundled with this package.
 * Available online: {@link http://www.opensource.org/licenses/bsd-license.php}
 * If you did not receive a copy of the license, and are unable to obtain it,
 * email davehauenstein@gmail.com,
 * and I will send you a copy.
 *
 * Project home:
 * http://code.google.com/p/jquery-in-place-editor/
 *
 */
 
// sleep for a half or a second
// for demonstrating the 'saving...' functionality on the front end
usleep(1000000 * .5);

/*
 * These are the default parameters that get to the server from the in place editor
 *
 * $_POST['update_value']
 * $_POST['element_id']
 * $_POST['original_html']
 *
*/

/*
 * since the in place editor will display whatever the server returns
 * we're just going to echo out what we recieved. In reality, we can 
 * do validation and filtering on this value to determine if it was valid
*/
//echo $_POST['update_value'];






if($_POST['update_value']>0){
$q1 = "UPDATE existencias set 
existencia='".$_POST['update_value']."',status='standby'


WHERE keyE='".$_POST['element_id']."'";
mysql_db_query($basedatos,$q1);
echo mysql_error();
                        
if($_POST['update_value']!=NULL){                        
echo '<div align="left" >';                        
echo '<font size="1" face="Comic Sans MS,arial,verdana">';
echo trim($_POST['update_value']);
echo '</font>';
echo '</div>';
}else{
echo '<div align="left" class="normal">';
echo '<font size="1" face="Comic Sans MS,arial,verdana">';
echo 'Editar';
echo '</font>';
echo '</div>';    
}}else{
echo '<div align="left" class="normal">';    
    echo '<font size="1" face="Comic Sans MS,arial,verdana">';
echo 'ERROR! Debe ser numerico!';
echo '</font>';
echo '</div>'; 
}
?>