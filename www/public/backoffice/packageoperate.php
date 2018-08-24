<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">

<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}	
	if (isset($_POST["pcode"])){$pcode=$_POST["pcode"];}else{$pcode="";}	
	if (isset($_POST["pdesc"])){$pdesc=$_POST["pdesc"];}else{$pdesc="";}
	if (isset($_POST["unit"])){$unit=$_POST["unit"];}else{$unit="";}
	if (isset($_POST["price"])){$price=$_POST["price"];}else{$price="";}
	if (isset($_POST["bprice"])){$bprice=$_POST["bprice"];}else{$bprice="";}
	if (isset($_POST["pv"])){$pv=$_POST["pv"];}else{$pv="";}
	if (isset($_POST["special_pv"])){$special_pv=$_POST["special_pv"];}else{$special_pv="0";}
	if (isset($_POST["bv"])){$bv=$_POST["bv"];}else{$bv="";}
	if (isset($_POST["fv"])){$fv=$_POST["fv"];}else{$fv="";}
	if (isset($_POST["qty"])){$qty=$_POST["qty"];}else{$qty="";}	
	if (isset($_POST["C1"])){$C1=$_POST["C1"];}else{$C1="";}
	if (isset($_POST["st"])){$st=$_POST["st"];}else{$st="";}
	if (isset($_POST["bf"])){$bf=$_POST["bf"];}else{$bf="";}
    if (isset($_POST["sst"])){$sst=$_POST["sst"];}else{$sst="";}
	if (isset($_POST["sa_type"])){$sa_type=$_POST["sa_type"];}else{$sa_type="";}
	if (isset($_POST["ato"])){$ato=$_POST["ato"];}else{$ato="";}
	if (isset($_POST["customer_price"])){$customer_price=$_POST["customer_price"];}else{$customer_price="";}
	if (isset($_POST["locationbase"])){$locationbase=$_POST["locationbase"];}else{$locationbase="1";}
	if (isset($_POST["weight"])){$weight=$_POST["weight"];}else{$weight="0";}
	if(isset($_POST["vat"])){$vat=$_POST["vat"];}else{$vat="0";}
}
if($_GET['state']==0){

	
	$result1=mysql_query("select * from ".$dbprefix."product_package where pcode = '$pcode'");
		if(mysql_num_rows($result1) > 0 or empty($pcode) or $pcode == '0'){
				echo "<script language='JavaScript'>alert('รหัสสินค้าซ้ำ'); window.history.back()</script>";	
				exit;
		}
	logtext(true,$_SESSION['adminusercode'],"เพิ่ม package : $pcode",$pcode);
	$sql="insert into ".$dbprefix."product_package (pcode,  pdesc, unit,  price,   pv, special_pv, bv,fv, qty,st ,bf,ato,weight,locationbase,barcode,bprice,sst,customer_price,vat,sa_type) values ('$pcode' ,'$pdesc' ,'$unit' ,'$price' ,'$pv' ,'$special_pv','$bv' ,'$fv' ,'$qty','$st','$bf','$ato','$weight','$locationbase','$barcode','$bprice','$sst','$customer_price','$vat','$sa_type') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		echo  "$sql";		
	}else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=11'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],"แก้ไข package : $pcode",$pcode);
	$sql="update ".$dbprefix."product_package set pcode='$pcode',st = '$st',weight = '$weight' ,pdesc='$pdesc',locationbase='$locationbase', unit='$unit', price='$price', bprice='$bprice', barcode='$barcode',customer_price='$customer_price',special_pv='$special_pv', sst='$sst',vat='$vat' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=packageoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql="update ".$dbprefix."product_package set pv='$pv',special_pv='$special_pv', bv='$bv',fv='$fv',sa_type='$sa_type', qty='$qty', bf='$bf', ato='$ato',vat='$vat' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=packageoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=11'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>