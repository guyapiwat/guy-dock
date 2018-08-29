<?
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["pay_name"])){$pay_name=$_POST["pay_name"];}else{$pay_name="";}	
	if (isset($_POST["pay_type"])){$pay_type=$_POST["pay_type"];}else{$pay_type="";}
	if (isset($_POST["pay_desc"])){$pay_desc=$_POST["pay_desc"];}else{$pay_desc="";}
	if (isset($_POST["mapping_code"])){$mapping_code=$_POST["mapping_code"];}else{$mapping_code="";}
	if (isset($_POST["inv_ref"])){$inv_ref=$_POST["inv_ref"];}else{$inv_ref="";}
	if (isset($_POST["status"])){$status=$_POST["status"];}else{$status="0";}


}
if($_GET['state']==0){
	logtext(true,$_SESSION['adminusercode'],'เพิ่มการชำระเงิน',$usercode);
	$sql="insert into ".$dbprefix."payment_type (pay_name, pay_type,  pay_desc,  mapping_code,  inv_ref, status,uid) values ('$pay_name' ,'$pay_type' ,'$pay_desc' ,'$mapping_code' ,'$inv_ref' ,'$status' ,'".$_SESSION["adminusercode"]."' ) ";
	//====================LOG===========================

$text="uid=".$_SESSION["adminusercode"]." action=invuseroperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=66'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก่ไขการชำระเงิน',$usercode);
	$sql="update ".$dbprefix."payment_type set  pay_name ='$pay_name',pay_type ='$pay_type',pay_desc ='$pay_desc',mapping_code ='$mapping_code',inv_ref ='$inv_ref',status ='$status',uid ='".$_SESSION["adminusercode"]."' where id = '$oid' ";
	
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=invuseroperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo "sql=$sql<BR>";
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=66'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>