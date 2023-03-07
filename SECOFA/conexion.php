<?php
header("Conten_Type: text/html; charset=uft-8");
$db = new mysqli('localhost','root','','Secofcloud_finalv1');
$acentos =$db->query("SET NAMES 'utf8'");
if ($db->connect_error >0) {
    die('Error de Conexión ['. $db->connect_error.']');
}
?>