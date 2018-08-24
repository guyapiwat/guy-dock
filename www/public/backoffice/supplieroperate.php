<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
		if (isset($_POST["osup_code"])){$oid=$_POST["osup_code"];}else{$oid="";}	
		if (isset($_POST["sup_code"])){$sup_code=$_POST["sup_code"];}else{$sup_code="";}	
		if (isset($_POST["sup_desc"])){$sup_desc=$_POST["sup_desc"];}else{$sup_desc="";}
		if (isset($_POST["sup_type"])){$sup_type=$_POST["sup_type"];}else{$sup_type="";}
		if (isset($_POST["address"])){$address=$_POST["address"];}else{$address="";}
		if (isset($_POST["province"])){$province=$_POST["province"];}else{$province="";}
		if (isset($_POST["amphur"])){$amphur=$_POST["amphur"];}else{$amphur="";}
		if (isset($_POST["district"])){$district=$_POST["district"];}else{$district="";}
		if (isset($_POST["zip"])){$zip=$_POST["zip"];}else{$zip="";}
		if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}
		if (isset($_POST["discount"])){$discount=$_POST["discount"];}else{$discount="";}

}
	if($_GET['state']==0){
		logtext(true,$_SESSION['adminusercode'],'เพิ่มผู้จำหน่ายสินค้า',$sup_code);
		$sql = "insert into ".$dbprefix."supplier (sup_code,  sup_desc ,sup_type ,address ,districtId ,amphurId ,provinceId,zip,uid) ";
		$sql .= "values ('$sup_code' ,'$sup_desc', '$sup_type','$address','$district','$amphur','$province','$zip',";
		$sql .= "'".$_SESSION['adminusercode']."') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=supplieroperate =>$sql";
writelogfile($text);
//=================END LOG===========================
			//echo $sql;
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>error</font><br>";
			//echo  "$sql";		
		}else {
			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=9'</script>";	
		}

	}else if($_GET['state']==1){
		logtext(true,$_SESSION['adminusercode'],'แก้ไขผู้จำหน่ายสินค้า','$sup_code');
		$sql = "update ".$dbprefix."supplier set  sup_desc='$sup_desc',";
		$sql .= "sup_code='$sup_code',sup_type='$sup_type',";
		$sql .= "address='$address',provinceId='$province',";
		$sql .= "districtId='$district',amphurId='$amphur',zip='$zip' WHERE sup_code= '$oid' ;";
		//echo $sql;				
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=supplieroperate =>$sql";
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
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=9'</script>";	
			exit;  // done in MEMBEReditadd.php
		}
	}
?>