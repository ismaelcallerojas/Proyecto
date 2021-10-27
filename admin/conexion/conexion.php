<?php @session_start();
$con = new mysqli('localhost','root','','inmobiliaria');

//Codificando proyecto como utf8
$con->set_charset('utf8');
?>