<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}	
	if (isset($_POST["rcode"])){$rcode=$_POST["rcode"];}else{$rcode="";}
	if (isset($_POST["rdate"])){$rdate=$_POST["rdate"];}else{$rdate="";}	
	if (isset($_POST["fdate"])){$fdate=$_POST["fdate"];}else{$fdate="";}
	if (isset($_POST["tdate"])){$tdate=$_POST["tdate"];}else{$tdate="";}
	if (isset($_POST["paydate"])){$paydate=$_POST["paydate"];}else{$paydate="";}
	if (isset($_POST["calc"])){$calc=$_POST["calc"];}else{$calc="";}
	if (isset($_POST["remark"])){$remark=$_POST["remark"];}else{$remark="";}
}
if($_GET['state']==0){
	logtext(true,$_SESSION['adminusercode'],'เพิ่มรอบ',$rcode);
	$sql="insert into ".$dbprefix."matround (rcode,  rdate, fdate,  tdate,paydate,  calc,remark ) values ('$rcode' ,'$rdate' ,'$fdate' ,'$tdate' ,'$paydate' ,'$calc' ,'$remark') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=matroundoperate=>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=16'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขรอบ',$rcode);
	$sql="update ".$dbprefix."matround set rcode='$rcode', rdate='$rdate', fdate='$fdate', tdate='$tdate' where rid= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=matroundoperate=>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
//	echo $sql;
	$sql="update ".$dbprefix."matround set paydate='$paydate', calc='$calc', remark='$remark' where rid= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=matroundoperate=>$sql";
writelogfile($text);
//=================END LOG===========================
//	echo $sql;
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=16'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>