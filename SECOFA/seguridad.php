<?php
session_start();
if ($_SESSION['Logueado']!="1")
{
header("location : salir.php");
} 
?>