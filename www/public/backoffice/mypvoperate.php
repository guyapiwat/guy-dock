<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
 	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["status"])){$status=$_POST["status"];}else{$status="";}
}
if($_GET['state']==0){
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=2&sub=4'</script>";	
}else if($_GET['state']==1){
	$sql="update ".$dbprefix."my_pv set status='$status' where id = '$oid'";
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=2&sub=4'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>