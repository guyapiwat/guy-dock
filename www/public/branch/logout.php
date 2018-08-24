<?php
session_start();
$_SESSION["usercode"]=""; 
$_SESSION["username"]="";
$_SESSION["password"]="";
$_SESSION["inv_usercode"]=""; 
$_SESSION["inv_username"]="";
$_SESSION["inv_password"]="";
$_SESSION["inv_ewallet"]="";
$_SESSION["admininvent"]="";
header("Location: index.php");
?>












