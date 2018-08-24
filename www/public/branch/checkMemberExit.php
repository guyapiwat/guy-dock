<? 
session_start();

include("connectmysql.php");
include("prefix.php");
require("adminchecklogin.php");

if (isset($_POST["fmcode"])){$fmcode=$_POST["fmcode"];}else{$fmcode="";}
if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}
 
 
if(is_numeric($mcode)){
	if(strlen($mcode)<7){
	echo "1";exit;
	}
	$mcode = $fmcode.$mcode;
	$sql = "SELECT mcode FROM ".$dbprefix."member where mcode = '$mcode' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0) {
	echo "1";	
	exit;
	} 
}else{
	echo "1";	
	exit;
}

?>