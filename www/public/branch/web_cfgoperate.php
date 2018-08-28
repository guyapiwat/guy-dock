<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
 	if (isset($_POST["cid"])){$cid=$_POST["cid"];}else{$cid="";}
	if (isset($_POST["web_cfg"])){$web_cfg=$_POST["web_cfg"];}else{$web_cfg="";}	
}
if($_GET['state']==0){
	
	$sql="DELETE FROM ".$dbprefix."webcfg ";
	mysql_query($sql);

	$sql="insert into ".$dbprefix."webcfg (web_cfg) values ('$web_cfg') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=web_cfg =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
	//	echo  "$sql";		
	}else {
		logtext(true,$_SESSION['adminuserid'],'เพิ่มชื่อเว็บไซต์',mysql_insert_id());
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=7'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminuserid'],'แก้ไขชื่อเว็บไซต์',$oid);
	$sql="update ".$dbprefix."webcfg set web_cfg='$web_cfg' where cid = '$cid'";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=web_cfg =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=7'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>