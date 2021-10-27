<?php @session_start();
$con = new mysqli('localhost','root','','inmobiliaria');

//Codificando los caracteres del proyecto como utf8
$con->set_charset('utf8');
?>
