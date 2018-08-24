<?
session_start();
include("connectmysql.php");
include("prefix.php");
include("gencode.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
echo func_first_billhold($_REQUEST['mcode']);
?>