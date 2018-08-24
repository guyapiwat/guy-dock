<?
session_start();
include("connectmysql.php");
include("prefix.php");
//require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
//echo $GLOBALS["crate"];

require_once ("function.log.inc.php");
$remark = $_GET['remark'];
$bid = $_GET['sender'];
if(isset($_GET['remark'])){
	$sql = "UPDATE ali_isaleh SET remark = '".$remark."'  WHERE id=$bid ";
	mysql_query($sql);

}

if(isset($_GET['sender']) and isset($_GET['status'])){
	$object_stocks = new stocks ();
	$object_stocks->set_data($_GET['sender'],"isale",$_GET['status'],"1"); 
}
echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=138'</script>";	
?>
