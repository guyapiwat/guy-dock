<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}	
	if (isset($_POST["p_code"])){$p_code=$_POST["p_code"];}else{$p_code="";}	
	if (isset($_POST["p_qty"])){$p_qty=$_POST["p_qty"];}else{$p_qty="";}
	if (isset($_POST["txtBuy"])){$txtBuy=$_POST["txtBuy"];}else{$txtBuy="";}
	if (isset($_POST["mdate"])){$mdate=$_POST["mdate"];}else{$mdate="";}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}
}
	$sql = "SELECT MAX(bbuy_ID) AS id  FROM ".$dbprefix."bbuy   ";
	//echo $sql;exit;
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

if($_GET['state']==0){
	logtext(true,$_SESSION['adminusercode'],'สั่งซื้อสินค้า',$pcode);
$qty = $txtBuy;
		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$p_code'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;

				$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before+$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$mid','Head Office','Head Office','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','สินค้านำเข้า','".$_SESSION["adminusercode"]."')";
				mysql_query($sql);


				$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$p_code."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before+$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$mid','Head Office','Head Office','$p_code','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','สินค้านำเข้า','".$_SESSION["adminusercode"]."')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$p_code' ";
			mysql_query($sql);


		}

$sql="insert into ".$dbprefix."bbuy (bbuy_ID,  bbuy_Date, pcode,  bbuy_Qua,   bbuy_Balance,txtoption) values ('$mid','$mdate','$p_code' ,'$txtBuy' ,'$p_qty','$txtoption') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=bproductoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
// update product
	logtext(true,$_SESSION['adminusercode'],'แก้ไขสินค้า',$p_code);


	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=bproductoperate =>$sql";
mysql_query($sql1);
// update product
writelogfile($text);
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
	//	echo  "$sql";	
	}else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=30'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขสินค้า',$pcode);
	$sql="update ".$dbprefix."product set pcode='$pcode', pdesc='$pdesc', unit='$unit', price='$price',txtoption='$txtoption' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql="update ".$dbprefix."product set pv='$pv', bv='$bv', qty='$qty' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
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
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=30'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>