<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	
	$dbprefix="ali_";
	$bid = $_GET['bid'];
	$sql = "select * from ".$dbprefix."tsaleh where id='$bid' and cancel=1";

	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		echo "<script language='JavaScript'>alert('ไม่สามารถรับสินค้าจากบิลที่ยกเลิกแล้วได้');window.location='index.php?sessiontab=6&sub=2323'</script>";
		exit;
	}

	$sql = "select * from ".$dbprefix."tsaleh where id='$bid' and receive=1";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		echo "<script language='JavaScript'>alert('ไม่สามารถรับของได้ ...บิลนี้รับของไปเรียบร้อยแล้ว');window.location='index.php?sessiontab=6&sub=2323'</script>";
		exit;
	}
 
	$object_stocks = new stocks ();
	$object_stocks->set_data($bid,"tsale","receive","1"); 
	
	//====================LOG===========================
	$text="uid=".$_SESSION["adminusercode"]." action=tsale_change=>$sql";
	writelogfile($text);
	logtext(true,$_SESSION['adminuserid'],'สนงญ.รับของจากสาขา',$bid);

	
	
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=2323'</script>";	


function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
	echo $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	exit;
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}

function plusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}

?>
