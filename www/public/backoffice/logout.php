<?php
session_start();
$_SESSION["usercode"]=""; 
$_SESSION["username"]="";
$_SESSION["password"]="";
header("Location: login.php");
?>












