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
		if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}
		if (isset($_POST["discount"])){$discount=$_POST["discount"];}else{$discount="";}
		if (isset($_POST["home_t"])){$home_t=$_POST["home_t"];}else{$home_t="";}
		if  (isset($_POST["fax"])){$fax=$_POST["fax"];}else{$fax="";}
		if (isset($_POST["no_tax"])){$no_tax=$_POST["no_tax"];}else{$no_tax="";}
		if (isset($_POST["inv_type"])){$inv_type=$_POST["inv_type"];}else{$inv_type="0";}
		if (isset($_POST["locationbase"])){$locationbase=$_POST["locationbase"];}else{$locationbase="1";}
		if ($_POST["bill_ref"]!= ''){$bill_ref=$_POST["bill_ref"];}else{$bill_ref=$_POST["inv_code"];}

		
}
 
	if($_GET['state']==0){
		logtext(true,$_SESSION['adminusercode'],'เพิ่มสาขา : '.$inv_code);
		$sql = "insert into ".$dbprefix."invent (inv_code,  inv_desc ,inv_type ,address ,districtId ,amphurId ,provinceId,zip,uid,code_ref,discount,home_t,fax,no_tax,locationbase,bill_ref) ";
		$sql .= "values ('$inv_code' ,'$inv_desc', '$inv_type','$address','$district','$amphur','$province','$zip',";
		$sql .= "'".$_SESSION['adminusercode']."', '$mcode','$discount','$home_t','$fax','$no_tax','$locationbase','$bill_ref') ";
//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=inventoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
			//echo $sql;
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>error</font><br>";
			echo  "$sql";		
		}else {
			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=2'</script>";	
		}

	}else if($_GET['state']==1){
		logtext(true,$_SESSION['adminusercode'],'แก้ไขสาขา : '.$inv_code);
		$sql = "update ".$dbprefix."invent set  inv_desc='$inv_desc',";
		$sql .= "inv_code='$inv_code',inv_type='$inv_type',discount='$discount',bill_ref='$bill_ref',";
		$sql .= "address='$address',provinceId='$province',";
		$sql .= "districtId='$district',amphurId='$amphur',zip='$zip',code_ref ='$mcode',home_t = '$home_t',fax='$fax',no_tax='$no_tax',locationbase = '$locationbase' WHERE inv_code= '$oid' ;";

//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=inventoperate =>$sql";
writelogfile($text);
//=================END LOG===========================	
		if (!mysql_query($sql)) {
			ob_end_flush();
			echo "<font color='#FF0000'>error</font><br>";
			echo "$sql<br>";
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