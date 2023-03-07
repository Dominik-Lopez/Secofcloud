<?php
session_start();
$_SESSION['Logueado']="0";
$_SESSION ['Usuario_actual']="0";

header("location:index.php")
?>