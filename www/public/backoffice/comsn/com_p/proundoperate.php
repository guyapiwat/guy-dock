<? 
session_start();
include("../../connectmysql.php");
include("../../prefix.php");
require_once("../../function.php");
require_once("../../logtext.php");

if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}	
	if (isset($_POST["rcode"])){$rcode=$_POST["rcode"];}else{$rcode="";}
	if (isset($_POST["rdate"])){$rdate=$_POST["rdate"];}else{$rdate="";}	
	if (isset($_POST["fdate"])){$fdate=$_POST["fdate"];}else{$fdate="";}
	if (isset($_POST["tdate"])){$tdate=$_POST["tdate"];}else{$tdate="";}
	if (isset($_POST["fpdate"])){$fpdate=$_POST["fpdate"];}else{$fpdate="";}
	if (isset($_POST["tpdate"])){$tpdate=$_POST["tpdate"];}else{$tpdate="";}
	if (isset($_POST["paydate"])){$paydate=$_POST["paydate"];}else{$paydate="";}
	if (isset($_POST["calc"])){$calc=$_POST["calc"];}else{$calc="";}
	if (isset($_POST["remark"])){$remark=$_POST["remark"];}else{$remark="";}
	//$rcode  = str_pad($rcode, 5, 0, STR_PAD_LEFT);
}


if($_GET['state']==0){
	
	$sql="insert into ".$dbprefix."pround (rcode,  rdate, fdate,  tdate,paydate,  calc,remark,fpdate,  tpdate) values ('$rcode' ,'$rdate' ,'$fdate' ,'$tdate' ,'$paydate' ,'$calc' ,'$remark' ,'$fdate' ,'$tdate') ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		echo  "$sql";		
	}else {
		//logtext(true,$_SESSION['adminuserid'],$sql);
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='../../index.php?sessiontab=4&sub=22'</script>";	
	}
}else if($_GET['state']==1){
	
	$sql="update ".$dbprefix."pround set rcode='$rcode', rdate='$rdate', fdate='$fdate', tdate='$tdate',fpdate='$fpdate', tpdate='$tpdate' where rid= '$oid' ";
	//logtext(true,$_SESSION['adminuserid'],$sql);
	mysql_query($sql);
//	echo $sql;
	$sql="update ".$dbprefix."pround set paydate='$paydate', calc='$calc', remark='$remark' where rid= '$oid' ";
//	echo $sql;
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		echo "$sql<br>";
	}
	else {
		//logtext(true,$_SESSION['adminuserid'],$sql);
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='../../index.php?sessiontab=4&sub=22'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>