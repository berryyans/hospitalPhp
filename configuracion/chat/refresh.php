<?php
require('/Constantes.php');
//session_start();
require_once(CONSTANT_PATH_CONFIGURACION."/chat/chat.php");
$refresh = new chat();
require_once(CONSTANT_PATH_CONFIGURACION."/chat/chat.php");
echo $query="select * from chat";
$a=$refresh->connect_easy($query);
$refresh->show($a);
?>
