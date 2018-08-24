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
	if (isset($_POST["pcode"])){$pcode=$_POST["pcode"];}else{$pcode="0";}	
	if (isset($_POST["pdesc"])){$pdesc=$_POST["pdesc"];}else{$pdesc="0";}
	if (isset($_POST["unit"])){$unit=$_POST["unit"];}else{$unit="0";}
	if (isset($_POST["customer_price"])){$customer_price=$_POST["customer_price"];}else{$customer_price="0";}
	if (isset($_POST["price"])){$price=$_POST["price"];}else{$price="0";}
	if (isset($_POST["bprice"])){$bprice=$_POST["bprice"];}else{$bprice="0";}
	if (isset($_POST["personel_price"])){$personel_price=$_POST["personel_price"];}else{$personel_price="0";}
	if (isset($_POST["pv"])){$pv=$_POST["pv"];}else{$pv="0";}
	//if (isset($_POST["special_pv"])){$special_pv=$_POST["special_pv"];}else{$special_pv="0";}
	if (isset($_POST["bv"])){$bv=$_POST["bv"];}else{$bv="0";}
	if (isset($_POST["fv"])){$fv=$_POST["fv"];}else{$fv="0";}
	if (isset($_POST["qty"])){$qty=$_POST["qty"];}else{$qty="0";}	
	if (isset($_POST["qty_stock"])){$qty_stock=$_POST["qty_stock"];}else{$qty_stock="0";}
	if (isset($_POST["C1"])){$C1=$_POST["C1"];}else{$C1="0";}
	if (isset($_POST["st"])){$st=$_POST["st"];}else{$st="0";}
	if (isset($_POST["sst"])){$sst=$_POST["sst"];}else{$sst="0";}
	if (isset($_POST["sh"])){$sh=$_POST["sh"];}else{$sh="0";}
	if (isset($_POST["weight"])){$weight=$_POST["weight"];}else{$weight="0";}
	if (isset($_POST["bf"])){$bf=$_POST["bf"];}else{$bf="0";}
	if (isset($_POST["sup_code"])){$sup_code=$_POST["sup_code"];}else{$sup_code="0";}
	if (isset($_POST["locationbase"])){$locationbase=$_POST["locationbase"];}else{$locationbase="1";}
	if (isset($_POST["barcode"])){$barcode=$_POST["barcode"];}else{$barcode="";}
	if (isset($_POST["product_group"])){$product_group=$_POST["product_group"];}else{$product_group="";}
	if(isset($_POST["vat"])){$vat=$_POST["vat"];}else{$vat="0";}
	if(isset($_POST["myfile1"])){$pathImgOld=$_POST["myfile1"];}else{$pathImgOld="0";}
	if(isset($_POST["pcode_register"])){$pcode_register=$_POST["pcode_register"];}else{$pcode_register="";}

}
if(empty($bv))$bv=0;
if(empty($fv))$fv=0;

	$pathImg = '';
	/*for($k=0;$k<=6;$k++)
	{
		$pathImg = $pathImg.rand(0,9);
	}*/
	
if($_GET['state']==0){
logtext(true,$_SESSION['adminusercode'],'เพิ่มสินค้า :  '.$pcode,$pcode);
	
		
	$result1=mysql_query("select * from ".$dbprefix."product where pcode = '$pcode' ");
	//echo $pcode.' : '."select * from ".$dbprefix."product where pcode = '$pcode'";
	
	if(mysql_num_rows($result1) > 0 or empty($pcode) or $pcode == '0'){
			echo "<script language='JavaScript'>alert('รหัสสินค้าซ้ำ'); window.history.back()</script>";	
			exit;
	}
	//exit;
	$sql="insert into ".$dbprefix."product (group_id,pcode,  pdesc, unit,  price,   pv , bv,fv, qty,st,sh ,sup_code,bf,weight,locationbase,barcode,bprice,personel_price,sst,customer_price,product_img,vat) values ('$product_group','$pcode' ,'$pdesc' ,'$unit' ,'$price' ,'$pv','$bv' ,'$fv', '0','$st','$sh','$sup_code','$bf','$weight','$locationbase','$barcode','$bprice','$personel_price','$sst','$customer_price','$pathImg','$vat') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
 

 	if($pcode_register!=""){  ////////// product register /////////////
	mysql_query("update ".$dbprefix."location_base set pcode_register='$pcode_register' WHERE cid='1'");
	}
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		
		if (isset($_FILES["myfile"])) { 
				if ($_FILES["myfile"]["error"] > 0) {
					//echo "Error: " . $_FILES["file"]["error"] . "<br>";
				} else {
					//move_uploaded_file($_FILES["myfile"]["tmp_name"], "uploads/product_img/".$pathImg.".jpg");
					//$date_add = date("Y-m-d");
					//$sql_idcard="update ".$dbprefix."member set  profile_img='ครบ' ,bmdate1='$date_add'where mcode=$mcode ";
					//mysql_query($sql_idcard);
				}
			}
		
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=1'</script>";	
	}
}else if($_GET['state']==1){
	 
logtext(true,$_SESSION['adminusercode'],'แก้ไขสินค้า :  '.$pcode,$pcode);
	$sql="update ".$dbprefix."product set group_id='$product_group',pcode='$pcode', pdesc='$pdesc',st = '$st',sh = '$sh',locationbase = '$locationbase',barcode = '$barcode', unit='$unit', weight='$weight', price='$price',personel_price='$personel_price' ,customer_price='$customer_price' , bprice='$bprice', product_img='$pathImg',vat='$vat' where pcode= '$oid'";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql="update ".$dbprefix."product set pv='$pv', bv='$bv',fv='$fv',bf='$bf',sst='$sst',sup_code = '$sup_code',personel_price='$personel_price',product_img='$pathImg',vat='$vat' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if($pcode_register!=""){  ////////// product register /////////////
		
	mysql_query("update ".$dbprefix."location_base set pcode_register='$pcode_register' WHERE cid='1'");
	}
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		if (isset($_FILES["myfile"]) ) { 
				if ($_FILES["myfile"]["error"] > 0 ) {
					//echo "Error: " . $_FILES["file"]["error"] . "<br>";
				} else {
					//@unlink("uploads/product_img/".$pathImgOld.".jpg");
					//move_uploaded_file($_FILES["myfile"]["tmp_name"], "uploads/product_img/".$pathImg.".jpg");
					//$date_add = date("Y-m-d");
					//$sql_idcard="update ".$dbprefix."member set  profile_img='ครบ' ,bmdate1='$date_add'where mcode=$mcode ";
					//mysql_query($sql_idcard);
				}
			}
		
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=1'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>