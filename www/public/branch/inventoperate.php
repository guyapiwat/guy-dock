<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
		if (isset($_POST["oinv_code"])){$oid=$_POST["oinv_code"];}else{$oid="";}	
		if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}	
		if (isset($_POST["inv_desc"])){$inv_desc=$_POST["inv_desc"];}else{$inv_desc="";}
		if (isset($_POST["inv_type"])){$inv_type=$_POST["inv_type"];}else{$inv_type="";}
		if (isset($_POST["address"])){$address=$_POST["address"];}else{$address="";}
		if (isset($_POST["province"])){$province=$_POST["province"];}else{$province="";}
		if (isset($_POST["amphur"])){$amphur=$_POST["amphur"];}else{$amphur="";}
		if (isset($_POST["district"])){$district=$_POST["district"];}else{$district="";}
		if (isset($_POST["zip"])){$zip=$_POST["zip"];}else{$zip="";}
}
	if($_GET['state']==0){
		logtext(true,$_SESSION['adminuserid'],'เพิ่มสาขา',$inv_code);
		$sql = "insert into ".$dbprefix."invent (inv_code,  inv_desc ,inv_type ,address ,districtId ,amphurId ,provinceId,zip,uid) ";
		$sql .= "values ('$inv_code' ,'$inv_desc', '$inv_type','$address','$district','$amphur','$province','$zip',";
		$sql .= "'".$_SESSION['adminuserid']."' ) ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=inventoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
			//echo $sql;
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>error</font><br>";
		//	echo  "$sql";		
		}else {
			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=2'</script>";	
		}

	}else if($_GET['state']==1){
		logtext(true,$_SESSION['adminuserid'],'แก้ไขสาขา','$inv_code');
		$sql = "update ".$dbprefix."invent set  inv_desc='$inv_desc',";
		$sql .= "inv_code='$inv_code',inv_type='$inv_type',";
		$sql .= "address='$address',provinceId='$province',";
		$sql .= "districtId='$district',amphurId='$amphur',zip='$zip' WHERE inv_code= '$oid' ;";
		//echo $sql;				
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=inventoperate =>$sql";
writelogfile($text);
//=================END LOG===========================	
		if (!mysql_query($sql)) {
			ob_end_flush();
			echo "<font color='#FF0000'>error</font><br>";
			//echo "$sql<br>";
		}
		else{
			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=2'</script>";	
			exit;  // done in MEMBEReditadd.php
		}
	}
?>