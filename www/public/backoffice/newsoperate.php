<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
 	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["head"])){$head=$_POST["head"];}else{$head="";}
	if (isset($_POST["body"])){$body=$_POST["body"];}else{$body="";}
	if (isset($_POST["st"])){$st=$_POST["st"];}else{$st="";}
	if (isset($_POST["date"])){$date=$_POST["date"];}else{$date="";}
	if (isset($_POST["popup"])){$popup=$_POST["popup"];}else{$popup="";}
	 
}
if($_GET['state']==0){
	$sql="insert into ".$dbprefix."news (head,body,status,dates,popup) values ('$head','$body','$st','$date','$popup') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=newsoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		logtext(true,$_SESSION['adminusercode'],'เพิ่มประกาศ',mysql_insert_id());
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=20'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขประกาศ',$oid);
	$sql="update ".$dbprefix."news set head='$head' ,body='$body' ,status='$st',popup='$popup',dates='$date' where id = '$id'";
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=newsoperate =>$sql";
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
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=20'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>