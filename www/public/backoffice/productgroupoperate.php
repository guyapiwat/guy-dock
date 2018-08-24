<? 

if(isset($_GET['operate'])){
 	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["groupname"])){$groupname=$_POST["groupname"];}else{$groupname="";}	
}
if($_GET['operate']==0){
	$sql="insert into ".$dbprefix."productgroup (groupname) values ('$groupname') ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		logtext(true,$_SESSION['adminuserid'],'เพิ่มกลุ่มสินค้า',mysql_insert_id());
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
	}
}else if($_GET['operate']==1){
	logtext(true,$_SESSION['adminuserid'],'แก้ไขข้อมูลกลุ่มสินค้า',$oid);
	$sql="update ".$dbprefix."productgroup set groupname='$groupname' where id = '$oid'";
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
	//	echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>