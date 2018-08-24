<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
include_once("wording".$_SESSION["lan"].".php");
if(isset($_GET['state'])){
 	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["bankname"])){$bankname=$_POST["bankname"];}else{$bankname="";}	
}
if($_GET['state']==0){
	$sql="insert into ".$dbprefix."bank (bankname,uid) values ('$bankname','".$_SESSION['adminuserid']."') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=bankoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		logtext(true,$_SESSION['adminuserid'],$wording_lan["operate"]["1"],mysql_insert_id());
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=3'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminuserid'],$wording_lan["operate"]["2"],$oid);
	$sql="update ".$dbprefix."bank set bankname='$bankname'where bankcode = '$oid'";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=bankoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
	//	echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=3'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>